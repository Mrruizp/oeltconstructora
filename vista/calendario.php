<?php
//session_start();
require_once "config.php";
require_once "funciones.php";

if (!empty($_SESSION["nombre_adm"])) {

    @$mysqli = new mysqli($Config->rutadb, $Config->usuariodb, $Config->clavedb, $Config->nombredb);

    if ($mysqli->connect_errno) {

        echo '<div class="alert alert-danger"><i class="fa fa-warning fa-3x"></i><h4>Error al Conectar</h4>Ocurrio un error al conectar al Servidor.</div>';

    } else {

        mysqli_set_charset($mysqli, "utf8");

        if (isset($_REQUEST["mes"])) {
            $mes = $_REQUEST["mes"];
            $ano = $_REQUEST["ano"];
        } else {
            $mes = date('m');
            $ano = date('Y');
            if ($mes != 10) {
                $mes = str_replace('0', '', $mes);
            }
        }

        if ($mes - 1 == 0) {
            $antmes = 12;
            $antano = $ano - 1;
        } else {
            $antmes = $mes - 1;
            $antano = $ano;
        }

        if ($mes + 1 == 13) {
            $proxmes = 1;
            $proxano = $ano + 1;
        } else {
            $proxmes = $mes + 1;
            $proxano = $ano;
        }

        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $tabindex = 1;

        $contenido2 = '<div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel-group">
                    <div class="panel panel-primary">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="panel-title">
                                    <i class="fa fa-calendar"></i> ' . $meses[$mes - 1] . ' ' . $ano . '
                                </h4>
                            </div>
                            <div class="col-xs-8 col-sm-4 text-right">';

        if (date('m') != $mes or $ano != date('Y')) {
            $contenido2 .= '<a href="calendario.php" class="btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ir al mes actual"><i class="fa fa-calendar-check-o fa-lg" aria-hidden="true"></i></a> ';
        }

        $contenido2 .= '<a href="calendario.php?mes=' . $antmes . '&ano=' . $antano . '" class="btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="' . $meses[$antmes - 1] . '"><i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true"></i></a> <a href="calendario.php?mes=' . $proxmes . '&ano=' . $proxano . '" class="btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="' . $meses[$proxmes - 1] . '"><i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-xs-4 col-sm-2 text-right">
                                <select class="form-control calendario" name="ir" onchange="document.location.href=this.value" tabindex="' . $tabindex++ . '">';
        $anoini = $ano - 10;
        $anofin = $ano + 10;
        while ($anoini <= $anofin) {
            $contenido2 .= '<option value="calendario.php?mes=' . $mes . '&ano=' . $anoini . '"';

            if ($ano == $anoini) {
                $contenido2 .= ' Selected';
            }

            $contenido2 .= '>' . $anoini . '</option>';
            $anoini++;
        }

        $contenido2 .= '</select>
                            </div>
                        </div>
                    </div>

                    <div id="personales" class="panel-collapse collapse in" id="panelpadding">
                        <div class="panel-body" id="panelpadding">

                            <small><table class="table table-bordered table-striped" id="panelpadding">
                                <tr>
                                    <th>
                                    DO
                                    </th>
                                    <th>
                                    LU
                                    </th>
                                    <th>
                                    MA
                                    </th>
                                    <th>
                                    MI
                                    </th>
                                    <th>
                                    JU
                                    </th>
                                    <th>
                                    VI
                                    </th>
                                    <th>
                                    SA
                                    </th>
                                </tr>';
        $semana  = date('w', mktime(0, 0, 0, $mes, 1, $ano));
        $candias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        $x       = 1;
        $dia     = 0;
        $sw      = 0;
        while ($sw < 3) {

            if ($dia == 0) {
                $contenido2 .= '<tr>';
            }

            if ($semana == $dia) {
                $sw = 1;
            }

            $contenido2 .= '<td';

            if ($sw == 1 and $x <= $candias and $x == date('d') and $mes == date('m') and $ano == date('Y')) {
                $contenido2 .= ' class="bg-primary"';
            }

            $contenido2 .= '>';

            if ($sw == 1 and $x <= $candias) {

                if ($x == date('d') and $mes == date('m') and $ano == date('Y')) {
                    $contenido2 .= '<strong>' . $x . '</strong>';
                } else {
                    $contenido2 .= $x;
                }

            }

            $contenido2 .= '</td>';

            if ($sw == 1) {
                $x++;
            }

            if ($dia == 6) {
                $contenido2 .= '<tr>';
                $dia = 0;
            } else {
                $dia++;
            }

            if ($x >= $candias and $dia == 6) {
                $sw = 3;
            }

        }

        $contenido2 .= '</table></small>


                        </div>
                    </div>

                    </div>
                    </div>

                </div>
            </div>
        </div>';
    }

} else {

    if ($permisos == "0") {

        $contenido2 = '<section id="datos">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                                <br><div class="alert alert-danger"><i class="fa fa-warning fa-4x"></i><h3>Sin Permisos!</h3>No posee permisos suficientes para ver este calendario.</div>
                            </div>
                        </div>
                    </div>
                </section>';

    } else {

        $contenido2 = '<section id="datos">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                                <br><div class="alert alert-warning"><i class="fa fa-warning fa-4x"></i><h3>Error!</h3>Debe iniciar sesión para ver este calendario.</div>
                            </div>
                        </div>
                    </div>
                </section>';

        header('Location: index.php');

    }

}
//include_once "interfazmodal.php";
