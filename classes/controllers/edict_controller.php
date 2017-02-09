<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\edict;
use stdClass;

class edict_controller
{

    function index()
    {
        global $templating;        
        
        $edict = new edict();
        $results = $edict->get_edict();

        return $templating->render('edict/index-html.php', array('results' => $results, 'edict' => $edict));
    }

    function new_edict()
    {
        global $templating;
        $edict = new edict();
        $url = '/edict/create';
        return $templating->render('edict/new_edict-html.php', array('edict' => $edict, 'url' => $url));
    }

    function create(Request $request)
    {
        $record = new stdClass();
        $this->set_form_params($record, $request);
        
        $edict = new edict();
        $edict->create($record);
        
        $app = new Application();

        return $app->redirect(URL_BASE . '/edict');
    }

    function edit($id)
    {
        global $templating;

        $edict = new edict();
        $result = $edict->get_edict($id);
        $url = '/edict/update/' . $result->id;

        return $templating->render('edict/edit-html.php', array('edict' => $result, 'url' => $url));
    }

    function update(Request $request, $id)
    {
        $record = new stdClass();
        $record->id = $id;
        $this->set_form_params($record, $request);

        $edict = new edict();
        $edict->update($record);

        $app = new Application();

        return $app->redirect(URL_BASE . '/edict');
    }

    function change_status($id)
    {
        $edict = new edict();
        $edict->change_status($id);

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
        $record->file = $request->get('file');
    }
    
}
