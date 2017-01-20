<?php include __DIR__ . '/../base/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
    
      <h3 class="text-center">Alterar Edital</h3>

        <form action="<?php echo URL_BASE . '/edict/update/' . $edict->id ?>" method="POST">

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
              <label>Data de início</label>
              <input type="text" name="opening" class="span12" value="<?= date("d/m/Y", $edict->opening) ?>" required>
            </div>
            <div class="span3">
              <label>Data de encerramento</label>
              <input type="text" name="closing" class="span12" placeholder="dd/mm/yyyy" value="<?= date("d/m/Y", $edict->closing) ?>" required>
            </div>
          </div>

          <div class="control-group">
            <div class="controls text-center">
              <button type="button" class="btn btn-primary" onClick="history.go(-1)">Cancelar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>

      </form>          

    </div>
  </div>
</div>
