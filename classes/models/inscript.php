<?php
namespace psf\models;
use stdClass;

class inscript
{

    function __construct($edict_id, $vacancy_id)
    {
        $this->edictid = $edict_id;
        $this->vacancyid = $vacancy_id;
        $this->inscription_number = $this->local_psf_get_enrollment_number();
    }

    function create($applicant_id)
    {
        global $DB;
        
        $table = 'local_psf_inscript';
        
        $record = new stdClass();
        $record->applicant_id = $applicant_id;
        $record->$edictid = $this->edictid;
        $record->$vacancyid = $this->vacancyid;
        $record->inscription_number = $this->inscription_number;

        $DB->insert_record($table, $record);
    }

}
