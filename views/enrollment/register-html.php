<?php include __DIR__ . '/../base/header.php';?>

<div class="container">
    <h3 class="text-center">Inscrição</h3>
    <div class="row">

        <div class="span8 offset2">

            <div class="well well-small">
                <p>
                    <b>Inscrição: </b><?= $enrollmentnumber ?>
                </p>
                <p>
                    <b>Função: </b><?= $rolename ?>
                </p>
                <p>
                    <b>Curso/Evento: </b><?= $coursename ?>
                </p>
            </div>

            <form action="#" method="POST">
                <fieldset>
                    <legend>Dados de Identificação</legend>
                </fieldset>

                <div class="row">
                    <button type="reset" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Finalizar inscrição</button>
                </div>
            </form>
            <br />

        </div><!-- col-md-8 -->

    </div><!-- initial row -->

</div><!-- container -->
