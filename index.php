<?php
include("ingresar_voto.php");                   //incluimos todo lo que vamos a requerir
include ("candidatos.php");
include ("region.php");
$candidatos = Candidatos::obtenerCandidatos();      // creamos una variable candidatos que ocuparemos mas adelante, con la cual llamamos a la funcion obtenerCandidatos de la clase candidatos
$regiones = Regiones::obtenerRegion(); // creamos una variable reguiones que ocuparemos mas adelante, con la cual llamamos a la funcion obtenerRegion de la clase Regiones

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> <!-- Importamos bootstrap para unos pocos estilos-->
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">  <!-- Import de sweetalert para unas alertas mas bonitas-->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>  <!-- Importamos jquery -->
    <title>Prueba desis</title>
</head>
<body>
    
<h1> FORMULARIO DE VOTACIÓN </h1>


<div id="formulario" > 

<form   method="POST" id="ingresarVoto">   <!-- Creamos nuestro formulario -->
    
    <ul>  

        <li> 
        
        <label for="">Nombre y apellido</label>
        <input type="text" id="nombre_apellido" name="nombre_apellido" onchange= "validarNombreApellido()"  required > <!-- Input de nombre y apellido donde al cambiar el llamamos a la funcion validarNombreApellido para confirmar el formato -->
        </li>

        <li> 
        <label for="">Alias</label>
        <input type="text" id="alias" name="alias" onchange = "validarAlias()" required> <!-- Input de alias donde al cambiar el valor llamamos a la funcion ValidarAlias para confirmar el formato -->
        </li> 

        <li> 
        <label for="">RUT</label>
        <input type="text" id="rut" name="rut" onchange= "validarRut()" required> <!--Input de rut donde al cambiar el valor llamamos a la funcion validarRut para confirmar formato -->
        </li> 

        <li> 
        <label for="">Email</label>
        <input type="email" id="correo" name="correo" onchange ="validarCorreo()" required > <!--Input de correo donde al cambiar el valor llamamos a la funcior validarCorreo para confirmar el formato -->
        </li> 

        <li> 
        <label for="">Region</label>
        <select   name="region" id="region">
            
                <?php foreach ($regiones as $rows) { ?>   <!-- Select de region donde gracias a la funcion foreach de php y la variable regiones-->
                    <option value="<?= $rows->id_region ?>">        <!-- Que recordemos tiene todas las regiones, mostramos en las rows el nombre de la region y en el valor pasamos el id de la region-->         
                    <?= $rows->nombre_region ?>
                    </option>
                    
                <?php } ?>
               
        </select>
        </li> 

       
            <div id="comuna"> </div>           <!-- Seccion de comuna la cual nos mostracara codigo html gracias a jquery-->
        

        <li>
        <label for="">Candidatos</label>   
        <select   name="candidatos" id="candidato">  <!--Select de candidatos donde al igual que en regiones gracias a foreach de php y la variable $candidatos mostramos en el select -->
            <option value=""  >Seleccione Candidato</option> <!-- todos los candidatos disponibles, pasando como valor el nombre del candidato -->
                <?php foreach ($candidatos as $rows) { ?>
                    <option value="<?= $rows->nombre_candidato ?>">
                    <?= $rows->nombre_candidato ?>
                    </option>
                <?php } ?>
        </select>
        </li> 
        
        <li>
          
        <label >Como se enteró de nosotros</label>

        <input  class="check" type="checkbox" id="web" value="web" name="opcion[]">    <!-- seccion de checkbox donde cada una tiene su respectivo valor-->
        <label for="web">Web</label>
        <input  class="check" type="checkbox" id="tv" value="tv" name="opcion[]">  <!--y todas del mismo nombre para luego  recibir los respectivos datos en forma de array -->
        <label for="tv">Tv</label>
        <input class="check" type="checkbox" id="scmedia" value="redes_sociales" name="opcion[]"> 
        <label for="scmedia">Redes Sociales</label>
        <input class="check" type="checkbox" id="amigo" value="amigo" name="opcion[]">
        <label class="check" for="amigo">Amigo</label>
        <br>        
        </li>
       
        <input type="submit" name="submit"  value="votar"></button>  <!--Boton que envia el formulario -->
    </ul>
    
    
    

</form>
</div>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php include './validadores.php' ?>  <!-- Incluimos validadores.php que es donde se encuentra gran parte de las validaciones-->
</body>

</html>



<script type="text/javascript">    
    $(document).ready(function(){   // Usamos jquery para que al momento que nuestro select  region cambie, ejecutar una funcion llamada recargarLista
        recargarLista();

        $('#region').change(function(){
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista(){    // esta es la funcion recargar lista que pasa mediante POST el valor del select region, que recordemos en este caso es el id de la region
        $.ajax({
            type:"POST",
            url:"comuna.php",
            data:"comuna=" + $('#region').val(),
            success:function(r){
                $('#comuna').html(r);
            }
        });
    }

</script>