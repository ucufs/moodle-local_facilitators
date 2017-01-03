<?php

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

}
