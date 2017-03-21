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
                AND inscript.status = 1
                GROUP BY vacancy.courseid';
        $result = $DB->get_records_sql($sql, array($applicant->cpf));
        return $result;
    }

    function is_equal_inscription_older($applicant, $vacancy){
        global $DB;

        $sql = 'SELECT inscript.inscription_number, vacancy.courseid 
             FROM mdl_local_psf_applicant AS applicant
             INNER JOIN mdl_local_psf_inscript AS inscript
             ON inscript.applicantid = applicant.id
             INNER JOIN mdl_local_psf_vacancy vacancy
             ON inscript.vacancyid = vacancy.id
             WHERE cpf = ?
             AND inscript.status = 1
             AND inscript.vacancyid = ?';
        $result = $DB->get_records_sql($sql, array($applicant->cpf, $vacancy->id));
        return $result;
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
            AND vacancy.courseid = ? AND inscript.status = 1';
        $result = $DB->get_records_sql($sql, array($applicant->cpf, $vacancy->courseid));
        return $result;
    }

    function get_applicant($applicant_id) {
        global $DB;

        $sql = 'SELECT 
            applicant.name,
            applicant.rg,
            applicant.agent,
            applicant.cpf,
            applicant.siape,
            applicant.email,
            applicant.telephone,
            applicant.cellular,            
            applicant.department,
            applicant.department_telephone,
            applicant.work_schedule,
            applicant.role,
            applicant.address,
            applicant.number,
            applicant.complement,
            applicant.neighborhood,
            applicant.city,
            applicant.state,
            applicant.base_requisite,
            applicant.additional_requisite,
            inscript.edictid,
            inscript.vacancyid,
            inscript.inscription_date,
            inscript.inscription_number,
            vacancy.courseid, vacancy.roleid
             
            FROM {local_psf_inscript} inscript
            INNER JOIN {local_psf_applicant} applicant
            ON inscript.applicantid = applicant.id
            INNER JOIN {local_psf_vacancy} vacancy
            ON inscript.vacancyid = vacancy.id
            WHERE applicant.id = ?';

        $result = $DB->get_record_sql($sql, array($applicant_id));
        return $result;
    }


    function get_curriculum($applicant_id) {
        global $DB;

        $sql = 'SELECT
            curriculum.criteriaid,
            curriculum.title,
            curriculum.workload,
            curriculum.dt_start,
            curriculum.dt_end,
            curriculum.institution,
            curriculum.document,
            item.name,
            criteria.criteria
            from {local_psf_curriculum} curriculum
            inner join {local_psf_applicant} applicant
            on applicant.id = curriculum.applicantid
            inner join {local_psf_criteria} criteria
            on criteria.id = curriculum.criteriaid
            inner join {local_psf_item} item
            on item.id = criteria.itemid
            where applicant.id = ?
            order by item.maximum_points DESC';

        $result = $DB->get_records_sql($sql, array($applicant_id));
        return $result;
    }

    function cancel_inscription($inscript_id)
    {
        global $DB;

        $table = 'local_psf_inscript';
        $inscript = $this->get_inscript($inscript_id);
        $inscript->status = 0;

        $DB->update_record($table, $inscript);
    }

}
