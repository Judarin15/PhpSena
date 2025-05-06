<?php

include "modelos/registro.modelo.php";

class ControladorRegistro{

    static public function ctrRegistro(){

        if(isset($_POST["registroNombre"])){

            $tabla = "personas";

            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "telefono" => $_POST["registroTelefono"],
                "correo" => $_POST["registroCorreo"],
                "clave" => $_POST["registroClave"]            

            );

            $respuesta = ModeloRegistro::mdlRegistro($tabla, $datos);

            return $respuesta;

        }

    }

    static public function ctrIngresar(){

        if(isset($_POST["ingresoCorreo"])){

            $tabla = "personas";
            $item = "pers_correo";
            $valor = $_POST["ingresoCorreo"];
        }
    }

}