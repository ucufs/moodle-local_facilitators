<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\edict;
use psf\models\vacancy;
use psf\models\applicant;
use psf\models\inscript;
use psf\models\enrollment;
use psf\models\criteria;
use psf\models\curriculum;
use stdClass;

class enrollment_controller
{

    function index(){
        global $templating;

        $edict = new edict();
        $edicts = $edict->get_edict();

        foreach ($edicts as $obj){
            $obj->has_vacancies = $edict->has_vacancies($obj->id);
            $obj->has_criterias = false;
            $obj->has_opened = $edict->has_opened($obj->id);
        }

        return $templating->render('enrollment/index-html.php', array('edicts' => $edicts));
    }

    function enrollment($id, $role_id = null){
        global $templating;

        $vac = new vacancy();
        $vacancies = $vac->get_vacancy(null, $id);

        foreach ($vacancies as $v){
            $v->get_requisites = $vac->get_requisites($v->id);
            $v->role_name = $vac->local_psf_get_role_name($v->roleid);
            $v->course_name = $vac->local_psf_get_course_name($v->courseid);
        }

        usort(
            $vacancies,
            function($a, $b){
                if( $a->course_name == $b->course_name ) return 0;
                return ( ( $a->course_name < $b->course_name ) ? -1 : 1 );
            }
        );

        $obj = new edict();
        $edict = $obj->get_edict($id);
        $edict->has_opened = $obj->has_opened($edict->id);
        
        return $templating->render('enrollment/enrollment-html.php', array('edict' => $edict, 'vacancies' => $vacancies));
    }

    function step(Request $request, $edict_id){
        global $templating;

        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($request->get('vacancy_id'));
        $vacancy->role_name = $vac->local_psf_get_role_name($vacancy->roleid);
        $vacancy->course_name = $vac->local_psf_get_course_name($vacancy->courseid);

        $edict_obj = new edict();
        $edict = $edict_obj->get_edict($edict_id);

        $inscript = new inscript();
        $inscript_id = $inscript->create($edict->id, $vacancy->id);

        return $templating->render('enrollment/step-html.php', array('vacancy' => $vacancy, 'edict' => $edict, 'inscript_id' => $inscript_id));
    }

    function step1(Request $request, $inscript_id){
        global $templating;

        $applicant = new applicant();
        $applicant->cpf = $request->get('cpf');
        $applicant->siape = $request->get('siape');

        $inscript_obj = new inscript();
        $inscript = $inscript_obj->get_inscript($inscript_id);

        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($inscript->vacancyid);
        $vacancy->role_name = $vac->local_psf_get_role_name($vacancy->roleid);
        $vacancy->course_name = $vac->local_psf_get_course_name($vacancy->courseid);

        $obj = new edict();
        $edict = $obj->get_edict($inscript->edictid);

        return $templating->render('enrollment/step1-html.php', array('edict' => $edict, 'inscript' => $inscript, 'vacancy' => $vacancy, 'applicant' => $applicant));
    }

    function step2(Request $request, $inscript_id){
        global $templating;

        $record = new stdClass();
        $applicant = new applicant();

        $inscript_obj = new inscript();
        $inscript = $inscript_obj->get_inscript($inscript_id);

        # exibir informações do edital no topo da página
        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($inscript->vacancyid);
        $vacancy->role_name = $vac->local_psf_get_role_name($vacancy->roleid);
        $vacancy->course_name = $vac->local_psf_get_course_name($vacancy->courseid);
        $obj = new edict();
        $edict = $obj->get_edict($vacancy->edictid);

        # cria o applicant
        $this->set_form_params($request, $record, $vacancy, $inscript);
        $applicant_id = $applicant->create($record);

        # insere o applicant_id em inscript
        $inscript_obj->update($inscript->id, $applicant_id);


        # prepara o formulário para preenchimento
        $criteria = new criteria();

        $role_object = $criteria->local_psf_get_role_by_id($vacancy->roleid);

        $role_object->itens = $criteria->local_psf_get_items_or_item_by_id();
        foreach ($role_object->itens as $item_object){
            $criteria_objects = $criteria->local_psf_get_all_criteria_by_params($vacancy->edictid, $role_object->id, $item_object->id);
            $item_object->criterias = $criteria_objects;
            unset($criteria_objects);
        }

        foreach ($role_object->itens as $item){ 
            if ($item->name == 'Capacitação'){ 
                $capacitacao = $item->criterias;
            } elseif ($item->name == 'Educação Formal'){ 
                $edu_formal = $item->criterias;
            } elseif ($item->name == 'Experiência Profissional')
                $exp_prof = $item->criterias;
        }        

        return $templating->render('enrollment/step2-html.php', array('edict' => $edict, 'vacancy' => $vacancy, 'applicant' => $applicant, 'role_object' => $role_object, 'inscript' => $inscript, 'capacitacao' => $capacitacao, 'edu_formal' => $edu_formal, 'exp_prof' => $exp_prof));
    }

