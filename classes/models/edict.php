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

    function has_vacancy($id)
    {
        // #toDo check if edict has vancancy
        return true;
    }

}
