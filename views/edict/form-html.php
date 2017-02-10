<?php include __DIR__ . '../../../lib.php'; ?>

<form action="<?php echo URL_BASE . $url ?>" method="POST">

  <div class="row-fluid">
    <div class="span12">
      <label>Título</label>
      <input type="text" name="title" class="span12" placeholder="Título" value="<?= $edict->title ?>" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span3">
      <label>Número do edital</label>
      <input type="number" name="edict_number" class="span12" maxlength="4" placeholder="Número do edital" value="<?= $edict->edict_number ?>" required>
    </div>
    <div class="span3">
      <label>Ano</label>
      <input type="number" name="validity_year" maxlength="4" class="span12" placeholder="Ano" value="<?= $edict->validity_year ?>" required>
    </div>
    <div class="span3">
      <label>Início das Inscrições</label>
      <input type="text" name="opening" class="span12" placeholder="dd/mm/yyyy" value="<?= local_psf_print_date($edict->opening); ?>" required>
    </div>
    <div class="span3">
      <label>Fim das Inscrições</label>
      <input type="text" name="closing" class="span12" placeholder="dd/mm/yyyy" value="<?= local_psf_print_date($edict->closing); ?>" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <label>Link para o edital
        <small class="text-warning"></small>
      </label>
      <input type="text" name="file" class="span12" placeholder="Insira o link para o arquivo do edital" value="<?= $edict->file ?>">
    </div>
  </div>

  <div class="control-group">
    <div class="controls text-center">
      <button type="button" class="btn btn-default" onClick="history.go(-1)">Cancelar</button>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>

</form>
