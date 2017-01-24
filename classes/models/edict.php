<?php
namespace psf\models;
use stdClass;

class edict
{

    function __construct()
    {

    }

    function create(stdClass $record, $table)
    {
        global $DB;
        $DB->insert_record($table, $record);
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
