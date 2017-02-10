<?php
namespace psf\models;
use stdClass;

class vacancy
{

    function __construct()
    {
        $this->edicit = null;
        $this->courseid = null;
        $this->roleid = null;
        $this->quantity = null;
        $this->module = null;
        $this->campus = null;
        $this->base_requisite = '';
        $this->additional_requisite = '';
    }

    function get_vacancy($id = null, $edict_id = null)
    {
        global $DB;

        #toDo
        #Ordenar por nome do evento
        $table = 'local_psf_vacancy';
        $select = "edictid = {$edict_id} and status = 1 ORDER BY roleid";

        if ($id == null)
        {
            $result = $DB->get_records_select($table,$select);
        }else
        {
            $result = $DB->get_record('local_psf_vacancy', array('id'=>$id));
        }
        return $result;
    }

    function create(stdClass $record)
    {
        global $DB;
        $table = 'local_psf_vacancy';
        $DB->insert_record($table, $record);
    }

    function update(stdClass $record)
    {
        global $DB;

        $table = 'local_psf_vacancy';
        $DB->update_record($table, $record);
    }

    function destroy($vacancy_id)
    {
        global $DB;

        $table = 'local_psf_vacancy';
        $vacancy = $this->get_vacancy($vacancy_id);
        $vacancy->status = ($vacancy->status==1) ? 0 : 1;

        $DB->update_record($table, $vacancy);
    }

    function get_roles()
    {
        global $DB;
        return $roles = $DB->get_records('role');
    }

    function get_requisites($id)
    {
        $vacancy = $this->get_vacancy($id);    

        return ($vacancy->additional_requisite == '') ? $vacancy->base_requisite : $vacancy->base_requisite . ' + ' . $vacancy->additional_requisite;
    }

}
