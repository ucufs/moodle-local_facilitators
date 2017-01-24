<?php

$controller = psf\controllers\vacancy_controller::class;

$app->get('/vacancy/{id}', "$controller::index");
$app->get('/vacancy/new_vacancy/{id}', "$controller::new_vacancy");
$app->post('/vacancy/create/{id}', "$controller::create");
$app->get('/vacancy/edit/{id}/{vacancy_id}', "$controller::edit");
$app->post('/vacancy/update/{id}/{vacancy_id}', "$controller::update");
$app->get('/vacancy/destroy/{vacancy_id}', "$controller::destroy");

unset($controller);
