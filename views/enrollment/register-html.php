<?php include __DIR__ . '/../base/header.php';?>


<div class="container-fluid">
  <div class="row-fluid">
    <div class="span8 offset2">
      <h3 class="text-center">Inscrição</h3>
      <div class="well well-small">
        <p>
          <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
          <?= $edict->title ?>
        </p>
        <p><b>Função: </b><?= $enroll->rolename ?></p>
        <p><b>Evento: </b><?= $enroll->coursename ?></p>
      </div>
      <fieldset>
        <legend>Dados de Identificação</legend>
      </fieldset>
    </div>
  </div>

<form action="<?php echo URL_BASE . '/enrollment/completion' ?>" method="POST">
  <div class="row-fluid">
    <div class="span4 offset2">
      <label>Nome</label>
      <input type="text" name="name" class="span12" required>
    </div>
    <div class="span2">
      <label>Matrícula SIAPE</label>
      <input type="number" name="siape" class="span12" value="<?= $enroll->siape ?>" readonly>
    </div>
    <div class="span2">
      <label>CPF</label>
      <input type="number" name="cpf" class="span12" value="<?= $enroll->cpf ?>" readonly>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span4 offset2">
      <label>Cargo</label>
      <input type="text" name="cargo" class="span12" required>
    </div>
    <div class="span4">
      <label>E-mail</label>
      <input type="text" name="email" class="span12" required>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span2 offset2">
      <label>RG</label>
      <input type="text" name="rg" class="span12">
    </div>
    <div class="span2">
      <label>Telefone Residencial</label>
      <input type="text" name="tel_residencial" class="span12">
    </div>
    <div class="span2">
      <label>Telefone Institucional</label>
      <input type="text" name="tel_institucional" class="span12">
    </div>
    <div class="span2">
      <label>Celular</label>
      <input type="text" name="cellphone" class="span12" required>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span4 offset2">
      <label>Logradouro</label>
      <input type="text" name="address" class="span12" required>
    </div>
    <div class="span2">
      <label>Número</label>
      <input type="text" name="number" class="span12" required>
    </div>
    <div class="span2">
      <label>Complemento</label>
      <input type="text" name="complement" class="span12">
    </div>
  </div>

  <div class="row-fluid">
    <div class="span3 offset2">
      <label>Bairro</label>
      <input type="text" name="neighborhood" class="span12" required>
    </div>
    <div class="span3">
      <label>Cidade</label>
      <input type="text" name="city" class="span12" required>
    </div>
    <div class="span2">
      <label>Estado</label>
      <select class="span12" required>
        <option value=""></option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
      </select>
    </div>
  </div><br/>

  <div class="row-fluid">
    <div class="span8 offset2">
      <fieldset>
        <legend>Requisitos da Função</legend>
      </fieldset>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4 offset2">
      <label>Requisito Base</label>
      <input type="text" name="cargo" class="span12" required>
    </div>
    <div class="span4">
      <label>Requisito(s) Adicional(is)</label>
      <input type="text" name="email" class="span12" required>
    </div>
  </div><br/>

  <div class="row-fluid">
    <div class="span8 offset2">
      <fieldset>
        <legend>Educação Formal</legend>
      </fieldset>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span8 offset2">
      <p><b>Informe sua titulação de maior nível e anexe seu diploma</b></p>
      <label><input type="radio" name="formal_education" value="male" checked>
      Doutorado, com ou sem pós-doutoramento, na área do curso, ou relacionado diretamente à função que irá desempenhar</label><br/>
      <label><input type="radio" name="formal_education" value="female">
      Doutorado, com ou sem pós-doutoramento, em outras áreas</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Mestrado na área do curso, ou relacionado diretamente à função que irá desempenhar</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Mestrado em outras áreas</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Especialização na área do curso, ou relacionada diretamente à função que irá desempenhar</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Especialização em outra áreas</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Graduação na área do curso, ou relacionada diretamente à função que irá desempenhar</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Graduação em outras áreas</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Ensino médio / Formação técnica na área, ou relacionado diretamente à função que irá desempenhar</label><br/>
      <label><input type="radio" name="formal_education" value="other">
      Ensino médio / Formação técnica em outras áreas</label>
    </div>
  </div><br/>

  <div class="row-fluid">
    <div class="span8 offset2">
      <fieldset>
        <legend>Capacitação</legend>
      </fieldset>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span8 offset2">
      <small>
        <table class="table small">
          <th>Tipo</th>
          <th>Título</th>
          <th>Carga Horária</th>
          <th>Instituição</th>
          <th>Data de Início</th>
          <th>Data de Término</th>
          <th width="70px">Documentação</th>
          <th></th>
          <tr>
            <td>Capacitações relacionadas à função de coordenação e/ou tutoria maior que 80 horas</td>
            <td>Programação Orientada a Objetos</td>
            <td>60</td>
            <th>Fundação Bradesco</th>
            <td>01/03/2016</td>
            <td>30/06/2016</td>
            <td>
              <div class="thumbnail">
                <img src="images/certificado.jpg" alt="Comprovante de experiência" width="70px">
              </div>
            </td>
            <td>
              <a href="#" title="Remover">
                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
              </a>
            </td>
          </tr>
        </table>
      </small>
      <button class="btn btn-small btn-primary" type="button" data-toggle="modal" data-target="#myModal">Adicionar capacitação</button>
      <br/><br/>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span8 offset2">
      <fieldset>
        <legend>Experiência Profissional</legend>
      </fieldset>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span8 offset2">
      <small>
        <table class="table">
          <th>Tipo</th>
          <th>Carga Horária</th>
          <th>Instituição</th>
          <th>Data de Início</th>
          <th>Data de Término</th>
          <th width="70px">Documentação</th>
          <th></th>
          <tr>
            <td>Capacitações relacionadas à função de coordenação e/ou tutoria maior que 80 horas</td>
            <td>Programação Orientada a Objetos</td>
            <th>Fundação Bradesco</th>
            <td>01/03/2016</td>
            <td>30/06/2016</td>
            <td>
              <div class="thumbnail">
                <img src="images/certificado.jpg" alt="Comprovante de experiência" width="70px">
              </div>
            </td>
            <td>
              <a href="#" title="Remover">
                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
              </a>
            </td>
          </tr>
        </table>
      </small>
      <button class="btn btn-small btn-primary" type="button" data-toggle="modal" data-target="#modal_exp">Adicionar experiência</button>
      <br/><br/>
    </div>    
  </div>


  <div class="row-fluid">
    <div class="span8 offset2">
      <button type="submit" class="btn btn-success pull-right">Finalizar inscrição</button>
      <button type="reset" class="btn btn-default pull-right">Cancelar</button>      
    </div>
  </div>
