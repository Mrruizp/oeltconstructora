<?php

require_once '../data/Conexion.class.php';

class Sesion extends Conexion
{

    private $usuario;
    private $clave;

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function iniciarSesion()
    {
        try {
            $sql = "
                    select * from personal where usuario = :p_usuario;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_usuario", $this->getUsuario());
            $sentencia->execute();

            if ($sentencia->rowCount()) {
//Le pregunto si ha devuelto registros
                //El usuario si existe
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                if ($resultado["passw"] === md5($this->getClave())) {

                    if ($resultado["estatus"] === "0") {
                        return "IN"; //Usuario Inactivo
                    } else {
                        session_name("oelt_v2");
                        session_start();

//                        $_SESSION["s_usuario"]  = $resultado["nombre"] . ' ' . $resultado["apellidos"];
                        $_SESSION["s_nombre"]    = $resultado["nombres"];
                        $_SESSION["s_apellidos"] = $resultado["apellidos"];
                        $_SESSION["s_usuario"]   = $this->getUsuario();

                        return "SI"; //Si ingresa
                        //numInicioSsion($_SESSION["s_doc_id"]);
                    }
                } else { //la contraseña no es igual
                    return "CI"; //Contraseña incorrecta
                }
            } else { //No se encontró registros (El usuario no existe)
                return "NE"; //No Existe
            }
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
