<?php 
/**
	 * Define la Zona horaria del servidor (Opcional)
	 */
//date_default_timezone_set('America/El_Salvador');
date_default_timezone_set('America/New_York');



/*Configuracion de acceso a la base de datos*/

/*Nombre del servidor*/
define('DB_HOST', 'localhost');



/*Nombre del usuario de la base de datos*/
define('DB_USER', 'root');

/*Contraseña de la base de datos*/
define('DB_PASSWORD', '');

/*Nombre de la base de datos*/
define('DB_NOMBRE', 'eagle');

//Ruta de la aplicacion
define('RUTA_APP', dirname(dirname(__FILE__)));
$uri = $_SERVER['HTTP_HOST'];

//define('RUTA_URL', 'http://eagleclub.com');
define('RUTA_URL', 'http://'.$uri);

define('FAVICON', "../../img/favicon.png");
define('NOMBRE_APP', 'EAGLE');
define('LOGO_APP', '../../img/eagle-club-gold.png');
define('INICIO_APP', '/reportes/');


$packs_eagle =  array(

array("pack"=>"1", "precio"=>"25"),
array("pack"=>"2", "precio"=>"50"),
array("pack"=>"3", "precio"=>"100"),
array("pack"=>"4", "precio"=>"250"),
array("pack"=>"5", "precio"=>"500"),
array("pack"=>"6", "precio"=>"1000"),
array("pack"=>"7", "precio"=>"5000")

);

//define("EAGLE_PACKS", implode("^", $packs_eagle));
 //unset($packs_eagle);
 ?>