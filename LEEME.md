#ACLARACIONES
Tenia unas dudas que pregunte por correo pero no me respondieron asi que lo desarrolle de la forma mas simple posible
y como yo pense que seria, por ejemplo no cree tabla usuarios porque bajo mi punto de vista y lo que yo siempre he creido es que las votaciones no son
incognitas, siempre se saben por este motivo no encontre necesario crear la tabla usuario entre otras, como les dije lo hice de la forma mas simple posible ya que no respondieron mis dudas, tambien introduje todas 
las comunas existentes a la base de datos por lo que puede haber un error entre si la comuna realmente pertenece a esa region, pido disculpas por esto.
Tambien use sweet alert para manejar de una forma mas bonita las alertas y queria usar el modelo de desarrollo MVC pero como era un proyecto pequeño y no sabia si quien lo revisaria es alguien que sabe o no, decidi no usar este modelo de desarrollo para simplificar su lectura y exploracion de archivos.

Use MySql mas espeficicamente con PhpMyadmin que presenta el software XAMPP v3.3.0
la version de PHP que ocupe para desarrollar es PHP 8.1.6

Sin nada mas que aclarar comienzo con los pasos a seguir para instalar el proyecto.

REQUERIMIENTOS:

- PHP 8.1.6
- XAMPP ( De preferencia ya que fue desarrollado con este asi pero si gusta usar otra software  no deberia haber problema)
- Tipo de servidor Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/8.1.6
- Cuenta github
- Mysql


1.- Clonar repositorio
- Estar en https://github.com/Hachigud/PruebaDesis, en la rama main 
- Presionaremos el boton "code" seleccionaremos la op cion "https" y copiaremos el link
- Luego nos redirigiremos a la carpeta donde queramos clonar el repositorio en mi casi como trabajo con xampp seria C:\xampp\htdocs 
- Crearemos la carpeta donde se clonara el repositorio
- Dentro de la carpeta abriremos GITBASH
- Escribiremos git clone y el link que acabamos de copiar (git clone https://github.com/Hachigud/PruebaDesis.git) y presionaremos enter
- Comenzara a clonarse el repositorio

2.- crear DB
- Una vez clonado el repositorio se creara una carpeta llamada PruebaDesis, entraremos en ella
- veremos todos los archivos correspondientes al desarrollo y una carpeta llamada DB entraremos en ella
- Dentro veremos un archivo SQL
- Procederemos a abrir nuestra base de datos
- Crearemos una nueva base de datos y de preferencia la llamaremos desis, en caso de querer llamarla de otra forma nos dirigiremos al claseConexion.php y cambiaremos los datos por los que nosotros deseemos
- Una vez creada nuestra base de datos, selecionaremos esta y arrastraremos el archivo db.sql adentro de nuestra base de datos y actualizaremos nuestra base de datos, en caso de no querer hacerlo de esta forma abriremos el archivo db.sql con bloc de notas o el editor de texto de preferencia, copiaremos el texto que este tiene, y en la seccion de consultas SQL lo pegaremos y ejecutaremos.
- Listo nuestra base de datos esta creada :D.

3.- usar software
- Primero tendremos que iniciar nuestro servidor apache y con la base de datos conectada
- En mi caso como lo estoy haciendo de forma local y con xammp, me dirijo a la ruta http://localhost/desis/pruebadesis/  , en el caso de cada uno seria  http://localhost/"nombreCarpetaCreada"/pruebadesis/, y esta listo para usar.
- En caso de haber hecho el deploy en un servidor debera seguir ip del servidor con la ruta en el que haya clonado el repositorio, al igual que en el caso de tener una base de datos en un servidor estos datos se cambian en claseConexion.php , solo debe seguir los comentarios




Listo, esta completo y listo para realizar votos :D
