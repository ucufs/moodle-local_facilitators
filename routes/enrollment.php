<?php

$controller = psf\controllers\enrollment_controller::class;

$app->get('/', "$controller::index");
$app->get('/inscricao/{id}', "$controller::enrollment");
$app->get('/inscricao/{id}/{role_id}', "$controller::enrollment");
$app->get('/inscricao/populate_courses/{role_id}', "$controller::populate_courses");
$app->post('/enrollment/register', "$controller::register");
$app->post('/enrollment/completion', "$controller::completion");
$app->get('/enrollment/receipt', "$controller::receipt");

unset($controller);