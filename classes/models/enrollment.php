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

class Enrollment
{

    function __construct()
    {

    }

    function local_psf_get_enrollment_number()
    {
        return uniqid();
    }

    function local_psf_get_role_name($id)
    {
        global $DB;

        // $DB->get_field($table, $return, array $conditions, $strictness=IGNORE_MISSING)
        // Get a single field value from a table record where all the given conditions met.
        // @param int $strictness
        //   IGNORE_MISSING means compatible mode, false returned if record not found, debug message if more found;
        //   IGNORE_MULTIPLE means return first, ignore multiple records found(not recommended);
        //   MUST_EXIST means throw exception if no record or multiple records found
        return $DB->get_field('role', 'name', array('id'=>$id), MUST_EXIST);
    }

    function local_psf_get_course_name($id)
    {
        global $DB;

        // $DB->get_field($table, $return, array $conditions, $strictness=IGNORE_MISSING)
        // Get a single field value from a table record where all the given conditions met.
        // @param int $strictness
        //   IGNORE_MISSING means compatible mode, false returned if record not found, debug message if more found;
        //   IGNORE_MULTIPLE means return first, ignore multiple records found(not recommended);
        //   MUST_EXIST means throw exception if no record or multiple records found
        return $DB->get_field('course', 'fullname', array('id'=>$id), MUST_EXIST);
    }

    function local_psf_get_select_courses(array $categoryid=null)
    {
        global $DB;

        // Constructs 'IN()' or '=' sql fragment
        $sqlfragments = $DB->get_in_or_equal($categoryid);
        $in = $sqlfragments[0];
        $params = $sqlfragments[1];

        // $DB->get_records_select_menu($table, $select, array $params=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
        // Get the first two columns from a number of records as an associative array which match a particular WHERE clause.
        return $DB->get_records_select_menu('course', "category $in", $params, 'fullname', 'id, fullname');
    }

    function  local_psf_get_select_functions(array $role_ids=null)
    {
        global $DB;

        // Constructs 'IN()' or '=' sql fragment
        $sqlfragments = $DB->get_in_or_equal($role_ids);
        $in = $sqlfragments[0];
        $params = $sqlfragments[1];

        // $DB->get_records_select_menu($table, $select, array $params=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
        // Get the first two columns from a number of records as an associative array which match a particular WHERE clause.
        return $DB->get_records_select_menu('role', "id $in", $params, 'name', 'id, shortname', 0, 0);
    }

}
