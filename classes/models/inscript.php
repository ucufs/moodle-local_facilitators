<?php
namespace psf\models;
use stdClass;

class inscript
{

    function __construct(){

    }

    function local_psf_generate_inscription_number(){
        return uniqid();
    }

    function get_inscript($id = null, $edict_id = null){
        global $DB;

        $table = 'local_psf_inscript';
        $select = "edictid = {$edict_id}";

        if ($id == null)
        {
            $result = $DB->get_records_select($table,$select);
        }else
        {
            $result = $DB->get_record($table, array('id'=>$id));
        }
        return $result;
    }

    function create($edict_id, $vacancy_id){
        global $DB;
        
        $table = 'local_psf_inscript';
        
        $record = new stdClass();
        $record->edictid = $edict_id;
        $record->vacancyid = $vacancy_id;
        $record->inscription_number = $this->local_psf_generate_inscription_number();
        $current_date = date("d-m-Y H:i:s", time());
        $record->inscription_date = strtotime($current_date);
        return $DB->insert_record($table, $record);
    }

    function update($inscript_id, $applicant_id){
        global $DB;

        $table = 'local_psf_inscript';

        $record = new stdClass();
        $record->id = $inscript_id;
        $record->applicantid = $applicant_id;
        $DB->update_record($table, $record);
    }

    function local_psf_get_resume_inscript($inscript_id){
    }

}
