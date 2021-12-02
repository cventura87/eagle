

<?php 

//id usuario
$user = (isset($_REQUEST["user"])) ? $_REQUEST["user"] : null;

if(!empty($user)){
           $usuario = Usuario::buscarPorId($user); 

           if($usuario){


    

 $response = $usuario->eliminar();


 if ($response == 1) {
     echo alert_msg("Eliminado con exito", "rojo");
  
 }else{
     echo alert_msg($response, "amarillo");
     }


                               
    }
        
    } 
     ?>

