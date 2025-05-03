<?php

include "modelos/producto.modelo.php";

class ControladorProducto{

    static public function ctrProducto(){

        if(isset($_POST["productoNombre"])){

            $tabla = "productos";

            $datos = array(
                "nombre" => $_POST["productoNombre"],
                "cantidad" => $_POST["productoCantidad"],
                "precio" => $_POST["productoPrecio"]          
            );

            $respuesta = ModeloProducto::mdlProducto($tabla, $datos);

            return $respuesta;

        }

    }

}