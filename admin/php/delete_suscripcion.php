

<?php 

//id usuario
$suscript = (isset($_REQUEST["d"])) ? $_REQUEST["d"] : null;

if(!empty($suscript)){
           $suscripcion = Suscripcion::buscarPorId($suscript); 

           if($suscripcion){


    

 $response = $suscripcion->eliminar();


 if ($response == 1) {
     // code...
    echo alert_msg("Eliminado con exito", "rojo");
 }else{
     echo alert_msg($response, "amarillo");
 }


                               
	}
        
    } 
     ?>


