<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>
      
<table align="center">
  <tr class="text-center"><td><b>UNIVERSIDADE FEDERAL DE SERGIPE</b></td></tr>
  <tr class="text-center"><td><b>PRÓ-REITORIA DE GESTÃO DE PESSOAS</b></td></tr>
</table><br/>

<h3 class="text-center">Comprovante de Inscrição</h3>

<div class="well well-sm">
  <p>
    <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
    <?= $edict->title ?>
    <button class="btn btn-primary pull-right" onClick="javascript:window.print()">
      <i class="fa fa-print" aria-hidden="true"></i>
    Imprimir</button>    
  </p>
</div>

<table class="table table-bordered">
  <tr>
    <td width="200px">Inscrição</td>
    <td><b><?= $resume_inscript->inscription_number ?></b></td>
  </tr>
  <tr>
    <td width="200px">Nome</td>
    <td><?= $resume_inscript->name ?></td>
  </tr>
  <tr>
    <td width="200px">Matrícula SIAPE</td>
    <td><?= $resume_inscript->siape ?></td>
  </tr>
  <tr>
    <td width="200px">Função</td>
    <td><b><?= $resume_inscript->role_name ?></b></td>
  </tr>
  <tr>
    <td width="200px">Evento/Curso</td>
    <td><b><?= $resume_inscript->course_name ?></b></td>
  </tr>
  <tr>
    <td width="200px">Data da Inscrição</td>
    <td><?= date("d/m/Y H:i:s", $resume_inscript->inscription_date) ?></td>
  </tr>
</table>

<?php $view['slots']->stop() ?>
