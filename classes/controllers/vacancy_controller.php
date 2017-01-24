<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\vacancy;
use stdClass;

class vacancy_controller
{

    function index($id)
    {
        global $DB;
        
        $table = 'local_psf_vacancy';
        $select = "edictid = {$id} and status = 1"; //is put into the where clause
        $vacancies = $DB->get_records_select($table,$select);

        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));

        include __DIR__ . '/../../views/vacancy/index-html.php';
        return '';
    }

    function new_vacancy($id)
    {
        global $DB;
        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));
        $courses = get_courses($fields='c.id,c.category,c.name');
        $roles = $DB->get_records('role');
        $vacancy = new vacancy();

        include __DIR__ . '/../../views/vacancy/new_vacancy-html.php';
        return '';
    }

    function create(Request $request, $id)
    {
        global $CFG;

        $record = new stdClass();
        $this->set_form_params($record, $request, $id);
        
        $vacancy = new vacancy();
        $vacancy->create($record, 'local_psf_vacancy');
        
        $app = new Application();

        return $app->redirect(URL_BASE . '/vacancy/' . $id);
    }

    function edit($vacancy_id)
    {
        global $DB;

        $vacancy = $DB->get_record('local_psf_vacancy', array('id'=>$vacancy_id));
        $courses = get_courses($fields='c.id,c.category,c.name');
        $roles = $DB->get_records('role');

        include __DIR__ . '/../../views/vacancy/edit-html.php';
        return '';
    }

    function update(Request $request, $id, $vacancy_id)
    {
        global $DB;
        
        $table = 'local_psf_vacancy';

        $record = new stdClass();
        $record->id = $vacancy_id;
        $this->set_form_params($record, $request, $id);

        $DB->update_record($table, $record);

        $app = new Application();

        return $app->redirect(URL_BASE . '/vacancy/' . $id);   
    }

    function destroy($vacancy_id)
    {
        global $DB;

        $table = 'local_psf_vacancy';

        $vacancy = $DB->get_record('local_psf_vacancy', array('id'=>$vacancy_id));
        $vacancy->status = ($vacancy->status==1) ? 0 : 1;

        $DB->update_record($table, $vacancy);

        $app = new Application();

        return $app->redirect(URL_BASE . '/vacancy/' . $vacancy->edictid);
    }

    private function set_form_params($record, $request, $id)
    {
        $record->edictid = $id;
        $record->roleid = $request->get('roleid');
        $record->courseid = $request->get('courseid');
        $record->quantity = $request->get('quantity');
        $record->module = $request->get('module');
        $record->campus = $request->get('campus');
    }

}
