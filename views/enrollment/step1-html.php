
<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container-fluid">

<h3 class="text-center">Inscrição</h3>
<div class="well well-small">
  <p>
    <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
    <?= $edict->title ?>
  </p>
  <p><b>Função: </b><?= $vacancy->role_name ?></p>
  <p><b>Evento: </b><?= $vacancy->course_name ?></p>
</div>
<fieldset>
  <legend>Dados de Identificação</legend>
</fieldset>

<form action="<?php echo URL_BASE . '/enrollment/step2/' . $inscript->id ?>" method="POST" enctype="multipart/form-data">

  <div class="row-fluid">
    <div class="span6">
      <label>Nome</label>
      <input type="text" name="name" class="span12" maxlength="255" autofocus required>
    </div>
    <div class="span3">
      <label>Matrícula SIAPE</label>
      <input type="number" name="siape" class="span12" value="<?= $applicant->siape ?>" readonly>
    </div>
    <div class="span3">
      <label>CPF</label>
      <input type="number" name="cpf" class="span12" value="<?= $applicant->cpf ?>" readonly>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span5">
      <label>Cargo</label>
      <input type="text" name="role" class="span12" maxlength="50" required>
    </div>
    <div class="span2">
      <label>Departamento</label>
      <input type="text" name="department" class="span12" maxlength="50" required>
    </div>
    <div class="span5">
      <label>E-mail</label>
      <input type="text" name="email" class="span12" maxlength="45" required>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span2">
      <label>RG</label>
      <input type="text" name="rg" class="span12" maxlength="8">
    </div>
    <div class="span2">
      <label>Emissor</label>
      <select name="agent" class="span12">
        <option value="SSP">SSP - Secretaria de Segurança Pública</option>
        <option value="PM">PM - Polícia Militar</option>
        <option value="PC">PC - Policia Civil</option>
        <option value="CNH">CNH - Carteira Nacional de Habilitação</option>
        <option value="DIC">DIC - Diretoria de Identificação Civil</option>
        <option value="CTPS">CTPS - Carteira de Trabaho e Previdência Social</option>
        <option value="FGTS">FGTS - Fundo de Garantia do Tempo de Serviço</option>
        <option value="IFP">IFP - Instituto Félix Pacheco</option>
        <option value="IPF">IPF - Instituto Pereira Faustino</option>
        <option value="IML">IML - Instituto Médico-Legal</option>
        <option value="MTE">MTE - Ministério do Trabalho e Emprego</option>
        <option value="MMA">MMA - Ministério da Marinha</option>
        <option value="MAE">MAE - Ministério da Aeronáutica</option>
        <option value="MEX">MEX - Ministério do Exército</option>
        <option value="POF">POF - Polícia Federal</option>
        <option value="POM">POM - Polícia Militar</option>
        <option value="SES">SES - Carteira de Estrangeiro</option>
        <option value="SJS">SJS - Secretaria da Justiça e Segurança</option>
        <option value="SJTS">SJTS - Secretaria da Justiça do Trabalho e Segurança</option>
        <option value="ZZZ">ZZZ - Outros (inclusive exterior)</option>
      </select>
    </div>
    <div class="span3">
      <label>Tel. Residencial</label>
      <input type="text" name="telephone" maxlength="11" class="span12">
    </div>
    <div class="span3">
      <label>Tel. Departamento</label>
      <input type="text" name="department_telephone" maxlength="11" class="span12">
    </div>
    <div class="span2">
      <label>Celular</label>
      <input type="text" name="cellular" class="span12" maxlength="11" required>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6">
      <label>Logradouro</label>
      <input type="text" name="address" class="span12" maxlength="150" required>
    </div>
    <div class="span2">
      <label>Número</label>
      <input type="text" name="number" class="span12" maxlength="10" required>
    </div>
    <div class="span4">
      <label>Complemento</label>
      <input type="text" name="complement" class="span12" maxlength="50">
    </div>
  </div>

  <div class="row-fluid">
    <div class="span5">
      <label>Bairro</label>
      <input type="text" name="neighborhood" class="span12" maxlength="50" required>
    </div>
    <div class="span5">
      <label>Cidade</label>
      <input type="text" name="city" class="span12" maxlength="60" required>
    </div>
    <div class="span2">
      <label>Estado</label>
      <select name="state" class="span12" required>
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
    <div class="span12">
      <fieldset>
        <legend>Requisitos da Função</legend>
      </fieldset>
      <div class="alert alert-block" style="color: #004984">
        <small>
        <b>Insira o comprovante para cada item informado (Educação Formal, Capacitação, Experiência Profissional).</b>
        <ul class="unstyled">
          <li>Orientações para envio:</li>
          <li>- Apenas um (1) arquivo para cada item.</li>
          <li>- Tamanho máximo do arquivo: 2MB.</li>
          <li><b>- Formatos permitidos: PDF, JPG, JPEG, PNG.</b></li>
        </ul>
        </small>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label>Requisito Base
        <a href="#" data-toggle="tooltip" data-placement="right" title="" 
        data-original-title="<?= $vacancy->base_requisite ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <input type="file" class="span12 filer_input" name="base_requisite" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="2" required>
    </div>
    <div class="span6">
      <label>Requisito(s) Adicional(is)
        <a href="#" data-toggle="tooltip" data-placement="right" title="" 
        data-original-title="<?= $vacancy->additional_requisite ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <input type="file" class="span12 filer_input" name="additional_requisite" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="2">
    </div>
  </div><br/>

  <div class="row-fluid">
    <div class="span12">
      <button type="submit" class="btn btn-primary pull-right">
      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Prosseguir</button>
      <a href="<?php echo URL_BASE . '/enrollment/cancel_inscription/' . $inscript->id ?>" class="btn btn-default">Cancelar</a>      
    </div>
  </div>
</form>

</div> <!-- container-fluid -->

<?php $view['slots']->stop() ?>