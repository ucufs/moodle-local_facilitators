<?php include __DIR__ . '/../base/header.php'; ?>
<?php include __DIR__ . '/new_vacancy-html.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
    
      <h3 class="text-center">Gerenciar Vagas</h3>

        <p class="pull-right">
          <a href="<?php echo URL_BASE . '/vacancy/new_vacancy/' . $edict->id ?>" class="btn btn-default" data-toggle="modal" data-target="#myModal">
          <i class="fa fa-file-text" aria-hidden="true"></i> Adicionar item</a>
        </p>

      <table class="table">
        <tr>
          <th>Evento/Curso</th>
          <th>Função</th>
          <th>Número de vagas</th>
          <th colspan="2" class="center">Ações</th>
        </tr>
        <?php foreach ($vacancies as $vacancy) { ?>        
        <tr>
          <td style="vertical-align: middle"><?= $vacancy->courseid; ?></td>
          <td style="vertical-align: middle"><?= $vacancy->roleid; ?></td>
          <td style="vertical-align: middle"><?= $vacancy->quantity; ?></td>
          <td style="vertical-align: middle">
            <a href="" title="Alterar informações">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  
            </a>            
            <a href="" title="Excluir" onclick="confirm('Deseja excluir o item?')">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
      </table>

        <form action="<?php echo URL_BASE . '/vacancy/update/' ?>" method="POST">
          <?php foreach ($vacancies as $vacancy) { ?> 
          <div class="row-fluid">
            <div class="span5">
              <label>Evento/Curso</label>
              <input type="text" name="courseid" class="span12" placeholder="Nome do evento/curso"  required>
            </div>
            <div class="span5">
              <label>Função</label>
              <input type="text" name="roleid" class="span12" maxlength="4" placeholder="Função" required>
            </div>
            <div class="span2">
              <label>Quantidade</label>
              <input type="number" name="edict_number" class="span12" maxlength="4" placeholder="Número de vagas" required>
            </div>
          </div>
          <?php } ?>
          <div class="row-fluid">
            <div class="span5">
              <label>Evento/Curso</label>
              <input type="text" name="courseid" class="span12" placeholder="Nome do evento/curso"  required>
            </div>
            <div class="span5">
              <label>Função</label>
              <input type="text" name="roleid" class="span12" maxlength="4" placeholder="Função" required>
            </div>
            <div class="span2">
              <label>Quantidade</label>
              <input type="number" name="edict_number" class="span12" maxlength="4" placeholder="Número de vagas" required>
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


