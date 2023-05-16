<script>
/* Seccion donde encontramos la mayor parte de las validaciones para cada input, las cuales  estan formadas de una funcion con expresiones regulares para confirmar el formato */ 
    function validarNombreApellido(){  
        var x = document.getElementById("nombre_apellido").value;  // obtenemos el valor de nuestro input nombre_apellido
        var expreg = new RegExp("^(?=.{5,64}$)[a-zñáéíóúA-ZÁÉÍÓÚ]+(?: [a-zñáéíóúA-ZÁÉÍÓÚ]+)?$"); // con expresiones regulares confirmamos si cumple con el formato que en este caso es tener entre 5 y 64 caracteres 
                                    // solo puede tener letas mayusculas o minusculas permitiendo tildes y un espacio de ser requerido para ingresar el apellido 

        if (expreg.test(x)) {// si cumple con el formato no hacemos nada

        } else {  // si no cumple con nuestra expresion regular mostraremos una alerta informando esto
            Swal.fire("CUIDADO!", "El formato de su Nombre y apellido es incorrecto :c (debe tener un minimo de 5 caracteres y no se aceptan caracteres especiales)", "info")
        document.getElementById("nombre_apellido").value = ""; // borramos el valor que tenia el input Nombre_apellido 

        }
    }


    function validarAlias(){
        var x = document.getElementById("alias").value; // obtenemos el valor de nuestro input alias
        var expreg = new RegExp("^(?=.{6,64}$)[a-zñáéíóúA-ZÁÉÍÓÚ0-9]+(?: [a-zñáéíóúA-ZÁÉÍÓÚ0-9]+)?$"); // con expresiones regulares confirmamos si cumple con el formato que en este caso es tener entre 5 y 64 caracteres 
                                    // solo puede tener letas mayusculas o minusculas permitiendo tildes y numeros, un espacio de ser requerido

        if (expreg.test(x)) { // si cumple con el formato no hacemos nada

        } else { // si no cumple con nuestra expresion regular mostraremos una alerta informando esto
            Swal.fire("CUIDADO!", "El formato de su alias es incorrecto :c (debe tener un minimo de 6 caracteres , se aceptan numeros y no se aceptan caracteres especiales :D)", "info");
        document.getElementById("alias").value = ""; // borramos el valor que tenia el input alias

        }
    }


    function validarCorreo() {
            var x = document.getElementById("correo").value;  // obtenemos el valor de nuestro input correo
            var expreg = new RegExp("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$");
            //console.log(expreg.test(x))  //creamos la expresion regular para validar el crreo la cual permite letras, numeros,caracteres especias, luego un @ si osi luego letras y luego un punto y letras ya que pueden tener un dominio de correo propio
            if (expreg.test(x)) {  // si cumple con el formato no hacemos nada

            } else { // si no cumple con nuestra expresion regular mostraremos una alerta informando esto
                Swal.fire("CUIDADO!", "El fomato del Email es incorrecto ;c (ejemplo: correo@correo.cl)", "info");
                document.getElementById("correo").value = ""; // borramos el valor que tenia el input correo

            }
        }



    function validarRut(){
            var x = document.getElementById("rut").value;   // obtenemos el valor de nuestro input rut     
            //console.log(expreg.test(x))
            if (VerificaRut(x)) { // llamamos a la funcion VerificarRut con nuestro rut guardado en la variable x, esta funcion retorna un true o false dependiendo si el rut es correcto o no

            } else { // si no cumple con nuestra expresion regular mostraremos una alerta informando esto
                Swal.fire("CUIDADO!", "Su Rut es incorrecto  o no cumple con el formato (ejemplo 12345678-9, sin puntos y con guion) :c", "info");
                document.getElementById("rut").value = ""; // borramos el valor que tenia el input rut

            }
        }

            


    function VerificaRut(rut) {
        if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
            var caracteres = new Array();
            var serie = new Array(2, 3, 4, 5, 6, 7);
            var dig = rut.toString().substr(rut.toString().length - 1, 1);
            rut = rut.toString().substr(0, rut.toString().length - 2);

            for (var i = 0; i < rut.length; i++) {
                caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));     // Codigo obtenido de https://juanriosp.wordpress.com/2014/06/12/script-de-validacion-de-rut-chileno-en-javascript/
            }                                                                      // el cual verifica que el rut realmente existe.
                                                                                    // ya que es una funcion que funciona bastente bien qusie usarla y no desarrollarla yo ya que no hay que reinventar la piedra
            var sumatoria = 0;
            var k = 0;
            var resto = 0;

            for (var j = 0; j < caracteres.length; j++) {
                if (k == 6) {
                    k = 0;
                }
                sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
                k++;
            }

            resto = sumatoria % 11;
            dv = 11 - resto;

            if (dv == 10) {
                dv = "K";
            }
            else if (dv == 11) {
                dv = 0;
            }

            if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase())
                return true;
            else
                return false;
        }
        else {
            return false;
        }
    }



</script>