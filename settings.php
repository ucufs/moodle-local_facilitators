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
 * @package   local_psf
 * @copyright 2016, DIDEP/DDRH/UFS <didep@ufs.br>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;

// Ensure the configurations for this site are set
if ( $hassiteconfig )
{
// Create folder / submenu in block menu, modsettings for activity modules, localplugins for Local plugins. 
// The default folders are defined in admin/settings/plugins.php.
$ADMIN->add('root', new admin_category('block_psf', get_string('pluginname', 'local_psf')));
 
// // Create settings block.
// $settings = new admin_settingpage($section, get_string('settings', 'block_sample'));
// if ($ADMIN->fulltree) {
//     $settings->add(new admin_setting_configcheckbox('block_sample_checkbox', get_string('checkbox', 'block_sample'),
//         get_string('checkboxdescription', 'block_kronoshtml'), 0));
// }
 
// This adds the settings link to the folder/submenu.
$ADMIN->add('block_psf', $settings);
// This adds a link to an external page.
$ADMIN->add('block_psf', new admin_externalpage('block_psf', get_string('edictmanagement', 'local_psf'), $CFG->wwwroot.'/local/psf/management/'));
// Prevent Moodle from adding settings block in standard location.
$settings = null;
}