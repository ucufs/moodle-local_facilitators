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
$controller = psf\controllers\edict_controller::class;

// ********** Route Mapping for Edict ********** //

$management->get('/edict', "$controller::index");
$management->get('/edict/new_edict', "$controller::new_edict");
$management->post('/edict/create', "$controller::create");
$management->get('/edict/edit/{id}', "$controller::edit");
$management->post('/edict/update/{id}', "$controller::update");
$management->get('/edict/show_inscripts/{edict_id}', "$controller::show_inscripts");
$management->get('/edict/show_inscription/{inscript_id}', "$controller::show_inscription");
$management->get('/edict/cancel_inscription/{inscript_id}', "$controller::cancel_inscription");
$management->get('/edict/change_status/{id}', "$controller::change_status");
$management->get('/edict/criteria', "$controller::");
$management->get('/edict/pic/{name}', "$controller::get_pic");

// *********************************** //

unset($controller);