    function completion(Request $request, $inscript_id){
        global $templating, $CFG;

        $record = new stdClass();

        $inscript_obj = new inscript();
        $inscript = $inscript_obj->get_inscript($inscript_id);

        $curriculum = new curriculum();
        foreach( $request->get('title') as $key => $t ) {
            $this->set_form_params_curriculum($record, $request, $inscript, $key);
            $curriculum->create($record);
        }

        $response = 'Ok';
        return $templating->render('enrollment/completion-html.php', array('inscript' => $inscript, 'response' => $response));
    }

    function receipt($inscript_id){
        global $templating;
        
        $inscript_obj = new inscript();
        $inscript = $inscript_obj->get_inscript($inscript_id);

        $applicant_obj = new applicant();
        $applicant = $applicant_obj->get_applicant($inscript->applicantid);

        $vacancy_obj = new vacancy();
        $vacancy = $vacancy_obj->get_vacancy($inscript->vacancyid);

        $edict_obj = new edict();
        $edict = $edict_obj->get_edict($inscript->edictid);

        $resume_inscript = new stdClass();
        $resume_inscript->inscription_number = $inscript->inscription_number;
        $resume_inscript->name = $applicant->name;
        $resume_inscript->siape = $applicant->siape;
        $resume_inscript->role_name = $vacancy_obj->local_psf_get_role_name($vacancy->roleid);
        $resume_inscript->course_name = $vacancy_obj->local_psf_get_course_name($vacancy->courseid);
        $resume_inscript->inscription_date = $inscript->inscription_date;

        return $templating->render('enrollment/receipt-html.php', array('resume_inscript' => $resume_inscript, 'edict' => $edict));
    }

    function set_form_params($request, $record, $vacancy, $inscript){
        global $CFG;
        $record->name = $request->get('name');
        $record->siape = $request->get('siape');
        $record->cpf = $request->get('cpf');
        $record->role = $request->get('role');
        $record->department = $request->get('department');
        $record->email = $request->get('email');
        $record->rg = $request->get('rg');
        $record->agent = $request->get('agent');
        $record->telephone = $request->get('telephone');
        $record->department_telephone = $request->get('department_telephone');
        $record->cellular = $request->get('cellular');
        $record->address = $request->get('address');
        $record->number = $request->get('number');
        $record->complement = $request->get('complement');
        $record->neighborhood = $request->get('neighborhood');
        $record->city = $request->get('city');
        $record->state = $request->get('state');
        $base_requisite = $request->files->get('base_requisite');
        $additional_requisite = $request->files->get('additional_requisite');

        if ($base_requisite !== null){
            $path = $CFG->dataroot . '\\psf\\' . $vacancy->edictid . '\\' . $inscript->inscription_number;
            $name = 'req01_' . $base_requisite->getClientOriginalName();
            $base_requisite->move($path, $name);
            $record->base_requisite = $path . '\\' . $name;
        }
        
        if ($additional_requisite !== null){
            $path = $CFG->dataroot . '\\psf\\' . $vacancy->edictid . '\\' . $inscript->inscription_number;
            $name = 'req02_' . $additional_requisite->getClientOriginalName();
            $additional_requisite->move($path, $name);
            $record->additional_requisite = $path . '\\' . $name;
        }
    }

    function set_form_params_curriculum($record, $request, $inscript, $key){
        global $CFG;
        $record->applicantid = $inscript->applicantid;
        $record->criteriaid = $request->get('criteria_id')[$key];
        $record->title = $request->get('title')[$key];
        $record->institution = $request->get('institution')[$key];
        
        $dt_start = str_replace('/', '-', $request->get('dt_start'))[$key];
        $record->dt_start = strtotime($dt_start);
        
        $dt_end = str_replace('/', '-', $request->get('dt_end'))[$key];
        $record->dt_end = strtotime($dt_end);

        if (isset($request->get('workload')[$key])){
            $record->workload = $request->get('workload')[$key];
        }
        $document = $request->files->get('document')[$key];
        if ($document !== null){
            $path = $CFG->dataroot . '\\psf\\' . $inscript->edictid . '\\' . $inscript->inscription_number;
            $name = 'cur_' . $document->getClientOriginalName();
            $document->move($path, $name);
            $record->document = $path . '\\' . $name;
        }
    }

}
