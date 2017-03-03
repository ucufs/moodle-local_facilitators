<?#php include __DIR__ . '../../../lib.php'; ?>
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

<form action="<?php echo URL_BASE . '/enrollment/step1/' . $edict->id . '/' . $vacancy->id ?>" method="POST">

  <div class="control-group">
    <label class="control-label" for="CPF">CPF</label>
    <div class="controls">
      <input type="number" name="cpf" id="cpf" value="" onBlur="validaCPF(this);" placeholder="Informe o CPF" class="span4" required="required">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="siape">Matrícula SIAPE</label>
    <div class="controls">
      <input type="number" name="siape" value="" placeholder="Informe a Matrícula SIAPE" required="required" class="span4">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <a href="<?php echo URL_BASE ?>" class="btn btn-default">Cancelar</a>
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Prosseguir</button>
    </div>
  </div>

</form>

<?php $view['slots']->stop() ?>
