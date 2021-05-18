<?php

try {

    $usuario = $_POST["p_usuario"];
    $clave   = $_POST["p_clave"];

    require_once '../modelo/Sesion.class.php';
    require_once '../util/functions/Helper.class.php';

    $objSesion = new Sesion();
    $objSesion->setUsuario($usuario);
    $objSesion->setClave($clave);
    //print_r($objSesion);
    $resultado = $objSesion->iniciarSesion();
    Helper::imprimeJSON(200, "", $resultado);
    //print_r($resultado);
} catch (Exception $exc) {
    echo $exc->getMessage();
}
