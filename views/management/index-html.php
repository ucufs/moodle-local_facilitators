<?php include __DIR__ . '/../base/header.php';?>

<div class="container">
  <div class="row">
    <div class="span10 offset2">
    
      <h3 class="text-center">Gerenciar Editais</h3>

      <p class="pull-right">
        <a href="<?php echo URL_BASE . '/management/new_edict' ?>" class="btn btn-primary">
        <i class="fa fa-file-text" aria-hidden="true"></i> Novo Edital</a>
      </p>

      <table class="table">
        <tr>
          <th>Título</th>
          <th>Número</th>
          <th>Ano</th>
          <th>Data de início</th>
          <th>Data de término</th>
          <th>Ações</th>
        </tr>
        <tr>
          <td>Edital pata Seleção de Facilitadores de Aprendizagem</td>
          <td>001</td>
          <td>2017</td>
          <td>13/03/2017</td>
          <td>31/03/2017</td>
          <td>
            <small>
              <table style="padding: 4px">
                <tr class="success">
                  <td>Vagas</td>
                  <td>
                    <a href="#" title="Gerenciar vagas ofertadas"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <a href="#" title="Visualizar"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <tr class="error">
                  <td>Critérios</td>
                  <td>
                    <a href="#" title="Gerenciar critérios de seleção"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <a href="#" title="Visualizar"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                  </td>
                </tr>
              </table>
            </small>        
          </td>
        </tr>
      </table>
          

    </div>
  </div>
</div>
