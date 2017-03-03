<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Enrollment Routes Archive
 *
 * This archive define methods that access the fisic adress and define the url
 *
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divis�o de Desenvolvimento de Pessoal - Funda��o Universidade Federal de Sergipe
 * @author     Jos� Eduardo (zeduardu@ufs.br)
 * @author     J�ssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Returns complete string of namespace and class (Shorten call to method).
$controller = psf\controllers\enrollment_controller::class;

// ********** Route Mapping ********** //

$app->get('/', "$controller::index");
$app->get('/inscricao/{id}', "$controller::enrollment");
$app->get('/inscricao/{id}/{role_id}', "$controller::enrollment");
$app->get('/inscricao/populate_courses/{role_id}', "$controller::populate_courses");
$app->post('/enrollment/step/{edict_id}', "$controller::step");
$app->post('/enrollment/step1/{edict_id}/{vacancy_id}', "$controller::step1");
$app->post('/enrollment/step2/{vacancy_id}', "$controller::step2");
$app->post('/enrollment/completion', "$controller::completion");
$app->get('/enrollment/receipt', "$controller::receipt");

// *********************************** //

unset($controller);