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
 * Criteria index page
 *
 * Page destined to feed the evaluation criteria used in the edict.
 *
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
?>

<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container-fluid">
    <div class="row">
        <div class="span10 offset1">

            <h3 class="text-center">Novo Critério</h3>

            <form action="<?= URL_BASE . '/management/criteria/createorupdate' ?>" method="post">

                <div class="row-fluid">
                    <div class="span6 offset3">
                        <label>
                            Edital:
                        </label>
                        <input type="hidden" name="edict_id" value="<?= $edict->id ?>" />
                        <input class="span12" type="text" value="<?= $edict->title . ' - ' . $edict->edict_number . '/' . $edict->validity_year ?>" disabled/ />
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6 offset3">
                        <label>
                            Função:
                        </label>
                        <input type="hidden" name="role_id" value="<?= $role->id ?>" />
                        <input class="span12" type="text" value="<?= $role->name ?>" disabled/ />
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6 offset3">
                        <label>
                            Item
                        </label>
                        <input type="hidden" name="item_id" value="<?= $item->id ?>" />
                        <input class="span12" type="text" value="<?= $item->name ?>" disabled />
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6 offset3">
                        <div class="span8">
                            <label>Critério</label>
                            <input type="text" name="criteria" class="span12" required tabindex="1" autofocus <?=  ($psf_criteria != null) ? 'value="' . $psf_criteria->criteria . '"' : '' ?>/>
                        </div>
                        <div class="span2">
                            <label>Pontos</label>
                            <input type="text" name="points" class="span12" required tabindex="2" <?= ($psf_criteria != null) ? 'value="' . $psf_criteria->points . '"' : '' ?>/>
                        </div>
                        <div class="span2">
                            <label>Máximo</label>
                            <input type="text" name="maximum_points" class="span12" required tabindex="3" <?= ($psf_criteria != null) ? 'value="' . $psf_criteria->maximum_points . '"' : '' ?>/>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6 offset3">
                        <label>Termo para medida</label>
                        <input type="text" name="measurement" class="span12" required tabindex="4" <?= ($psf_criteria != null) ? 'value="' . $psf_criteria->measurement . '"' : '' ?>/>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls text-center">
                        <button type="button" class="btn btn-default" onclick="history.go(-1)">Cancelar</button>
                        <button type="submit" class="btn btn-primary" tabindex="5">
                            <?= $button_text ?>
                        </button>
                    </div>
                </div>

                <input type="hidden" name="criteria_id" value="<?=  ($psf_criteria != null) ? $psf_criteria->id:'0' ?>" />

            </form>

        </div>
    </div>
</div>

<?php $view['slots']->stop() ?>
