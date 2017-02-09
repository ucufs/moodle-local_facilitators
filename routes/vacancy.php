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
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Returns complete string of namespace and class (Shorten call to method).
$controller = psf\controllers\vacancy_controller::class;

// ********** Route Mapping ********** //

$management->get('/vacancy/{edict_id}', "$controller::index");
$management->get('/vacancy/edit/{id}', "$controller::edit");
$management->get('/vacancy/new_vacancy/{id}', "$controller::new_vacancy");
$management->post('/vacancy/create/{id}', "$controller::create");
$management->get('/vacancy/edit/{id}/{vacancy_id}', "$controller::edit");
$management->post('/vacancy/update/{id}/{vacancy_id}', "$controller::update");
$management->get('/vacancy/destroy/{id}/{vacancy_id}', "$controller::destroy");

// *********************************** //

unset($controller);
