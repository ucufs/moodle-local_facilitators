<?php

namespace psf\controllers;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\Management;
use \stdClass;

class management_controller
{
    // Routes paths to enrollment

    function index()
    {
        include __DIR__ . '/../../views/management/index-html.php';
        return '';
    }

    function new_edict()
    {
        include __DIR__ . '/../../views/management/new_edict-html.php';
        return '';
    }

    function create()
    {
      global $DB, $CFG;
      $record = new stdClass();
      $record->title = $_POST["title"];
      $record->edict_number = $_POST["edict_number"];
      $record->validity_year = $_POST["validity_year"];
      $record->opening = $_POST["opening"];
      $record->closing = $_POST["closing"];
      $lastinsertid = $DB->insert_record('local_psf_edict', $record);
      // include __DIR__ . '/../../views/management/index-html.php';
      // return '';
    }
}
