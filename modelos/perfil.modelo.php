<?php

require_once "conexion.php";

class ModeloPerfil {

    /*=============================================
    Registrar perfil
    =============================================*/
    static public function mdlPerfil($tabla, $datos){
        $sql = "INSERT INTO {$tabla} 
                    (perf_nombre) 
                VALUES 
                    (:nombre)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["nombre"],   PDO::PARAM_STR);


        $ok = $stmt->execute();
        $stmt->closeCursor();
        return $ok ? "ok" : "error";
    }



}
