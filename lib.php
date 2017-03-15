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
 * @package   local_psf
 * @copyright 2016, DIDEP/DDRH/UFS <didep@ufs.br>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_psf_extends_navigation(global_navigation $navigation) {
    //$psf = $navigation->add(get_string('pluginname', 'local_psf'), new moodle_url('/local/psf/'));
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
    return (empty($id)) ? '-' : $DB->get_field('role', 'name', array('id'=>$id), MUST_EXIST);
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
    return (empty($id)) ? '-' : $DB->get_field('course', 'fullname', array('id'=>$id), MUST_EXIST);
}

function local_psf_get_category_name($id)
{
    global $DB;        
    return (empty($id)) ? '-' : $DB->get_field('course_categories', 'name', array('id'=>$id));    
}

function local_psf_print_date($date)
{
    return ($date == 0) ? '' : date("d/m/Y H:i", $date);
}
