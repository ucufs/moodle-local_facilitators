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
 * Routes archive
 *
 * This archive will begin to define many controllers controlling the routes in plugin and
 * directing for respective controllers and offering  secure  trough  "$management"  block
 * depriving access not authorized.
 *
 * @package    local_psf
 * @category   local
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace psf\models;

use stdClass;

/**
 * Criteria model for access data
 *
 * @package    local_psf
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class applicant
{
    function __construct()
    {
        $this->name = '';
        $this->address = '';
        $this->email = '';
        $this->telephone = '';
        $this->cellular = '';
        $this->rg = '';
        $this->cpf = '';
        $this->siape = '';
        $this->department = '';
        $this->department_telephone = '';
        $this->work_schedule = '';
        $this->base_requisite = '';
        $this->additional_requisite = '';
    }

    function get_applicant($id)
    {
        global $DB;
        $result = $DB->get_record('local_psf_applicant', array('id'=>$id));
    }

    function create($record)
    {
        global $DB;
        $table = 'local_psf_applicant';
        $DB->insert_record($table, $record);
    }
}
