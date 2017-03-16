<?php include __DIR__ . '../../../lib.php'; ?>

<form action="<?php echo URL_BASE . $url ?>" method="POST">
  <div class="row-fluid">
    <div class="span7">
      <label>Função</label>
      <select name="roleid" required class="span12">
        <option value=""></option>
        <?php foreach ($roles as $role) { ?>
          <option value="<?= $role->id; ?>" <?= ($vacancy->roleid == $role->id) ? 'selected' : '' ?> >
            <?= $role->name; ?>
          </option>
        <?php }; ?>
      </select>
    </div>
    <div class="span3">
      <label>Quantidade</label>
      <input type="number" name="quantity" class="span12" maxlength="4" placeholder="Número de vagas" value="<?= $vacancy->quantity; ?>" required>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span10">
      <label>Evento</label>
      <select name="courseid" class="span12">
        <option value=""></option>
        <?php foreach ($courses as $course) { ?>
          <option value="<?= $course->id; ?>" <?= ($vacancy->courseid == $course->id) ? 'selected' : '' ?> >
            <?= local_psf_get_category_name($course->category) ?> / <?= $course->fullname; ?>
          </option>
        <?php }; ?>
      </select>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label>Requisito base
      <small class="text-warning">Ex.: Formação Superior</small>
      </label>
      <input type="text" name="base_requisite" class="span12" placeholder="Requisito base" value="<?= $vacancy->base_requisite; ?>">
    </div>
    <div class="span6">
      <label>Requisito(s) adicional(is)
      <small class="text-warning">Ex.: Experiência Profissional</small>
      </label>
        <input type="text" name="additional_requisite" class="span12" placeholder="Requisito adicional" value="<?= $vacancy->additional_requisite; ?>">
    </div>    
  </div>
  <div class="row-fluid">
    <div class="span5">
      <label>Módulo
      <small class="text-warning">Preencha apenas quando o curso for modular</small>
      </label>
      <input type="text" name="module" class="span12" placeholder="Módulo" value="<?= $vacancy->module; ?>">
    </div>
    <div class="span5">
      <label>Campus
      <small class="text-warning">Preencha apenas a função exigir</small>
      </label>
      <select class="span12" name="campus">
        <option value=""></option>
        <option <?= ($vacancy->campus == 'Campus de Itabaiana' ) ? 'selected' : '' ?> >Campus de Itabaiana</option>
        <option <?= ($vacancy->campus == 'Campus de Lagarto' ) ? 'selected' : '' ?> >Campus de Lagarto</option>
        <option <?= ($vacancy->campus == 'Campus de Laranjeiras' ) ? 'selected' : '' ?> >Campus de Laranjeiras</option>
        <option <?= ($vacancy->campus == 'Campus de São Cristóvão' ) ? 'selected' : '' ?> >Campus de São Cristóvão</option>
        <option <?= ($vacancy->campus == 'Campus do Sertão' ) ? 'selected' : '' ?> >Campus do Sertão</option>
        <option <?= ($vacancy->campus == 'Campus Rural' ) ? 'selected' : '' ?> >Campus Rural</option>
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
    
