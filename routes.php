<?php

// #Organizing Routes#
// This application will begin to define many controllers, hence the need to want to group routes logically.

// Set of controllers that management the internal data and need authentication
$management = $app['controllers_factory'];

// *******Place file routes here***********
require __DIR__ . '/routes/enrollment.php';
require __DIR__ . '/routes/management.php';
// ****************************************

// Allows that any functionality be it requested before the controller is executed
$management->before(function () {
    global $USER, $CFG;

    require_login();
    $context = context_module::instance($USER->id);
    if (!has_capability('local/psf:manage', $context))
    {
        $app = new Silex\Application;
        return $app->redirect($CFG->wwwroot);
    }
});

// Mounts controllers under the given route prefix.
$app->mount('management', $management);