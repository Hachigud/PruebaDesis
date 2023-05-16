<?php
require_once 'claseConexion.php';  //requerimos de claseConexion.php para pdoer establecer la conexion

class Regiones     // creamos la clase Regiones la cual contendra 2 funciones   
{
    public static function obtenerRegion()  // obtener region que hace lo que su nombre indica, retornando todas las regiones existentes.
    {
        try {
            $conexion = new Conexion();
            $sql = 'SELECT * FROM region';  // creamos la consulta sql
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;  //devolvemos el resultado de la consulta
        } catch (Exception $e) {
            
        }
    }


    public static function obtenerRegionPorId($id_region)  // obtener region que hace lo que su nombre indica, retornando  las regiones especificas de un id.
    {
        try {
            $conexion = new Conexion();
            $sql = 'SELECT nombre_region FROM region WHERE id_region = ?'; //creamos la consulta sql
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $id_region);  // bindeamos el id que recibimos a nuestra consulta
            $consulta->execute();
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;  // retornamos la respuesta
        } catch (Exception $e) {
            
        }
    }
}


