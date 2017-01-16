<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\Enrollment;

class enrollment_controller
{
    // Routes paths to enrollment

    function index()
    {
        include __DIR__ . '/../../views/enrollment/index-html.php';
        return '';
    }

    function enrollment()
    {
        $enrollment = new Enrollment();

        $roles = $enrollment->local_psf_get_select_functions(array(1,2,3,4));
        $courses = $enrollment->local_psf_get_select_courses(array(0,1));
        include __DIR__ . '/../../views/enrollment/enrollment-html.php';
        return '';
    }

    function register(Request $request)
    {
        $enrollment = new Enrollment();

        $enrollmentnumber = $enrollment->local_psf_get_enrollment_number();
        $rolename = $enrollment->local_psf_get_role_name($request->get('function_facilitator'));
        $coursename = $enrollment->local_psf_get_course_name($request->get('course'));
        include __DIR__ . '/../../views/enrollment/register-html.php';
        return '';
    }

    function completion(Request $request)
    {
        include __DIR__ . '/../../views/enrollment/completion-html.php';
        return '';
    }

    function receipt(Request $request)
    {
        include __DIR__ . '/../../views/enrollment/receipt-html.php';
        return '';
    }

    // ....................
}