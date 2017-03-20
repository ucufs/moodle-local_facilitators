<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<h3 class="text-center">Relação de Inscritos</h3>

<div class="well well-small">
  <p>
    <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
    <?= $edict->title ?>
  </p>
</div>

<table class="table table-condensed table-hover sortable">
  <tr>
  	<th><small>Inscrição</small></th>
    <th><small>Nome</small></th>
    <th><small>CPF</small></th>
    <th><small>SIAPE</small></th>
    <th><small>Evento</small></th>
    <th><small>Função</small></th>
    <th><small>Data de Inscrição</small></th>
    <th colspan="2"><small>Ações</small></th>
  </tr>
  <?php foreach ($inscripts as $inscript) { ?>
  <tr>
  	<td style="vertical-align: middle"><small><?= $inscript->inscription_number; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->name; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->cpf; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->siape; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->course_name; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->role_name; ?></small></td>
    <td style="vertical-align: middle"><small><?= date("d/m/Y H:i", $inscript->inscription_date); ?></small></td>
    <td style="vertical-align: middle"><small><a href="<?php echo URL_BASE . '/management/edict/show_inscription/' . $inscript->id ?>" title="Ver detalhes"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></small></td>
    <td>
    </td>
  </tr>
  <?php } ?>
  
</table>

<?php $view['slots']->stop() ?>
