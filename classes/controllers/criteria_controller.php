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
 * Criteria controller class archive
 *
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace psf\controllers;

use psf\models\criteria;
use psf\models\edict;
use stdClass;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

/**
 * Defines methods that will render a page, perform some action, or access the database.
 *
 * @package    local_psf
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class criteria_controller
{
    /**
     * Go to the page "index_criteria-html.php" to edit the edict criterias.
     *
     * @see index_criteria-html.php
     * @return bool A status indicating success or failure
     */
    function local_psf_view_index_criteria($edict_id)
    {
        global $templating;
        $edict = new edict();
        $params = array(
            'select_edict' => $edict->get_edict($edict_id),
            'role_itens' => $this->local_psf_mount_criteria_params($edict_id));
        return $templating->render('criteria/index_criteria-html.php', $params);
    }
    /**
     * Go to the page "new_criteria.php" to insert a new criteria in the edict
     *
     * @see new_criteria.php
     * @return bool A status indicating success or failure
     */
    function local_psf_view_form_criteria($edict_id, $role_id, $item_id, $criteria_id)
    {
        global $templating;
        $edict_obj = new edict();
        $criteria_obj = new criteria();

        $params = array(
            'edict' => $edict_obj->get_edict($edict_id),
            'role' =>  $criteria_obj->local_psf_get_role_by_id($role_id),
            'item' =>  $criteria_obj->local_psf_get_items_or_item_by_id($item_id),
            'psf_criteria' => ($criteria_id != 0) ? $criteria_obj->local_psf_get_criteria_by_id($criteria_id) : null,
            'button_text' => ($criteria_id == 0) ? 'Salvar' : 'Atualizar'
            );

        return $templating->render('criteria/new_criteria-html.php', $params);
    }

    function local_psf_mount_criteria_params($edict_id)
    {
        $criteria = new criteria();

        $role_objects = $criteria->local_psf_get_roles_join_vacancy_by_edict($edict_id);
        foreach ($role_objects as $role_object)
        {
            $role_object->itens = $criteria->local_psf_get_items_or_item_by_id();
            foreach ($role_object->itens as $item_object)
            {
                $criteria_objects = $criteria->local_psf_get_all_criteria_by_params($edict_id, $role_object->id, $item_object->id);
                $item_object->criterias = $criteria_objects;
                unset($criteria_objects);
            }
        }

        return $role_objects;
    }

    function local_psf_create_or_update_criteria(Request $request)
    {
        $app = new Application();

        $record = new stdClass();
        $record->id = $request->get('criteria_id');
        $record->edictid = $request->get('edict_id');
        $record->roleid = $request->get('role_id');
        $record->itemid = $request->get('item_id');
        $record->criteria = $request->get('criteria');
        $record->points = ((float)str_replace(',', '.', $request->get('points'))) * 10;
        $record->maximum_points = $request->get('maximum_points');
        $record->measurement = $request->get('measurement');
        $record->status = 1;

        $criteria_obj = new criteria();
        $criteria_obj->local_psf_create_or_update($record);


        return $app->redirect(URL_BASE . '/management/criteria/' . $record->edictid);
    }

    /**
     * Update the status of criteria
     *
     * After try update the status, go to the page index_criteria-html.php within
     * "views/criteria" and send a variable "alert" that define  the  message  of
     * failure or sucess.
     *
     * @see index_criteria-html.php
     *
     * @param mixed $criteria_id
     * @param mixed $status
     * @param mixed $edict_id
     * @return mixed
     */
    function local_psf_update_status($criteria_id, $status, $edict_id)
    {
        global $templating;

        $edict_obj = new edict();
        $criteria_obj = new criteria();

        $params = array(
            'select_edict' => $edict_obj->get_edict($edict_id),
            'role_itens' => $this->local_psf_mount_criteria_params($edict_id),
            'message' => $criteria_obj->local_psf_update_status_by_id($criteria_id, $status)
            );

        return $templating->render('criteria/index_criteria-html.php', $params);
    }
}
