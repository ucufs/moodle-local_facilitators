<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\edict;
use psf\models\vacancy;
use psf\models\inscript;
use stdClass;

class edict_controller
{

    function index() {
        global $templating;        
        
        $edict = new edict();
        $results = $edict->get_edict();

        return $templating->render('edict/index-html.php', array('results' => $results, 'edict' => $edict));
    }

    function new_edict() {
        global $templating;
        $edict = new edict();
        $url = '/management/edict/create';
        return $templating->render('edict/new_edict-html.php', array('edict' => $edict, 'url' => $url));
    }

    function create(Request $request) {
        $record = new stdClass();
        $this->set_form_params($record, $request);
        
        $edict = new edict();
        $edict->create($record);
        
        $app = new Application();

        return $app->redirect(URL_BASE . '/management/edict');
    }

    function edit($id) {
        global $templating;

        $edict = new edict();
        $result = $edict->get_edict($id);
        $url = '/management/edict/update/' . $result->id;

        return $templating->render('edict/edit-html.php', array('edict' => $result, 'url' => $url));
    }

    function update(Request $request, $id) {
        $record = new stdClass();
        $record->id = $id;
        $this->set_form_params($record, $request);

        $edict = new edict();
        $edict->update($record);

        $app = new Application();

        return $app->redirect(URL_BASE . '/management/edict');
    }

    function change_status($id) {
        $edict = new edict();
        $edict->change_status($id);

        $app = new Application();

        return $app->redirect(URL_BASE . '/management/edict');
    }

    function show_inscripts($edict_id) {
        global $templating;

        $vac = new vacancy();        

        $edict_obj = new edict();
        $edict = $edict_obj->get_edict($edict_id);

        $inscripts = $edict_obj->get_inscripts($edict_id);
        $active_inscripts = 0;
        foreach ($inscripts as $inscript) {
            $inscript->role_name = $vac->local_psf_get_role_name($inscript->roleid);
            $inscript->course_name = $vac->local_psf_get_course_name($inscript->courseid);
            $active_inscripts = ($inscript->status == '1') ? $active_inscripts + 1  : $active_inscripts;
        }

        return $templating->render('edict/show_inscripts-html.php', array('inscripts' => $inscripts, 'edict' => $edict, 'active_inscripts' => $active_inscripts));
    }

    function show_inscription($inscript_id) {
        global $templating;

        $inscript_obj = new inscript();
        $inscript = $inscript_obj->get_inscript($inscript_id);

        $vac = new vacancy();
        $vacancy = $vac->get_vacancy($inscript->vacancyid);
        $inscript->role_name = $vac->local_psf_get_role_name($vacancy->roleid);
        $inscript->course_name = $vac->local_psf_get_course_name($vacancy->courseid);

        $applicant = $inscript_obj->get_applicant($inscript->applicantid);
        $applicant->base_requisite_src = $this->get_pic($applicant->base_requisite);
        $applicant->additional_requisite_src = $this->get_pic($applicant->additional_requisite);
        $curriculum = $inscript_obj->get_curriculum($inscript->applicantid);

        foreach ($curriculum as $cur) {
            $curriculum->document_src = $this->get_pic($cur->document);
        }

        return $templating->render('edict/show_inscription-html.php', array('applicant' => $applicant, 'curriculum' => $curriculum, 'inscript' => $inscript));
    }

    function cancel_inscription($inscript_id) {
        $inscript = new inscript();
        $inscript->cancel_inscription($inscript_id);

        $insc = $inscript->get_inscript($inscript_id);

        $app = new Application();
        return $app->redirect(URL_BASE . '/management/edict/show_inscripts/' . $insc->edictid);
    }

    public function get_pic($path) {
        $image = str_replace('\\', '\\\\', $path);
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));

        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
        return $src;

        // if ( is_file( $file ) ) {
        //     return new BinaryFileResponse( $path );
        // }
        //make some error stuff
    }


    private function set_form_params($record, $request) {
        $record->title = $request->get('title');
        $record->edict_number = $request->get('edict_number');
        $record->validity_year = $request->get('validity_year');
        $opening = str_replace('/', '-', $request->get('opening'));
        $record->opening = strtotime($opening);
        $opening = str_replace('/', '-', $request->get('closing'));
        $record->closing = strtotime($opening);
        $record->file = $request->get('file');
    }
    
}
