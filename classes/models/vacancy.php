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
    }

    function get_vacancy($id = null, $edict_id = null)
    {
        global $DB;

        $table = 'local_psf_vacancy';
        $select = "edictid = {$edict_id} and status = 1";

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
        $vacancy = $this->get_vacancy($vacancy_id, null);
        $vacancy->status = ($vacancy->status==1) ? 0 : 1;

        $DB->update_record($table, $vacancy);
    }

    function get_roles()
    {
        global $DB;
        return $roles = $DB->get_records('role');
    }

}
