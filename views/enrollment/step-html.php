<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container-fluid">

  <h3 class="text-center">Inscrição</h3>
  <div class="well well-small">
    <p>
      <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
      <?= $edict->title ?>
    </p>
    <p><b>Função: </b><?= $vacancy->role_name ?></p>
    <p><b>Evento: </b><?= $vacancy->course_name ?></p>
  </div>

  <form action="<?php echo URL_BASE . '/enrollment/step1/' . $inscript_id ?>" method="POST">
   
  <div class="row-fluid">
    <div class="span3 offset3">
        <label>CPF</label>
        <input type="number" name="cpf" id="cpf" value="" onBlur="validaCPF(this);" placeholder="Informe o CPF" required>
      </div>
      <div class="span3">
        <label>Matrícula SIAPE</label>
        <input type="number" name="siape" value="" placeholder="Informe a Matrícula SIAPE" required>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <button type="submit" class="btn btn-primary pull-right">
        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Prosseguir</button>
        <a href="<?php echo URL_BASE . '/enrollment/cancel_inscription/' . $inscript_id ?>" class="btn btn-default">Cancelar</a>      
      </div>
    </div>

  </form>

</div>

<?php $view['slots']->stop() ?>