</form>

</div> <!-- container-fluid -->

<!-- Modal capacitação -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar capacitação</h3>
  </div>
  <div class="modal-body">
    <form class="form-horizontal">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Tipo</label>
        <div class="controls">
          <select name="criteria_id" class="span12">
            <option>Capacitações relacionadas à função de coordenação e/ou tutoria maior que 80 horas</option>
            <option>Capacitações relacionadas à função de coordenação e/ou tutoria menor que 80 horas e maior que 20 horas</option>
            <option>Capacitações relacionadas à função de coordenação e/ou tutoria menor que 20 horas e maior que 4 horas</option>
            <option>Capacitações na área de informática realizadas a partir do ano de 2012</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Título</label>
        <div class="controls">
          <input type="text" name="title" class="span12">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Carga Horária</label>
        <div class="controls">
          <input type="text" name="workload" class="span12">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Instituição</label>
        <div class="controls">
          <input type="text" name="institution" class="span12">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Data de Início</label>
        <div class="controls">
          <input type="text" name="dt_start" class="span6">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Data de Término</label>
        <div class="controls">
          <input type="text" name="dt_end" class="span6">
        </div>              
      </div>

      <div class="control-group">
        <label class="control-label" for="inputPassword">Documento Comprobatório</label>
        <div class="controls">
          <input type="file" name="document" class="span6">
        </div>
      </div>

    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-primary">Salvar</button>
  </div>
</div>


<!-- Modal experiência -->
<div id="modal_exp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar experiência</h3>
  </div>
  <div class="modal-body">
    <form class="form-horizontal">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Tipo</label>
        <div class="controls">
          <select name="criteria_id" class="span12">
            <option>Capacitações relacionadas à função de coordenação e/ou tutoria maior que 80 horas</option>
            <option>Capacitações relacionadas à função de coordenação e/ou tutoria menor que 80 horas e maior que 20 horas</option>
            <option>Capacitações relacionadas à função de coordenação e/ou tutoria menor que 20 horas e maior que 4 horas</option>
            <option>Capacitações na área de informática realizadas a partir do ano de 2012</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Título</label>
        <div class="controls">
          <input type="text" name="title" class="span12">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Instituição</label>
        <div class="controls">
          <input type="text" name="institution" class="span12">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Data de Início</label>
        <div class="controls">
          <input type="text" name="dt_start" class="span6">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Data de Término</label>
        <div class="controls">
          <input type="text" name="dt_end" class="span6">
        </div>              
      </div>

      <div class="control-group">
        <label class="control-label" for="inputPassword">Documento Comprobatório</label>
        <div class="controls">
          <input type="file" name="document" class="span6">
        </div>
      </div>

    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-primary">Salvar</button>
  </div>
</div>
