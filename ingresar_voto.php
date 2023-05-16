<?php
require_once 'claseConexion.php';  // requerimso  claseConexion.php para establecer la conexion
include ("votos.php");  // incluimos votos.php ya que  ocuparemos una funcion de esta clase para saber si el rut ya voto o no


if(isset($_POST["submit"]) && !empty($_POST["submit"])){   //  si existe el post de submit que en este caso es el formulario
                                                         //y este no se encuentra vacio recibiremos todos los datos de dicho formulario
    $nombre_apellido= trim($_POST["nombre_apellido"]);
    $alias = trim($_POST["alias"]);
    $rut = trim($_POST["rut"]);
    $correo = trim($_POST["correo"]);
    $region = trim($_POST["region"]);
    $comuna = trim($_POST["Comuna"]);
    $candidato = trim($_POST["candidatos"]);
    $opciones = '';     // creamos una variable auxiliarllamada opciones que al inicio sera vacio para de esta forma saber si se seleccionaron 2 o mas opciones
    $aux = 0;  // auxiliar que iniciamos en 0 para contar la cantidad de opciones
    if( isset($_POST["opcion"])){      // si existe el post de opcion 
        foreach ($_POST["opcion"] as $valor){  // procederemos a recorrer el array 
            $opciones = $opciones . ' '.$valor . ', ';  // y guardar los valores  eb byestra variable opciones, los que estaran separados por una coma
            $aux = $aux +1;  // aumentamos en 1 nuestro auxiliar para saber cuantas opciones se escogieron
        }
    }

//esta seccion es una seccion de validaciones extra o conocida como doble validacion, en el caso de que por algun motivo el usuario pueda enviar inputs vacios ( lo que es dificil ya que existen otras validaciones aparte que corraboran esto)
// se mostrara una alerta por cada input vacio, indicando que este esta vacio e impidiendo la insersion de los datos
    if($nombre_apellido == ''){   
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe ingresar su nombre y apellido", "info");} </script> ';
    }elseif($alias == ''){
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe ingresar su alias", "info");} </script> ';
    
    }elseif($votoPorRut = Votos::obtenerVotoPorRut($rut)){ //si la funcion retorna algo es porque ese rut ya voto
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "El rut que ingreso ya voto :c", "info");} </script> ';
    }elseif($correo == ''){
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe ingresar un Email", "info");} </script> ';
    }elseif($region == ''){
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe seleccionar una Region", "info");} </script> ';
    }elseif($comuna == ''){
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe seleccionar una Comuna", "info");} </script> '; 
    }elseif($candidato ==''){
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe seleccionar un candidato :c", "info");} </script> ';       
    }elseif($opciones == '' || $aux <2){        
        echo '<script> window.onload = function errorOpciones(){  Swal.fire("CUIDADO!", "Debe seleccionar al menos 2 opciones en la seccion como se enteró de nosotros :c", "info");} </script> ';  
    } else{    // si  no existen inputs vacios entraremos a esta seccion 
        $conexion = new Conexion();  // en la cual hacemos la conxion como siempre

        $sql = "INSERT INTO votos(nombre_apellido, alias, rut, correo, region, comuna, candidato, opciones)   
        VALUES ('$nombre_apellido','$alias','$rut','$correo','$region','$comuna','$candidato','$opciones')"; // creamos nustra consulta sql e insertamos los datos que captamos arriba con sus respectivas variables

        $consulta = $conexion->prepare($sql); // preaparamos la consulta
        $consulta->execute(); //ejecutamos la consulta
        
        if($consulta){  // si todo fue correcto y la consulta se ejecuto bien mostramos la alerta de que se realizo el voto con exito
            echo '<script> window.onload = function errorOpciones(){  Swal.fire("MUY BIEN", "Se realizo el voto con exito :)", "success");} </script> ';
        }else{  // en caso de que ocurriera un error inesperado al momento de insertar los datos se mostrara el respectivo error
            echo '<script> window.onload = function errorOpciones(){  Swal.fire("ERROR!", "Ocurrio un error inesperado", "error");} </script> ';
        }
    }



}


