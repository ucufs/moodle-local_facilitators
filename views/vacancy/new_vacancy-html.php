<!-- Modal new vacancy-->
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