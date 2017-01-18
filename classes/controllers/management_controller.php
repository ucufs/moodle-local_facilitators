<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\Management;
use stdClass;

class management_controller
{
    // Routes paths to enrollment

    function index()
    {
        global $DB;
        $results = $DB->get_records('local_psf_edict');
        include __DIR__ . '/../../views/management/index-html.php';
        return '';
    }

    function new_edict()
    {
        include __DIR__ . '/../../views/management/new_edict-html.php';
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
        
        $management = new Management();
        $management->create($record, 'local_psf_edict');
        
        $app = new Application();

        return $app->redirect(URL_BASE . '/management');
    }

    function edit($id)
    {
        global $DB;

        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));

        include __DIR__ . '/../../views/management/edit-html.php';
        return '';
    }
    
}
