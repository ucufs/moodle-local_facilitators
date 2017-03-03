<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\edict;
use psf\models\vacancy;
use psf\models\applicant;
use psf\models\inscript;
use psf\models\enrollment;
use stdClass;

class enrollment_controller
{

    function index()
    {
        global $templating;

        $edict = new edict();
        $edicts = $edict->get_edict();

        foreach ($edicts as $obj) {
            $obj->has_vacancies = $edict->has_vacancies($obj->id);
            $obj->has_criterias = false;
        }

        return $templating->render('enrollment/index-html.php', array('edicts' => $edicts));
    }

    function enrollment($id, $role_id = null)
    {
        global $templating;

        $vac = new vacancy();
        $vacancies = $vac->get_vacancy(null, $id);

        foreach ($vacancies as $v) {
            $v->get_requisites = $vac->get_requisites($v->id);
            $v->role_name = $vac->local_psf_get_role_name($v->roleid);
            $v->course_name = $vac->local_psf_get_course_name($v->courseid);
        }

        usort(
            $vacancies,
            function($a, $b)
            {
                if( $a->course_name == $b->course_name ) return 0;
                return ( ( $a->course_name < $b->course_name ) ? -1 : 1 );
            }
        );

        $obj = new edict();
        $edict = $obj->get_edict($id);
        
        return $templating->render('enrollment/enrollment-html.php', array('edict' => $edict, 'vacancies' => $vacancies));
    }

    function step(Request $request, $edict_id)
    {
        global $templating;

        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($request->get('vacancy_id'));
        $vacancy->role_name = $vac->local_psf_get_role_name($vacancy->roleid);
        $vacancy->course_name = $vac->local_psf_get_course_name($vacancy->courseid);

        $edict_obj = new edict();
        $edict = $edict_obj->get_edict($edict_id);

        return $templating->render('enrollment/step-html.php', array('vacancy' => $vacancy, 'edict' => $edict));
    }

    function step1(Request $request, $edict_id, $vacancy_id)
    {
        global $templating;

        $applicant = new applicant();
        $applicant->cpf = $request->get('cpf');
        $applicant->siape = $request->get('siape');

        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($vacancy_id);
        $vacancy->role_name = $vac->local_psf_get_role_name($vacancy->roleid);
        $vacancy->course_name = $vac->local_psf_get_course_name($vacancy->courseid);

        $enrollment = new enrollment();
        $_SESSION['inscription_number'] = $enrollment->local_psf_generate_inscription_number();

        $obj = new edict();
        $edict = $obj->get_edict($edict_id);

        return $templating->render('enrollment/step1-html.php', array('edict' => $edict, 'applicant' => $applicant, 'vacancy' => $vacancy));
    }

    function step2(Request $request, $vacancy_id)
    {
        global $templating;

        $record = new stdClass();
        $applicant = new applicant();

        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($vacancy_id);
        
        $inscription_number = $_SESSION['inscription_number'];

        $this->set_form_params($request, $record, $vacancy, $inscription_number);
        $applicant->create($record);

        return $templating->render('enrollment/step2-html.php', array('vacancy' => $vacancy, 'applicant' => $applicant));
    }

    function completion(Request $request)
    {
        global $templating, $CFG;
        $file = $request->files->get('file');
        if ($file !== null) {     
            $path = $CFG->dataroot . '\\psf\\';
            $file->move($path, $file->getClientOriginalName());
            $response = "file uploaded successfully: " . $file->getClientOriginalName();
            $response .= '<br>size: ' . filesize($path . '/' . $file->getClientOriginalName()) / 1024 . ' kb';
        }
        return $templating->render('enrollment/completion-html.php', array('response' => $response, 'file' => $file));
    }

    function receipt()
    {
        include __DIR__ . '/../../views/enrollment/receipt-html.php';
        return '';
    }

    function set_form_params($request, $record, $vacancy, $inscription_number)
    {
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
        $record->cellphone = $request->get('cellphone');
        $record->address = $request->get('address');
        $record->number = $request->get('number');
        $record->complement = $request->get('complement');
        $record->neighborhood = $request->get('neighborhood');
        $record->city = $request->get('city');
        $record->state = $request->get('state');
        $base_requisite = $request->files->get('base_requisite');
        $additional_requisite = $request->files->get('additional_requisite');

        if ($base_requisite !== null)
        {
            $path = $CFG->dataroot . '\\psf\\' . $vacancy->edictid . '\\' . $inscription_number;
            $name = 'req01_' . $base_requisite->getClientOriginalName();
            $base_requisite->move($path, $name);
            $record->base_requisite = $path . '\\' . $name;
        }
        
        if ($additional_requisite !== null)
        {
            $path = $CFG->dataroot . '\\psf\\' . $vacancy->edictid . '\\' . $inscription_number;
            $name = 'req02_' . $additional_requisite->getClientOriginalName();
            $additional_requisite->move($path, $name);
            $record->additional_requisite = $path . '\\' . $name;
        }
    }

}
