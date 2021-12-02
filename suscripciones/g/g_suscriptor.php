<?php

		$suscripcion = new Suscripcion();
		$mensaje = alert_msg_pago("Suscrito al plan, cuando se complete el pago se activara su Paquete", "amarillo");
	
/*
if (isset($_POST["paquete"])) {
			$paquete = clean_str($_POST["paquete"]);

		}else{ $paquete = null;
}
if (isset($_POST["valor"])) {
			$valor = clean_str($_POST["valor"]);

		}else{ $valor = null;
}
/*
if (isset($_POST["fecha_pago"])) {
			$fecha_pago = clean_str($_POST["fecha_pago"]);

		}else{ $fecha_pago = null;
}*/
/*
if (isset($_POST["code_user"])) {
			$code_user = clean_str($_POST["code_user"]);

		}else{ $code_user = null;
}

*/


$valorpack = $valor;
$code_user =$code;

$fecha = date('d/m/Y');
//$suscripcion->setId_suscripcion($id_suscripcion);
$suscripcion->setPaquete($pack);
$suscripcion->setValor($valor);
$suscripcion->setStatus_pack(0);
$suscripcion->setFecha_pago($fecha);
$suscripcion->setCode_user($code_user);
//-----------------------------------------------
$suscripcion->setBilletera($btc_account);
$suscripcion->setDivisa($divisa);
$suscripcion->setMonto_btc($monto_bitcoin);
$suscripcion->setFee($fee);


$save=$suscripcion->guardar();
		$idd=$suscripcion->getId_suscripcion();
if($save==1){
echo $mensaje;
}else{ 
	echo alert_msg_pago($save, "rojo");
}
?>