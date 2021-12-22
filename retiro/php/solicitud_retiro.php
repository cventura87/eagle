<?php
session_start();

$dia_actual = date("D");

if($dia_actual == 'Mon'){

// este archivo es llamado con ajax

  define('CONTROLADOR', TRUE);


include_once('../../modelo/Retiro.php');

$id_retiro = (isset($_REQUEST["id_retiro"])) ? $_REQUEST["id_retiro"] : null;

if($id_retiro){        
	$retiro = Retiro::buscarPorId($id_retiro);  

	//$mensaje = alert_msg("Actualizado con exito", "amarillo");



	}else{
		$retiro = new Retiro();
		//$mensaje = alert_msg("Guardado con exito", "verde");
	}
if (isset($_POST["id_retiro"])) {
			$id_retiro = trim($_POST["id_retiro"]);

		}else{ $id_retiro = null;
}

/*
if (isset($_POST["usuario_ret"])) {
			$usuario_ret = trim($_POST["usuario_ret"]);

		}else{ $usuario_ret = null;
}*/

$usuario_ret = $_SESSION['id_user_eagle'];
/*
if (isset($_POST["paquete_ret"])) {
			$paquete_ret = trim($_POST["paquete_ret"]);

		}else{ $paquete_ret = null;
}*/

 $paquete_ret = $_SESSION['pack_eagle'];
 
if (isset($_POST["wallet_ret"])) {
			$wallet_ret = trim($_POST["wallet_ret"]);

		}else{ $wallet_ret = null;
}
if (isset($_POST["valor_ret"])) {
			$valor_ret = trim($_POST["valor_ret"]);

		}else{ $valor_ret = null;
}

if (isset($_POST["disp"])) {
			$disp = trim($_POST["disp"]);

		}else{ $disp = null;
}

//se marcara como pendiente o en proceso
			$status_ret = 0;


			$fecha_ret = date('d/m/Y');


//$retiro->setId_retiro($id_retiro);
$retiro->setUsuario_ret($usuario_ret);
$retiro->setPaquete_ret($paquete_ret);
$retiro->setWallet_ret($wallet_ret);
$retiro->setValor_ret($valor_ret);
$retiro->setStatus_ret($status_ret);
$retiro->setFecha_ret($fecha_ret);
//var_dump($retiro);

$msg_wallet ='';
$msg_valor ='';
$msg_disp = '';
if ($disp == '' or $disp <25) {
	$msg_disp = '<p class="small" style="color:red">Cantidad inferior al minimo</p>';
}

if ($wallet_ret == '') {
	$msg_wallet = '<p class="small" style="color:red">Ingrese una direccion de BTC</p>';
}

if ($valor_ret == '') {
	$msg_valor = '<p class="small" style="color:red">Ingrese una cantidad para retirar</p>';
}elseif($valor_ret < 25){
  	$msg_valor = '<p class="small" style="color:red">Cantidad Invalida</p>';
}
//comprobando si hay alguna inconsistencia
if (!empty($msg_wallet) or !empty($msg_valor) or !empty($msg_disp)) {
	echo $msg_wallet;
	echo $msg_valor;
		echo $msg_disp;
}else{
	
	//si todo esta bien se guarda
$save=$retiro->guardar();
		$idd=$retiro->getId_retiro();
if($save==1){
//$mensaje;
}else{ 
	//echo alert_msg($save, "rojo");
}



}

}// Dia actual
else{

	echo '<span class="text-warning">Upss, El dia de retiro no es correcto!</span> <span class="fa fa-info-circle text-info" id="popup" title="Las solicitudes de retiros son los dias Lunes"></span>';
}

/*

*/
?>