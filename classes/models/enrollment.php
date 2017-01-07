<?php
namespace facilitators\models;

class Enrollment
{

    function __construct()
    {

    }

    function get_enrollment_number()
    {
        echo uniqid();
    }

    function get_role_name($id)
    {
        global $DB;
        $role = $DB->get_record('role', array('id'=>$id));
        echo $role->name;
    }

    function get_course_name($id)
    {
        global $DB;
        $course = $DB->get_record('course', array('id'=>$id));
        echo $course->fullname;
    }

    function local_facilitators_get_select_courses($categoryid)
    {
        global $DB;

        /**
         * $DB->get_records_select_menu($table, $select, array $params=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
         * Get the first two columns from a number of records as an associative array which match a particular WHERE clause.
         */
        return $DB->get_records_select_menu('course', 'category = ?', array($categoryid) , 'fullname', 'id, fullname');
    }

    function  local_facilitators_get_select_functions($role_ids)
    {
        global $DB;

        /**
         * $DB->get_records_select_menu($table, $select, array $params=null, $sort='', $fields='*', $limitfrom=0, $limitnum=0)
         * Get the first two columns from a number of records as an associative array which match a particular WHERE clause.
         */
        return $DB->get_records_select_menu('role', 'id in (?)', array($role_ids) , 'name', 'id, name');
    }

}
