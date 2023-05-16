<?php
require_once 'claseConexion.php';           // Reuerimos de la clase Conexion para establecer la conexion con la DB

class Candidatos   // creamos nuestra clase candidatos
{
    public static function obtenerCandidatos()  // Creamos nuestra funcion para obtener los candidatos
    {
        try {
            $conexion = new Conexion();   // creamos una variable conexion de la clase conexion
            $sql = 'SELECT * FROM candidatos';  // creamos nuestra consulta a la DB en este caso queremos obtener todos los candidatos
            $consulta = $conexion->prepare($sql);   // preparamos la conexion
            $consulta->execute();   // ejecutamos la consulta
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);  // guardamos todos los datos obtenidos en la variable $response
            return $response;    // retornamos los datos
        } catch (Exception $e) {   // en caso de ocurrir un error pasaria a esta seccion
            
        }
    }

}