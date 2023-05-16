<?php
class Conexion extends PDO {                 // creamos nuestra clase conexion
    private $tipo_de_base = 'mysql';   // escogemos el tipo de DB que ocuparemos en este caso Mysql
    private $host = 'localhost';   // El hoste, en este caso es local
    private $nombre_de_base = "desis";  // el nombre de la base de datos si se crea con otro nombre cambiar aqui
    private $usuario = "root";   //el usuario con el que ingresaremos en este caso es el usuario root
    private $contrasena = "";  // la contraseña que tiene la base de datos, en este caso no tiene por lo que se deja en blanco
    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); //conectamos a la base de datos

        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();  // si ocurre un error entrara a esta parte del ciclo y nos lo retornara
            exit;
        }
    }
}
 