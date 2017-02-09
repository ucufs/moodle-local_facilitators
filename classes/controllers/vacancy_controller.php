<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\vacancy;
use psf\models\edict;
use stdClass;

class vacancy_controller
{

    function index($edict_id)
    {
        global $templating;

        $obj = new vacancy();
        $vacancies = $obj->get_vacancy(null, $edict_id);

        foreach ($vacancies as $vac) {
            $vac->get_requisites = $obj->get_requisites($vac->id);
        }

        $ed = new edict();
        $edict = $ed->get_edict($edict_id);

        return $templating->render('vacancy/index-html.php', array('vacancies' => $vacancies, 'edict' => $edict));
    }

    function new_vacancy($id)
    {
        global $templating;

        $courses = get_courses($fields='c.id,c.category,c.name');
        $vacancy = new vacancy();
        $roles = $vacancy->get_roles();
        $url = '/vacancy/create/' . $id;

        return $templating->render('vacancy/new_vacancy-html.php', array('vacancy' => $vacancy, 'courses' => $courses, 'roles' => $roles, 'url' => $url));
    }

    function create(Request $request, $id)
    {
        $record = new stdClass();
        $this->set_form_params($record, $request, $id);
        
        $vacancy = new vacancy();
        $vacancy->create($record);
        
        $app = new Application();

        return $app->redirect(URL_BASE . '/vacancy/' . $id);
    }

    function edit($id, $vacancy_id)
    {
        global $templating;

        $obj = new vacancy();
        $vacancy = $obj->get_vacancy($vacancy_id);
        $roles = $obj->get_roles();
        $courses = get_courses($fields='c.id,c.category,c.name');        
        $url = '/vacancy/update/' . $vacancy->edictid . '/' . $vacancy->id;

        return $templating->render('vacancy/edit-html.php', array('vacancy' => $vacancy, 'courses' => $courses, 'roles' => $roles, 'url' => $url));
    }

    function update(Request $request, $id, $vacancy_id)
    {
        $record = new stdClass();
        $record->id = $vacancy_id;
        $this->set_form_params($record, $request, $id);

        $vacancy = new vacancy();
        $vacancy->update($record);

        $app = new Application();

        return $app->redirect(URL_BASE . '/vacancy/' . $id);   
    }

    function destroy($id, $vacancy_id)
    {
        $vacancy = new vacancy();
        $vacancy->destroy($vacancy_id);

        $app = new Application();

        return $app->redirect(URL_BASE . '/vacancy/' . $id);
    }

    private function set_form_params($record, $request, $id)
    {
        $record->edictid = $id;
        $record->roleid = $request->get('roleid');
        $record->courseid = $request->get('courseid');
        $record->quantity = $request->get('quantity');
        $record->module = $request->get('module');
        $record->campus = $request->get('campus');
        $record->base_requisite = $request->get('base_requisite');
        $record->additional_requisite = $request->get('additional_requisite');
    }

}
