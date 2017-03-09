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
use psf\models\item;
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
    function local_psf_view_index_criteria($edictid)
    {
        global $templating;
        $edict = new edict();
        $params = array(
            'edict' => $edict->get_edict($edictid),
            'role_itens' => $this->local_psf_mount_criteria_params($edictid));
        return $templating->render('criteria/index_criteria-html.php', $params);
    }
    /**
     * Go to the page "new_criteria.php" to insert a new criteria in the edict
     *
     * @see new_criteria.php
     * @return bool A status indicating success or failure
     */
    function local_psf_view_form_criteria($edictid, $role_id, $item_id, $criteria_id)
    {
        global $templating;
        $edict_obj = new edict();
        $criteria_obj = new criteria();

        $params = array(
            'edict' => $edict_obj->get_edict($edictid),
            'role' =>  $criteria_obj->local_psf_get_role_by_id($role_id),
            'item' =>  $criteria_obj->local_psf_get_items_or_item_by_id($item_id),
            'psf_criteria' => ($criteria_id != 0) ? $criteria_obj->local_psf_get_criteria_by_id($criteria_id) : null,
            'button_text' => ($criteria_id == 0) ? 'Salvar' : 'Atualizar'
            );

        return $templating->render('criteria/new_criteria-html.php', $params);
    }
    function local_psf_view_item_form_new(Request $request)
    {
        global $templating;
        $itemobj = new item();
        $params = array(
            'edictid' => $request->get('edictid'),
            'item' => null,
            'submittext' => 'Salvar'
            );
        return $templating->render('criteria/form_item-html.php', $params);
    }
    function local_psf_view_item_form_alter($id)
    {
        global $templating;
        $itemobj = new item();
        $params = array(
            'item' => $itemobj->local_psf_get_item_by_id($id),
            'submittext' => 'Atualizar'
            );
        return $templating->render('criteria/form_item-html.php', $params);
    }
    function local_psf_mount_criteria_params($edictid)
    {
        $criteria = new criteria();
        $role_objects = $criteria->local_psf_get_roles_join_vacancy_by_edict($edictid);
        foreach ($role_objects as $role_object)
        {
            $role_object->itens = $criteria->local_psf_get_items_or_item_by_id();
            foreach ($role_object->itens as $item_object)
            {
                $criteria_objects = $criteria->local_psf_get_all_criteria_by_params($edictid, $role_object->id, $item_object->id);
                $item_object->criterias = $criteria_objects;
                unset($criteria_objects);
            }
        }

        return $role_objects;
    }

    function local_psf_create_or_update_criteria(Request $request)
    {
        // Record to send as parameter
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
        // Instances
        $criteriaobj = new criteria();
        $edictobj = new edict();
        // Show the page of criterias
        global $templating;
        $params = array(
            'edict' => $edictobj->get_edict($edictid),
            'role_itens' => $this->local_psf_mount_criteria_params($edictid),
            'sucess' => $criteriaobj->local_psf_criteria_populate($record)
        );
        return $templating->render('criteria/index_criteria-html.php', $params);
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
     * @param mixed $edictid
     * @return mixed
     */
    function local_psf_update_status($criteria_id, $status, $edictid)
    {
        global $templating;

        $edict_obj = new edict();
        $criteria_obj = new criteria();

        $params = array(
            'edict' => $edict_obj->get_edict($edictid),
            'role_itens' => $this->local_psf_mount_criteria_params($edictid),
            'message' => $criteria_obj->local_psf_update_status_by_id($criteria_id, $status)
            );
        return $templating->render('criteria/index_criteria-html.php', $params);
    }
    function local_psf_item_populate(Request $request)
    {
        $record = new stdClass();
        $record->id = $request->get('id');
        $record->name = $request->get('name');
        $record->maximum_points = $request->get('maximum_points');

        $itemobj = new item();
        $itemobj->local_psf_item_populate($record);
        $edictobj = new edict();
        $params = array(
            'edict' => $edictobj->get_edict($request->get('edictid')),
            'role_itens' => $this->local_psf_mount_criteria_params($request->get('edictid'))
        );
        return $templating->render('criteria/index_criteria-html.php', $params);
    }
}
