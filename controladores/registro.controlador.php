<?php

include "modelos/registro.modelo.php";

class ControladorRegistro {

    /*=============================================
    Registro de usuarios
    =============================================*/
    static public function ctrRegistro() {

        if (isset($_POST["registroNombre"])) {

            $tabla = "personas";

            $datos = array(
                "nombre"   => $_POST["registroNombre"],
                "telefono" => $_POST["registroTelefono"],
                "correo"   => $_POST["registroCorreo"],
                "clave"    => $_POST["registroClave"]
            );

            $respuesta = ModeloRegistro::mdlRegistro($tabla, $datos);

            return $respuesta;
        }
    }

    /*=============================================
    Ingreso de usuarios
    =============================================*/
    static public function ctrIngresar() {

        // Mostrar mensaje de sesión ingresada si la sesión fue validada
        if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] == "ok") {
            echo '<div class="alert alert-success">Sesión ingresada correctamente.</div>';
        }

        if (isset($_POST["ingresoCorreo"])) {

            $tabla = "personas";
            $item = "pers_correo";
            $valor = $_POST["ingresoCorreo"];

            $respuesta = ModeloRegistro::mdlSeleccionarRegistro($tabla, $item, $valor);

            if ($respuesta && isset($respuesta["pers_correo"], $respuesta["pers_clave"])) {

                if ($respuesta["pers_correo"] == $_POST["ingresoCorreo"] && $respuesta["pers_clave"] == $_POST["ingresoClave"]) {

                    $_SESSION["validarIngreso"] = "ok";

                    echo '<div class="alert alert-success">Sesión ingresada correctamente.</div>';
                    
                    echo '<script>
                    setTimeout(function() {
                        window.location = "index.php?modulo=ingreso";
                    }, 1000); // Redirigir después de 1 segundo
                </script>';


                    echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?modulo=ingreso";
                    </script>';

                } else {
                    echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-danger">La contraseña no es válida.</div>';
                }

            } else {
                echo '<div class="alert alert-danger">Usuario no encontrado.</div>';
            }
        }
    }
}
?>
