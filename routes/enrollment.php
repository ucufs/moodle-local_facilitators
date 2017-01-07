<?php

$controller = facilitators\controllers\enrollment_controller::class;

$app->get('/enrollment', "$controller::enrollment");
$app->post('/enrollment/register', "$controller::register");

unset($controller);