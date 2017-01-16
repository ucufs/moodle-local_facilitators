<?php

$controller = psf\controllers\enrollment_controller::class;

$app->get('/', "$controller::index");
$app->get('/inscricao', "$controller::enrollment");
$app->post('/enrollment/register', "$controller::register");
$app->post('/enrollment/completion', "$controller::completion");
$app->get('/enrollment/receipt', "$controller::receipt");

unset($controller);