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
 * upgrade processes for this module.
 *
 * @package   local_psf
 * @copyright 2016 UFS - Universidade Federal de Sergipe <didep@ufs.br>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_local_psf_upgrade($oldversion=0)
{
    global $DB;

    $dbman = $DB->get_manager(); // Loads ddl manager and xmldb classes.

    if ($oldversion < 2017011804)
    {

        // Changing type of field validity_year on table local_psf_edict to char.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('validity_year', XMLDB_TYPE_CHAR, '4', null, XMLDB_NOTNULL, null, '-', 'id');

        // Launch change of type for field validity_year.
        $dbman->change_field_type($table, $field);

        // Changing type of field edict_number on table local_psf_edict to char.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('edict_number', XMLDB_TYPE_CHAR, '4', null, XMLDB_NOTNULL, null, '-', 'title');

        // Launch change of type for field edict_number.
        $dbman->change_field_type($table, $field);

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017011804, 'local', 'psf');
    }

    if ($oldversion < 2017011901)
    {
        // Define field status to be added to local_psf_edict.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('status', XMLDB_TYPE_CHAR, '4', null, XMLDB_NOTNULL, null, '1', 'edict_number');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017011901, 'local', 'psf');
    }

    if ($oldversion < 2017011902) {

        // Changing type of field status on table local_psf_edict to int.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'edict_number');

        // Launch change of type for field status.
        $dbman->change_field_type($table, $field);

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017011902, 'local', 'psf');
    }

}