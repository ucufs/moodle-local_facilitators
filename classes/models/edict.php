<?php
namespace psf\models;
use stdClass;

class edict
{

    function __construct()
    {
        $this->title = '';
        $this->validity_year = '';
        $this->edict_number = '';
        $this->opening = 0;
        $this->closing = 0;
    }

    function get_edict($id = null)
    {
        global $DB;

        $table = 'local_psf_edict';
        $conditions = null;
        $sort = 'validity_year DESC';        

        if ($id == null)
        {
            $result = $DB->get_records($table, $conditions, $sort);
        }else
        {
            $result = $DB->get_record($table, array('id'=>$id));
        }
        return $result;
    }

    function create(stdClass $record)
    {
        global $DB;

        $table = 'local_psf_edict';
        $DB->insert_record($table, $record);
    }

    function update(stdClass $record)
    {
        global $DB;

        $table = 'local_psf_edict';
        $DB->update_record($table, $record);
    }

    function change_status($id)
    {
        global $DB;

        $table = 'local_psf_edict';

        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));
        $edict->status = ($edict->status==1) ? 0 : 1;

        $DB->update_record($table, $edict);
    }

    function has_vacancies($id)
    {
        global $DB;
        $table = 'local_psf_vacancy';
        $select = "edictid = {$id} and status = 1";
        $vacancies = $DB->get_records_select($table,$select);
        return (count($vacancies) > 0);
    }

    function has_criterias($id)
    {
        #ToDo
    }

}
