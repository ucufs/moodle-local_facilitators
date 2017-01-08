<?php

namespace facilitators\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use facilitators\models\Enrollment;

class enrollment_controller
{
    // Routes paths to enrollment

    function enrollment()
    {
        $enrollment = new Enrollment();

        $roles = $enrollment->local_facilitators_get_select_functions(array(1,2,3,4));
        $courses = $enrollment->local_facilitators_get_select_courses(array(0,1));
        include __DIR__ . '/../../views/enrollment/enrollment-html.php';
        return '';
    }

    function register(Request $request)
    {
        $enrollment = new Enrollment();

        $enrollmentnumber = $enrollment->local_facilitators_get_enrollment_number();
        $rolename = $enrollment->local_facilitators_get_role_name($request->get('function_facilitator'));
        $coursename = $enrollment->local_facilitators_get_course_name($request->get('course'));
        include __DIR__ . '/../../views/enrollment/register-html.php';
        return '';
    }

    // ....................
}