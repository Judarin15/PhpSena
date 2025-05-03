<?php

include "modelos/perfil.modelo.php";

class ControladorPerfil{

    static public function ctrPerfil(){

        if(isset($_POST["perfilNombre"])){

            $tabla = "perfiles";

            $datos = array(
                "nombre" => $_POST["perfilNombre"]         
            );

            $respuesta = ModeloPerfil::mdlPerfil($tabla, $datos);

            return $respuesta;

        }

    }

}