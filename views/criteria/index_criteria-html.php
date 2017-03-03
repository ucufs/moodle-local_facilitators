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
 * @package    local_psf
 * @category   local
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
?>

<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<?php if (isset($message)) { ?>
<div class="alert <?= (empty($message['sucess']))?'alert-error':'alert-success' ?>">
    <button class="close" type="button" data-dismiss="alert">×</button>
    <?= (empty($message['sucess']))?$message['failure']:$message['sucess'] ?>
</div>
<?php } ?>
      
<h4 class="text-center"><?= $select_edict->title ?> - <?= $select_edict->edict_number ?>/<?= $select_edict->validity_year ?></h4>

<h4 class="text-center">Critérios para pontuação</h4>

<div class="accordion" id="accordion1">
    <?php foreach ($role_itens as $role) { ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#<?= $role->shortname ?>">
                <?= $role->name ?>
                <i class="fa fa-angle-double-right pull-right" aria-hidden="true"></i>
            </a>
        </div>
        <div id="<?= $role->shortname ?>" class="accordion-body collapse">
            <div class="accordion" id="accordion-<?= $role->shortname ?>">
                <?php foreach ($role->itens as $item) { ?>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" style="display:inline-block; width: 60% !important;" data-toggle="collapse" data-parent="#accordion-<?= $role->shortname ?>" href="#item<?= $item->id . $role->id ?>">
                            - <?= $item->name ?>
                        </a>
                        <div class="btn-group pull-right" style="top:5px;">
                            <a class="btn btn-small disabled" style="" href="#">Inserir criterio</a>
                            <a class="btn btn-small btn-primary" href="<?= URL_BASE. '/management/criteria/0/' . $select_edict->id . '/' . $role->id . '/' . $item->id ?>">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div id="item<?= $item->id . $role->id ?>" class="accordion-body collapse">
                        <table class="table table-condensed table-striped">
                            <tr>
                                <th>Critério</th>
                                <th>Pontos</th>
                                <th>Máximo</th>
                                <th>Medida</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            <?php foreach ($item->criterias as $criteria) { ?>
                            <tr>
                                <td style="vertical-align: middle; width: 60%">
                                    <?= $criteria->criteria ?>
                                </td>
                                <td style="vertical-align: middle">
                                    <?= $criteria->points ?>
                                </td>
                                <td style="vertical-align: middle">
                                    <?= $criteria->maximum_points ?>
                                </td>
                                <td style="vertical-align: middle">
                                    <?= $criteria->measurement ?>
                                </td>
                                <td style="vertical-align: middle">
                                    <?php if ($criteria->status == 0) : ?>
                                    <span class="label label-important">Inativo</span>
                                    <br />
                                    <?php endif; ?>
                                    <a href="<?= URL_BASE. '/management/criteria/'. $criteria->id . '/' . $select_edict->id . '/' . $role->id . '/' . $item->id ?>" title="Alterar informações do edital">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?= URL_BASE . '/management/criteria/update/status/'.$criteria->status.'/'.$criteria->id.'/'.$select_edict->id ?>" title="Ativar/Desativar Edital" onclick="confirm('Deseja alterar o status do edital?')">
                                        <i class="fa fa-thumbs-<?= ($criteria->status==1) ? 'up' : 'down' ?>" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php $view['slots']->stop() ?>
