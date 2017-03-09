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
 * Item model archive
 *
 * This archive will define methods that populates and get information from data base.
 *
 * @package    local_psf
 * @category   local
 * @copyright  2017 Divis�o de Desenvolvimento de Pessoal - Funda��o Universidade Federal de Sergipe
 * @author     Jos� Eduardo (zeduardu@ufs.br)
 * @author     J�ssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace psf\models;

use stdClass;

	/**
	 * Item model to access data
	 *
     * @package    local_psf
     * @copyright  2017 Divis�o de Desenvolvimento de Pessoal - Funda��o Universidade Federal de Sergipe
     * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
     */
    class item
    {
        function local_psf_get_items_by_id($id = null)
        {
            global $DB;

            // $DB->get_records($table, array $conditions=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
            // Get a number of records as an array of objects where all the given conditions met.
            $result = $DB->get_records('local_psf_item', null, 'name', 'id, name');

            return $result;
        }
        function local_psf_get_item_by_id($id = null)
        {
            global $DB;

            // Get a single database record as an object where all the given conditions met.
            // @param int $strictness IGNORE_MISSING means compatible mode, false returned if record not found, debug message if more found;
            //                        IGNORE_MULTIPLE means return first, ignore multiple records found(not recommended);
            //                        MUST_EXIST means throw exception if no record or multiple records found
            // $DB->get_record_select($table, $select, array $params=null, $fields='*', $strictness=IGNORE_MISSING)
            $result = $DB->get_record_select('local_psf_item', 'id = ?', array($id), '*', IGNORE_MISSING);
            return $result;
        }

        /**
        * The description should be first, with asterisks laid out exactly
        * like this example. If you want to refer to a another function,
        * use @see as below.   If it's useful to link to Moodle
        * documentation on the web, you can use a @link below or also 
        * inline like this {@link https://docs.moodle.org/dev/something}
        * Then, add descriptions for each parameter and the return value as follows.
        *
        * @param int   $postid The PHP type is followed by the variable name
        * @param array $scale The PHP type is followed by the variable name
        * @param array $ratings The PHP type is followed by the variable name
        * @return bool A status indicating success or failure
        */
        function local_psf_item_populate(stdclass $record)
        {
            global $DB;

            if ($record->id != 0)
            {
                // $DB->update_record($table, $dataobject, $bulk=false)
                // Update a record in a table.
                return $DB->update_record('local_psf_item', $record, false);
            }
            // $DB->insert_record($table, $dataobject, $returnid=true, $bulk=false)
            // Insert a record into a table and return the "id" field if required
            return $DB->insert_record('local_psf_item', $record, false, false);
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