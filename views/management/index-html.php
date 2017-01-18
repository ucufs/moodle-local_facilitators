<?php include __DIR__ . '/../base/header.php';?>

<div class="container">
  <div class="row">
    <div class="span10 offset2">
    
      <h3 class="text-center">Gerenciar Editais</h3>

      <p class="pull-right">
        <a href="<?php echo URL_BASE . '/management/new_edict' ?>" class="btn btn-default">
        <i class="fa fa-file-text" aria-hidden="true"></i> Novo Edital</a>
      </p>

      <table class="table">
        <tr>
          <th>Título</th>
          <th>Número</th>
          <th>Ano</th>
          <th>Data de início</th>
          <th>Data de término</th>
          <th colspan="2" class="center">Ações</th>
        </tr>
        <?php foreach ($results as $result) { ?>        
        <tr>
          <td style="vertical-align: middle"><?= $result->title; ?></td>
          <td style="vertical-align: middle"><?= $result->edict_number; ?></td>
          <td style="vertical-align: middle"><?= $result->validity_year; ?></td>
          <td style="vertical-align: middle"><?= date("d/m/Y", $result->opening); ?></td>
          <td style="vertical-align: middle"><?= date("d/m/Y", $result->closing); ?></td>
          <td>
            <small>
              <table style="padding: 4px">
                <tr class="<?= true ? 'success' : 'error' ?>">
                  <td>Vagas</td>
                  <td>
                    <a href="#" title="Gerenciar vagas ofertadas"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <a href="#" title="Visualizar"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <tr class="<?= true ? 'success' : 'error' ?>">
                  <td>Critérios</td>
                  <td>
                    <a href="#" title="Gerenciar critérios de seleção"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <a href="#" title="Visualizar"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                  </td>
                </tr>
              </table>
            </small>
          </td>
          <td style="vertical-align: middle">
            <a href="<?php echo URL_BASE . '/management/edit/' . $result->id ?>" title="Alterar informações do edital">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  
            </a>            
            <a href="#" title="Ativar/Desativar Edital">
              <i class="fa fa-thumbs-down" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
      </table>
          

    </div>
  </div>
</div>
