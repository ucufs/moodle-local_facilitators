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
 * New item modal page
 *
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divis�o de Desenvolvimento de Pessoal - Funda��o Universidade Federal de Sergipe
 * @author     Jos� Eduardo (zeduardu@ufs.br)
 * @author     J�ssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
?>

<?php $view->extend('template-html.php') ?>
<?php $view['slots']->start('body') ?>
<h3 class="text-center">Item para pontuação</h3>
<form action="<?php echo URL_BASE."/criteria/item/populate" ?>" method="POST">
    <input type="hidden" name="id" value=""/>
    <div class="row-fluid">
        <div class="span12">
            <label>Nome</label>
            <input type="text" name="name" class="span12" value="" required />
        </div>
    </div>
    <div class="row-fluid">
        <div class="span3">
            <label>Pontos</label>
            <input type="text" name="maximum_points" class="span12" maxlength="4" value="" required />
        </div>
    </div>
    <div class="control-group">
        <div class="controls text-center">
            <button type="button" class="btn btn-default" onclick="history.go(-1)">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $submittext ?></button>
        </div>
    </div>
</form>
<?php $view['slots']->stop() ?>