<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use stdClass;

class vacancy_controller
{
    // Routes paths to enrollment

    function new_vacancy($id)
    {

    }

    function edit($id)
    {
        global $DB;

        $edict = $DB->get_record('local_psf_edict', array('id'=>$id));
        $vacancies = $DB->get_records('local_psf_vacancy', array('edictid'=>$id));

        include __DIR__ . '/../../views/vacancy/edit-html.php';
        return '';
    }

    function update($id)
    {

    }

}
