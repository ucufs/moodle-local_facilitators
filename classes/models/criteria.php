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
 * Routes archive
 *
 * This archive will begin to define many controllers controlling the routes in plugin and
 * directing for respective controllers and offering  secure  trough  "$management"  block
 * depriving access not authorized.
 *
 * @package    local_psf
 * @category   local
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace psf\models;

use stdClass;

	/**
	 * Criteria model for access data
	 *
     * @package    local_psf
     * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
     * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
     */
	class criteria
	{
        /**
         * Get all roles by edict id and to doing a join wiht table vacancy and return the fields "role.id, role.name and role.shrotname".
         *
         * @param integer $edict_id
         * @return array Role Objects
         */
        function local_psf_get_roles_join_vacancy_by_edict($edict_id)
        {
            global $DB;

            $sql = 'SELECT DISTINCT
                        func.id, func.name, func.shortname
                    FROM
                        {local_psf_vacancy} AS vaga
                            INNER JOIN {role} AS func ON vaga.roleid = func.id
                    WHERE
                        vaga.edictid = ?
                    ORDER BY
                        func.name';

            $result = $DB->get_records_sql($sql, array($edict_id));
            return $result;
        }

        function local_psf_get_role_by_id($role_id)
        {
            global $DB;

            // $DB->get_record($table, array $conditions, $fields='*', $strictness=IGNORE_MISSING)
            // Get a single database record as an object where all the given conditions met.
            // @param int $strictness IGNORE_MISSING means compatible mode, false returned if record not found, debug message if more found;
            //                        IGNORE_MULTIPLE means return first, ignore multiple records found(not recommended);
            //                        MUST_EXIST means throw exception if no record or multiple records found
            $result = $DB->get_record('role', array('id' => $role_id));

            return $result;
        }

        function local_psf_get_items_or_item_by_id($id = null)
        {
            global $DB;

            if (!$id)
            {
                // $DB->get_records($table, array $conditions=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
                // Get a number of records as an array of objects where all the given conditions met.
                $result = $DB->get_records('local_psf_item', null, 'name', 'id, name');
            }
            else
            {
                // Get a single database record as an object where all the given conditions met.
                // @param int $strictness IGNORE_MISSING means compatible mode, false returned if record not found, debug message if more found;
                //                        IGNORE_MULTIPLE means return first, ignore multiple records found(not recommended);
                //                        MUST_EXIST means throw exception if no record or multiple records found
                // $DB->get_record_select($table, $select, array $params=null, $fields='*', $strictness=IGNORE_MISSING)
                $result = $DB->get_record_select('local_psf_item', 'id = ?', array($id), '*', IGNORE_MISSING);
            }

            return $result;
        }

        function local_psf_get_all_criteria_by_params($edict_id, $role_id, $item_id, $status = null)
        {
            global $DB;

            // $DB->get_records_select($table, $select, array $params=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
            // Get a number of records as an array of objects which match a particular WHERE clause.
            // The 'select' parameter is (if not empty) is dropped directly into the WHERE clause without alteration.
            if ($status != null) {
                $select = "edictid = ? AND roleid = ? AND itemid = ? AND status = ?"; //is put into the where clause    
                $params = array($edict_id, $role_id, $item_id, $status);
            } else {
                $select = "edictid = ? AND roleid = ? AND itemid = ?"; //is put into the where clause    
                $params = array($edict_id, $role_id, $item_id);
            }
            
            
            $result = $DB->get_records_select('local_psf_criteria',$select, $params, 'criteria', '*');

            return $result;
        }

        function local_psf_get_criteria_by_id($criteria_id)
        {
            global $DB;

            // $DB->get_record($table, array $conditions, $fields='*', $strictness=IGNORE_MISSING)
            // Get a single database record as an object where all the given conditions met.
            // @param int $strictness IGNORE_MISSING means compatible mode, false returned if record not found, debug message if more found;
            //                        IGNORE_MULTIPLE means return first, ignore multiple records found(not recommended);
            //                        MUST_EXIST means throw exception if no record or multiple records found
            $result = $DB->get_record('local_psf_criteria', array('id' => $criteria_id));

            return $result;
        }

        function local_psf_create_or_update(stdclass $record)
        {
            global $DB;

            if ($record->id == 0)
            {
                // $DB->insert_record($table, $dataobject, $returnid=true, $bulk=false)
                // Insert a record into a table and return the "id" field if required
                $DB->insert_record('local_psf_criteria', $record, true, false);
            }
            else
            {
                // $DB->update_record($table, $dataobject, $bulk=false)
                // Update a record in a table.
                $DB->update_record('local_psf_criteria', $record, false);
            }
        }

        /**
         * Alter the status to active or inactive and return array of string
         * with message of sucess or failure.
         *
         * @param int $criteria_id
         * @param int $status
         * @return array of string
         */
        function local_psf_update_status_by_id($criteria_id, $status)
        {
            global $DB;

            $newvalue = ($status == 0) ? 1 : 0;

            // $DB->set_field($table, $newfield, $newvalue, array $conditions=null)
            // Set a single field in every table record where all the given conditions met.
            $sucess = $DB->set_field('local_psf_criteria', 'status', $newvalue, array('id' => $criteria_id));
            $message = array('sucess' => '', 'failure' => '');
            if ($sucess)
            {
                $message['sucess'] = get_string('messagesucess', 'local_psf');
            }
            else
            {
                $message['messagefailure'] = get_string('messagefailure', 'local_psf');
            }

            return $message;
        }
	}