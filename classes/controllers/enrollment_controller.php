<?php

namespace facilitators\controllers;

use Silex\Application;
use facilitators\models\Enrollment;

class enrollment_controller
{
    // Routes paths to enrollment

    function enrollment()
    {
        $enrollment = new Enrollment();

        $roles = $enrollment->local_facilitators_get_select_functions("1,9,11,10,14,15,3");
        $courses = $enrollment->local_facilitators_get_select_courses(33);
        include __DIR__ . '/../../views/enrollment/enrollment-html.php';
        return '';
    }

    function register()
    {
        include __DIR__ . '/../../views/enrollment/register-html.php';
        return '';
    }

    // ....................
}