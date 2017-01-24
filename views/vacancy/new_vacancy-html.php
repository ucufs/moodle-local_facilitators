<?php include __DIR__ . '/../base/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
    
    <h3 class="text-center">Adicionar item</h3>

    <form action="<?php echo URL_BASE . '/vacancy/create/' . $edict->id ?>" method="POST">
      <div class="row-fluid">
        <div class="span7">
          <label>Função</label>
          <select name="roleid" required class="span12">
            <option value=""></option>
            <?php foreach ($roles as $role) { ?>
              <option value="<?= $role->id; ?>" ><?= $role->name; ?></option>
            <?php }; ?>
          </select>
        </div>
        <div class="span3">
          <label>Quantidade</label>
          <input type="number" name="quantity" class="span12" maxlength="4" placeholder="Número de vagas" required>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span10">
          <label>Evento/Curso</label>
          <select name="courseid" class="span12">
            <option value=""></option>
            <?php foreach ($courses as $course) { ?>
              <option value="<?= $course->id; ?>" ><?= local_psf_get_category_name($course->category) ?> / <?= $course->fullname; ?></option>
            <?php }; ?>
          </select>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span5">
          <label>Módulo
          <small class="text-warning">(Preencha apenas quando o curso for modular)</small>
          </label>
          <input type="text" name="module" class="span12" placeholder="Módulo">
        </div>
        <div class="span5">
          <label>Campus
          <small class="text-warning">(Preencha apenas a função exigir)</small>
          </label>
          <select class="span12" name="campus">
            <option value=""></option>
            <option>Campus de Itabaina</option>
            <option>Campus de Lagarto</option>
            <option>Campus de Laranjeiras</option>
            <option>Campus do Sertão</option>
          </select>
        </div>
        
      </div>
      <br/>
      <div class="row-fluid">
        <div class="span10 text-center">
          <button type="button" class="btn btn-default" onClick="history.go(-1)">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>

    </form>

    </div>
  </div>
</div>   
