<?php
$conexion = mysqli_connect ('localhost','root','','desis');  // Establecemos la conexion a la base de datos 
$comuna = $_POST['comuna'];              // Creamos nuestra variable llamada comuna que guardara lo que llegue del metodo POST de comuna , en este caso devuelve el id de la region

$sql = "SELECT * FROM comuna WHERE id_region = '$comuna'";  // creamos nuestra consulta SQL para obtener las comunas por una region especifica
$result = mysqli_query($conexion,$sql);   // ejecutamos la consulta junto con la conexion


$cadena = "<label> Comuna </label>
            <select id='Comuna' name='Comuna' style=' margin-left: 272px;
            padding-right: 25px; max-width: 298px;'>";   // creamos una variable cadena para guardar codigo html


while ($ver= mysqli_fetch_row($result)){ 
    $cadena = $cadena.'<option value='.$ver[1].'>'.($ver[1]).'</option>';  // Recorremos todos los datos del resultado de la consulta 
                                                                        // editando el codigo html de $cadena y dandole los valores  a las opciones del select
}                                                                      // en este caso $ver[1] es el valor que retorno la consulta en la posicion 1 lo que es equivalente al nombre de la comuna
                                                                    // si fuera $ver[0] tendria el valor de id_comuna y si fuera $ver[2] tendria el valor de id_region
echo $cadena."</select>";


