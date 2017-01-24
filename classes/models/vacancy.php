<?php
namespace psf\models;
use stdClass;

class vacancy
{

    function __construct()
    {

    }

    function create(stdClass $record, $table)
    {
        global $DB;
        $DB->insert_record($table, $record);
    }

}
