<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>


  <br/><br/>

  <div class="alert alert-success" role="alert">
    <p><b>Inscrição realizada com sucesso!</b></p>
    <!-- <p>O comprovante de inscrição foi enviado para seu e-mail.</p> -->
    Reponse <?= $response ?>
    <p>
      <a href="<?php echo URL_BASE . '/enrollment/receipt/' . $inscript->id ?>" class="btn btn-success right-block">
       Gerar Comprovante
      </a>
    </p>
  </div>


<?php $view['slots']->stop() ?>
