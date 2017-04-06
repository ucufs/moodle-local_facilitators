<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="text-center" style="margin-top: 10px; margin-bottom: 25px">
  <img src="<?= URL_BASE ?>/imgs/Etapa1.png">
</div>

<div class="well well-small">
  <p>
    <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
    <?= $edict->title ?>
  </p>
</div>
<input type="hidden" name="edict_id" id="edict_id" value="<?= $edict->id ?>">

<!-- <?#php if ($edict->has_opened): ?> -->

<p>Selecione a vaga que possui interesse e clique em <span class="label label-info">Prosseguir</span></p><br/>

  <?php if (count($vacancies) == 0): ?>
  <p>Ainda não há vagas cadastradas.</p>
  <?php else: ?>
  <small>
  <form action="<?php echo URL_BASE . '/enrollment/step/' . $edict->id ?>" method="POST">
  <table class="table table-condensed table-hover table-bordered">
    <tr>
      <th></th>
      <th style="width: 300px;">EVENTO</th>
      <th>FUNÇÃO</th>
      <th>VAGAS</th>
      <th>REQUISITOS</th>
      <th>CAMPI</th>
    </tr>
    <?php foreach ($vacancies as $vacancy) { ?>
    <tr style="vertical-align: middle">
      <td class="text-center" style="vertical-align: middle">
        <input type="radio" name="vacancy_id" value="<?= $vacancy->id ?>" required>
      </td>
      <td style="vertical-align: middle"><b><?= $vacancy->course_name; ?></b></td>
      <td style="vertical-align: middle"><?= $vacancy->role_name; ?></td>
      <td class="text-center" style="vertical-align: middle"><span class="badge"><?= $vacancy->quantity; ?></span></td>
      <td style="vertical-align: middle"><?= $vacancy->get_requisites ?></td>
      <td style="vertical-align: middle"><?= $vacancy->campus ?></td>
    </tr>
    <?php }; ?>
  </table>
  </small>
  <?php endif; ?>

  <div class="control-group text-center">
    <div class="controls">
      <label>
        <input type="checkbox" onchange="document.getElementById('nextstap').disabled = !this.checked;"> 
        <b>Li e aceito os termos do <a href="<?= $edict->file ?>" target="_blank">Edital</a></b>
      </label>
    </div>
  </div>

  <div class="control-group text-center">
    <div class="controls">
      <a href="<?php echo URL_BASE ?>" class="btn btn-default">Cancelar</a>
      <button type="submit" id="nextstap" class="btn btn-primary" disabled="disabled">
      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Prosseguir</button>
    </div>
  </div>

  </form>

<!-- <?#php else: ?>
  Inscrições indisponíveis.
<?#php endif; ?> -->

<?php $view['slots']->stop() ?>
