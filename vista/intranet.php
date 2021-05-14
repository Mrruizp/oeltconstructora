<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>
            OELT Constructora | Consulta de Certificados
        </title>
        <?php include_once 'estilos.view.php';?>
    </head>
    <body class="box-bg">
        <!-- livezilla.net PLACE SOMEWHERE IN BODY -->
        <!--
<script type="text/javascript" id="e4a954c9fa54a002c0bec2df55e05286" src="http://www.oeltconstructora.com/chat/script.php?id=e4a954c9fa54a002c0bec2df55e05286" defer></script>
-->
        <!-- livezilla.net PLACE SOMEWHERE IN BODY -->
        <div class="boxed-layout">
            <!-- Start Header -->
            <header class="header" id="header">
                <?php include_once 'vista_arriba.view.php';?>
                <?php include_once 'menu_arriba.view.php';?>
            </header>
            <!--/ End Header -->
            <!-- Start Breadcrumbs -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2>
                                Consulta de Certificados
                            </h2>
                            <ul class="bread-list">
                                <li>
                                    <a href="index.php">
                                        Inicio
                                        <i class="fa fa-angle-right">
                                        </i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        Consulta de certificados
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Breadcrumbs -->
            <!-- Start Contact -->
            <section class="contact-us section" id="contact-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-title">
                                <h1>
                                    Consulta de Certificados
                                </h1>
                                <p>
                                    Para saber si una persona ha llevado nuestros cursos por favor consulte con el certificado físico donde encontrará Datos del participante DNI y Código de Certificado.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Contact Form -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form class="form" id="form-buscar">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input name="valor" placeholder="Codigo de Certificadoo o DNI de la Persona" required="required" type="text">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input checked="" class="form-check-input" name="busqueda" type="radio" value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Buscar por Código
                                                </label>
                                            </input>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="busqueda" type="radio" value="2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Buscar por DNI
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn primary" data-loading-text="<i class='fa fa-spinner fa-pulse fa-fw'></i> Espere..." id="BotonBuscar" type="submit">
                                            <i class="fa fa-search">
                                            </i>
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/ End Contact Form -->
                    </div>
                </div>
            </section>
            <!--/ End Contact -->
            <section>
            </section>
            <!-- Map Section -->
            <!--/ End Map Section -->
            <!-- Start Call-To-Action -->
            <section class="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="call-to-main">
                                <h2>
                                    Hable con
                                    <span>
                                        nuestro equipo de ingenieros, escribanos
                                    </span>
                                </h2>
                                <a class="btn" href="contacto.php">
                                    <i class="fa fa-send">
                                    </i>
                                    Contacto
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Call-To-Action -->
            <!-- Start Footer -->
            <?php include_once 'pie.view.php';?>
            <!--/ End footer -->
            <?php include_once 'scripts.view.php';?>
        </div>
        <div aria-hidden="true" aria-labelledby="modalaviso" class="modal fade" id="aviso" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center" id="contenedor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn primary" data-dismiss="modal" type="button">
                            <i class="fa fa-success">
                            </i>
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#BotonBuscar').on('click', function() {
            var $btn = $(this).button('loading');

             var formData = new FormData($('#form-buscar')[0]);

                $.ajax({
                    url: "buscar.php",
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
        <div aria-hidden="true" aria-labelledby="modalaviso" class="modal fade" id="aviso" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center" id="contenedor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="button button-primary" data-dismiss="modal" type="button">
                            <i class="fa fa-success">
                            </i>
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
