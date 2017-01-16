<?php include __DIR__ . '/../base/header.php';?>

<div class="container">

  <div class="row">
  <br/><br/>
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-success" role="alert">
        <p><b>Inscrição realizada com sucesso!</b></p>
        <!-- <p>O comprovante de inscrição foi enviado para seu e-mail.</p> -->
        <p>
          <a href="<?php echo URL_BASE . '/enrollment/receipt' ?>" class="btn btn-primary right-block">
            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Gerar Comprovante
          </a>
        </p>
      </div>
    </div>

  </div>

</div>
