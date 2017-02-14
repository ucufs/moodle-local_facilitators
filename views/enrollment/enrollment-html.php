<?php include __DIR__ . '../../../lib.php'; ?>
<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>
  <div class="container">
    <div class="row">
      <div class="span4 offset4">
       <h3 class="text-center">Seleção de Facilitadores</h3>

        <div class="well well-small">
          <p>
            <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
            <?= $edict->title ?>
          </p>
        </div>
        <input type="hidden" name="edict_id" id="edict_id" value="<?= $edict->id ?>">
        <div class="well">

          <form action="<?php echo URL_BASE . '/enrollment/register/' . $edict->id ?>" method="POST">

            <div class="control-group">
              <label class="control-label" for="role_id">Função</label>
              <div class="controls">
                <select name="role_id" id="function_facilitator" onchange="pop_courses();" class="span12" required="required">
                  <option value="0"></option>
                  <?php foreach ($roles as $key => $role) { ?>
                    <option value="<?= $key ?>" <?= ($enrollment->role_id == $key) ? 'selected' : '' ?> >
                      <?= local_psf_get_role_name($key); ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
      
            <?php if ($coord_presential): ?>
              <div class="control-group">
                <label class="control-label" for="campus">Campus</label>
                <select class="span12" name="campus">
                  <option value=""></option>
                  <?php foreach ($campi as $campus) { ?>
                    <option value="<?= $campus ?>" <?= ($enrollment->campus == $campus) ? 'selected' : '' ?> >
                      <?= $campus ?>                      
                    </option>
                  <?php } ?>
                </select>
              </div>
            <?php else: ?>
            <div class="control-group">
              <label class="control-label" for="course">Evento/Curso</label>
              <div class="controls">
                <select name="course_id" class="span12" required="required">
                  <option></option>
                  <?php foreach ($courses as $key => $course) { ?>
                    <option value="<?= $key ?>" <?= ($enrollment->course_id == $key) ? 'selected' : '' ?> >
                      <?= $course ?>                      
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <?php endif; ?>

            <div class="control-group">
              <label class="control-label" for="CPF">CPF</label>
              <div class="controls">
                <input type="number" name="cpf" id="cpf" value="<?= $enrollment->cpf ?>" onBlur="validaCPF(this);" placeholder="CPF" class="span12" required="required">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="siape">Matrícula SIAPE</label>
              <div class="controls">
                <input type="number" name="siape" value="<?= $enrollment->siape ?>" placeholder="Matrícula SIAPE" required="required" class="span12">
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <label>
                  <input type="checkbox" onchange="document.getElementById('nextstap').disabled = !this.checked;"> 
                  <b>Li e aceito os termos do <a href="<?= $edict->file ?>" target="_blank">Edital</a></b>
                </label>
              </div>
            </div>

            <div class="control-group">
              <div class="controls text-center">
                <a href="<?php echo URL_BASE ?>" class="btn btn-default">Cancelar</a>
                <button type="submit" id="nextstap" class="btn btn-primary" disabled="disabled">Realizar Inscrição</button>
              </div>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>

<?php $view['slots']->stop() ?>
