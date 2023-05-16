<?php
require_once 'claseConexion.php'; // requerimos claseConexion.php para poder establecer la conexion

class Votos  //creamos la clase Votos
{
    public static function obtenerVotoPorRut($rut) // creamos la funcion obtenerVotoPorRut , la cual servira para saber si un rut ya voto o no
    {
        try {
            $conexion = new Conexion();
            $sql = 'SELECT * FROM votos 
            WHERE rut=?';  // creamos nuestra consulta
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $rut);  // bindeamos la variable $rut que recibimos a la consulta
            $consulta->execute();  // ejecutamos la consulta
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;  //retornamos la consulta, si retorna algo es porque el rut ya voto,  por lo que mostraremos una alerta sobre esto
                                        // si no retorna nada es porque ese rut no voto por lo que podremos proseguir con la insersion del voto
        } catch (Exception $e) {
            
        }
    }


}