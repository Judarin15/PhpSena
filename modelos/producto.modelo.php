<?php

require_once "conexion.php";

class ModeloProducto {

    /*=============================================
    Registrar producto
    =============================================*/
    static public function mdlProducto($tabla, $datos){
        $sql = "INSERT INTO {$tabla} 
                    (prod_nombre_producto, prod_cantidad, prod_precio) 
                VALUES 
                    (:nombre, :cantidad, :precio)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["nombre"],   PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":precio",   $datos["precio"],   PDO::PARAM_STR);

        $ok = $stmt->execute();
        $stmt->closeCursor();
        return $ok ? "ok" : "error";
    }



}
