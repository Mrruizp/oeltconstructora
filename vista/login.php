<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>

        <title>OELT Constructora | Ingresar</title>
        <?php include_once 'estilos.view.php';?>

    </head>
    <body class="box-bg">

    <section id="login" class="section">
		<div class="container">

			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 well">

					<div class="row">
				<div class="col-lg-12 text-center">
				<center>
				<img src="../images/logo.png" alt="...">
				</center>
					<h2 class="section-heading">Administrativo OELT Constructora</h2>
					<p class="text-muted text-center">Ingrese su Usuario o Email y la Contraseña para ingresar al Administrativo.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 text-center">

							<div class="form-horizontal">

							<form class="login" id="form">

								<div class="form-group">
									<label class="col-sm-4 control-label" for="formGroup" id="campo">Usuario o Email:</label>
									<div class="input-group col-xs-10 col-xs-offset-1 col-sm-4">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="hidden" name="sesion" value="1" size="30" maxlength="50">
										<input id="email" type="email" class="form-control" placeholder="Usuario o Email..." name="email" maxlength="30" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="formGroup" id="campo">Contraseña:</label>
									<div class="input-group col-xs-10 col-xs-offset-1 col-sm-4">
										<span class="input-group-addon"><i class="fa fa-key"></i></span>
										<input type="password" class="form-control" placeholder="Contraseña..." name="password" maxlength="16" required>
									</div>
								</div>

								<button class="btn primary" type="submit" id="BotonGuardar" data-loading-text="<i class='fa fa-spinner fa-pulse fa-fw'></i> Espere..."><i class="fa fa-sign-in"></i> Ingresar</button>
								<a href="enviarpassword.php"><button class="btn danger" type="button"><i class="fa fa-question-circle"></i> Enviar Contraseña</button></a>

							</form>
							</div>
							</div>
						</div>


				</div>
			</div>


					</div>
				</section>

    <!-- Jquery -->
            <?php include_once 'scripts.view.php';?>
<!-- Modal -->
        <div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-labelledby="modalaviso" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="text-center" id="contenedor">


						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn primary" data-dismiss="modal"><i class="fa fa-success"></i>  Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalsalir" tabindex="-1" role="dialog" aria-labelledby="modalsalirLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body text-center">
		      	<i class="fa fa-info-circle fa-4x text-primary"></i><br>
		        ¿Realmente desea Cerrar la Aplicación?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i>  No</button>
		        <a type="button" class="btn primary" href="http://www.oeltconstructora.com/admin/login.php?sesion=1"><i class="fa fa-sign-out"></i> Si</a>
		      </div>
		    </div>
		  </div>
		</div>

<script>

	$('.dropdown-toggle').dropdown()

	$(function(){
    	$('[data-toggle="tooltip"]').tooltip()
    })

    $(function(){
    	$('[data-toggle="popover"]').popover()
    })

    $(function () {
      $('[data-toggle="popover"]').popover()
    })

    </script>

    <script src="js/sesionValidar.js" type="text/javascript"></script>
    <!--<script type="text/javascript">
        $('#BotonGuardar').on('click', function() {
            var $btn = $(this).button('loading');

             var formData = new FormData($('#form')[0]);

                $.ajax({
                    url: "login.php",
                    type: 'POST',
                    data: formData,
                    //async: false,
                    success: function (data) {
                        $("#contenedor").html(data);
                        $btn.button('reset');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;

        });
    </script>
    -->



    </body>
</html>
