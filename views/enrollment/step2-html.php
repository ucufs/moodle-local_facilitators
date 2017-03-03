<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

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

<?php $view['slots']->stop() ?>
