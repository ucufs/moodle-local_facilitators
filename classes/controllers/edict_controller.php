<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\edict;
use stdClass;

class edict_controller
{
    // Routes paths to enrollment

    function index()
    {
        global $DB;
        $table = 'local_psf_edict';
        $conditions = null;
        $sort = 'validity_year DESC';
        $results = $DB->get_records($table, $conditions, $sort);
        $edict = new edict();

        include __DIR__ . '/../../views/edict/index-html.php';
        return '';
    }

    function new_edict()
    {
        include __DIR__ . '/../../views/edict/new_edict-html.php';
        return '';
    }

    function create(Request $request)
    {
        global $CFG;

        $record = new stdClass();
        $this->set_form_params($record, $request);
        
        $edict = new edict();
        $edict->create($record, 'local_psf_edict');
        
        $app = new Application();

        return $app->redirect(URL_BASE . '/edict');
    }

    function edit($id)
    {
        global $DB;

        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));

        include __DIR__ . '/../../views/edict/edit-html.php';
        return '';
    }

    function update(Request $request, $id)
    {
        global $DB;

        $table = 'local_psf_edict';

        $record = new stdClass();
        $record->id = $id;
        $this->set_form_params($record, $request);

        $DB->update_record($table, $record);

        $app = new Application();

        return $app->redirect(URL_BASE . '/edict');
    }

    function change_status($id)
    {
        global $DB;

        $table = 'local_psf_edict';

        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));
        $edict->status = ($edict->status==1) ? 0 : 1;

        $DB->update_record($table, $edict);

        $app = new Application();

        return $app->redirect(URL_BASE . '/edict');
    }

    private function set_form_params($record, $request)
    {
        $record->title = $request->get('title');
        $record->edict_number = $request->get('edict_number');
        $record->validity_year = $request->get('validity_year');
        $opening = str_replace('/', '-', $request->get('opening'));
        $record->opening = strtotime($opening);
        $opening = str_replace('/', '-', $request->get('closing'));
        $record->closing = strtotime($opening);
    }
    
}
