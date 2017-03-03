<?#php include __DIR__ . '../../../lib.php'; ?>
<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

  <div class="row">
    <div class="span12">

    </div>      <p class="text-center">
        <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
        <?= $edict->title ?>
      </p>
  </div>

  <div class="row">
    <div class="span4 offset4">
      <div class="well">

        <form action="<?php echo URL_BASE . '/enrollment/step1/' . $edict->id . '/' . $vacancy->id ?>" method="POST">

          <div class="control-group">
            <label class="control-label" for="role">Função selecionada</label>
            <div class="controls">
              <input type="text" name="role" value="<?= $vacancy->role_name ?>" class="span12" required="required" readonly>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="role">Evento selecionado</label>
            <div class="controls">
              <input type="text" name="course" value="<?= $vacancy->course_name ?>" class="span12" required="required" readonly>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="CPF">CPF</label>
            <div class="controls">
              <input type="number" name="cpf" id="cpf" value="" onBlur="validaCPF(this);" placeholder="Informe o CPF" class="span12" required="required">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="siape">Matrícula SIAPE</label>
            <div class="controls">
              <input type="number" name="siape" value="" placeholder="Informe a Matrícula SIAPE" required="required" class="span12">
            </div>
          </div>

          <div class="control-group text-center">
            <div class="controls">
              <a href="<?php echo URL_BASE ?>" class="btn btn-default">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Prosseguir</button>
            </div>
          </div>
        
        </form>

      </div>
    </div>
  </div>

<?php $view['slots']->stop() ?>
