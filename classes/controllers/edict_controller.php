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
        $results = $DB->get_records('local_psf_edict');
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
        $record->title = $request->get('title');
        $record->edict_number = $request->get('edict_number');
        $record->validity_year = $request->get('validity_year');
        $record->opening = strtotime($request->get('opening'));
        $record->closing = strtotime($request->get('closing'));
        
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
        $record->title = $request->get('title');
        $record->edict_number = $request->get('edict_number');
        $record->validity_year = $request->get('validity_year');
        $record->opening = strtotime($request->get('opening'));
        $record->closing = strtotime($request->get('closing'));

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
    
}
