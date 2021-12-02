


<?php 
//este archivo es llamado con ajax

define('CONTROLADOR', TRUE);
include_once('../../modelo/Usuario.php');

//id usuario
$user = (isset($_REQUEST["user"])) ? $_REQUEST["user"] : null;

if(!empty($user)){
           $usuario = Usuario::buscarPorId($user); 

           if($usuario){


    

 $response = $usuario->eliminar();


 if ($response == 1) {
     // omitimos el mensaje en el diseño original debido a que estaremos usando swetalert.js
    //echo alert_msg("Eliminado con exito", "rojo");
    echo 'Eliminado con exito';
 }else{
     //echo alert_msg($response, "amarillo");
    //echo $response;
    echo 'Una llave del '.$usuario->getUsuario().' no permite la eliminacion mediante este sistema, consulte con el administrador de base de datos' ;
 }


                               
    }
        
    } 
     ?>


