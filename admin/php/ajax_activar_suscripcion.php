

<?php 
session_start();


//este archivo es llamado con ajax

define('CONTROLADOR', TRUE);
include_once('../../modelo/Sucripcion.php');

//id_suscripcion
$suscript = (isset($_REQUEST["suscript"])) ? $_REQUEST["suscript"] : null;

if(!empty($suscript)){
           $suscripcion = Suscripcion::searchId($suscript); 
           $val_suscripcion = $suscripcion->getValor();
           //la funcion search cambia dos valores de retorno, status_progress x patrocinador, fee x usuario
           $patrocinador = $suscripcion->getStatus_progres();
           $cod_user = $suscripcion->getCode_user();
           $pack = $suscripcion->getpaquete();
          
//var_dump($suscripcion);


           if($suscripcion){


    //pasarla a modo activa
  $suscripcion->setStatus_pack(1);
  $response = $suscripcion->activar();


 if ($response == 1) {
     // code...
    echo "El paquete se ha Activado con exito, ";
    //pagar el referido un 10% del valor
    include_once('g_referal_pago.php');

 }else{
     echo $response;
 }


                               
	}
        
    } 
     ?>

