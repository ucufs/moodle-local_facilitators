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

    function check_registration_limit($applicant, $inscript, $vacancy){
        global $DB;

        $sql = 'SELECT inscript.inscription_number, vacancy.courseid 
                FROM {local_psf_applicant} AS applicant
                INNER JOIN {local_psf_inscript} AS inscript
                ON inscript.applicantid = applicant.id
                INNER JOIN {local_psf_vacancy} vacancy
                ON inscript.vacancyid = vacancy.id
                WHERE cpf = ?
                GROUP BY vacancy.courseid';
        $result = $DB->get_records_sql($sql, array($applicant->cpf));
        return $result;
    }

    function is_equal_inscription_older(){

    }

    function has_inscription_on_the_course($applicant, $inscript, $vacancy){
        global $DB;

        $sql = 'SELECT inscript.inscription_number, vacancy.courseid
            FROM {local_psf_applicant} applicant
            INNER JOIN {local_psf_inscript} inscript
            ON inscript.applicantid = applicant.id
            INNER JOIN {local_psf_vacancy} vacancy
            ON inscript.vacancyid = vacancy.id
            WHERE applicant.cpf = ? 
            AND vacancy.courseid = ?';
        $result = $DB->get_records_sql($sql, array($applicant->cpf, $vacancy->courseid));
        return $result;
    }

}
