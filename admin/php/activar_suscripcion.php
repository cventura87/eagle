

<?php 

//id usuario
$suscript = (isset($_REQUEST["suscript"])) ? $_REQUEST["suscript"] : null;

if(!empty($suscript)){
           $suscripcion = Suscripcion::buscarPorId($suscript); 

           if($suscripcion){


    //pasarla a modo activa
  $suscripcion->setStatus_pack(1);
  $response = $suscripcion->activar();


 if ($response == 1) {
     // code...
    echo alert_msg("El paquete se ha Activado con exito", "verde");
     echo '<br>';
 }else{
     echo alert_msg($response, "amarillo");
      echo '<br>';
 }


                               
	}
        
    } 
     ?>

