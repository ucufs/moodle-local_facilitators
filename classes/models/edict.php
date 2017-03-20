<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

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
        $this->file = '';
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

    function has_opened($id)
    {
        global $DB;
        $edict = $this->get_edict($id);
        $current_date = strtotime(date("d-m-Y H:i", time()));
        return (($current_date >= $edict->opening) && ($current_date <= $edict->closing));
    }

    function get_inscripts($edict_id){
        global $DB;

        $sql = 'SELECT inscript.id, inscript.inscription_number, inscript.inscription_date,
            applicant.name, applicant.cpf, applicant.siape, 
            vacancy.courseid, vacancy.roleid
            FROM {local_psf_inscript} inscript
            INNER JOIN {local_psf_applicant} applicant
            ON inscript.applicantid = applicant.id
            INNER JOIN {local_psf_vacancy} vacancy
            ON inscript.vacancyid = vacancy.id
            WHERE inscript.edictid = ?
            ORDER BY applicant.name';
        $result = $DB->get_records_sql($sql, array($edict_id));
        return $result;
    }

}
