<?php

require_once "conexion.php";

class ModeloRegistro {

    /*=============================================
    Registrar usuario
    =============================================*/
    static public function mdlRegistro($tabla, $datos) {
        $sql = "INSERT INTO {$tabla} 
                    (pers_nombre, pers_telefono, pers_correo, pers_clave) 
                VALUES 
                    (:nombre, :telefono, :correo, :clave)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["nombre"],   PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo",   $datos["correo"],   PDO::PARAM_STR);
        $stmt->bindParam(":clave",    $datos["clave"],    PDO::PARAM_STR);

        $ok = $stmt->execute();
        $stmt->closeCursor();

        return $ok ? "ok" : "error";
    }

    /*=============================================
    Seleccionar registros
    =============================================*/
    static public function mdlSeleccionarRegistro($tabla, $item, $valor) {
        if ($item === null && $valor === null) {
            // Todos los registros
            $sql = "
                SELECT 
                    pk_id_persona AS id,
                    pers_nombre AS nombre,
                    pers_telefono AS telefono,
                    pers_correo AS pers_correo,
                    pers_clave AS pers_clave,
                    DATE_FORMAT(pers_fecha_registro, '%d/%m/%Y') AS fecha 
                FROM {$tabla}
                ORDER BY pk_id_persona DESC
            ";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $datos;

        } else {
            // Un registro filtrado
            $sql = "
                SELECT 
                    pk_id_persona AS id,
                    pers_nombre AS nombre,
                    pers_telefono AS telefono,
                    pers_correo AS pers_correo,
                    pers_clave AS pers_clave,
                    DATE_FORMAT(pers_fecha_registro, '%d/%m/%Y') AS fecha 
                FROM {$tabla}
                WHERE {$item} = :valor
                LIMIT 1
            ";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindValue(":valor", $valor, PDO::PARAM_STR);
            $stmt->execute();
            $dato = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $dato ?: false;
        }
    }

    /*=============================================
    Actualizar registros
    =============================================*/
    public static function mdlActualizarRegistro($tabla, $datos) {
        $sql = "UPDATE {$tabla} 
                SET 
                    pers_nombre = :nombre,
                    pers_telefono = :telefono,
                    pers_correo = :correo,
                    pers_clave = :clave 
                WHERE pk_id_persona = :id";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["nombre"],   PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo",   $datos["correo"],   PDO::PARAM_STR);
        $stmt->bindParam(":clave",    $datos["clave"],    PDO::PARAM_STR);
        $stmt->bindParam(":id",       $datos["id"],       PDO::PARAM_INT);

        $ok = $stmt->execute();
        $stmt->closeCursor();

        return $ok ? "ok" : "error";
    }

}
