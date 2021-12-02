<?php

$id_usuario = (isset($_REQUEST["id_usuario"])) ? $_REQUEST["id_usuario"] : null;

if($id_usuario){        
	$Clsusuario = Usuario::buscarPorId($id_usuario);  

	$mensaje = alert_msg("Actualizado con exito", "amarillo");


	}


if (isset($_POST["id_usuario"])) {
			$id_usuario = clean_str($_POST["id_usuario"]);
			$Clsusuario = Usuario::buscarPorId($id_usuario);  

	$mensaje = alert_msg("Actualizado con exito", "amarillo");

		}else{ $id_usuario = null;
}



if (isset($_POST["pais"])) {
			$pais = clean_str($_POST["pais"]);

		}else{ $pais = null;
}

if (isset($_POST["email"])) {
			$email = clean_str($_POST["email"]);

		}else{ $email = null;
}
//-----------------------------------------------------------


if (isset($_POST["contrasena"])) {

		$contrasena = clean_str($_POST["contrasena"]);

		}else{ $contrasena = null;
}
if (isset($_POST["contrasena2"])) {
			$contrasena2 = clean_str($_POST["contrasena2"]);

		}else{ $contrasena2 = null;
}

//------------------------------------------------------------------
if (isset($_POST["nombre"])) {
			$nombre = clean_str($_POST["nombre"]);

		}else{ $nombre = null;
}
if (isset($_POST["apellido"])) {
			$apellido = clean_str($_POST["apellido"]);

		}else{ $apellido = null;
}
if (isset($_POST["direccion"])) {
			$direccion = clean_str($_POST["direccion"]);

		}else{ $direccion = null;
}
if (isset($_POST["billetera"])) {
			$billetera = clean_str($_POST["billetera"]);

		}else{ $billetera = null;
}
//$usuario->setId_usuario($id_usuario);
$Clsusuario->setPais($pais);
$Clsusuario->setEmail($email);

if(empty($contrasena) && empty($contrasena2)){


}else{



if(is_null($contrasena) || is_null($contrasena2)){
	
}else{
$pass = '';
if ($contrasena == $contrasena2) {
	$pass = md5($contrasena2);
	$Clsusuario->setContrasena($pass);
}else{

	$error = 'las contraseñas no son iguales';
}

}

}



$Clsusuario->setNombre($nombre);
$Clsusuario->setApellido($apellido);
$Clsusuario->setDireccion($direccion);
$Clsusuario->setBilletera($billetera);

if (isset($error)) {
	echo alert_msg($error, "rojo");
}else{


$save=$Clsusuario->update_perfil();
		$idd=$Clsusuario->getId_usuario();


if($save==1){
echo $mensaje;
}else{ 
	echo alert_msg($save, "rojo");
}


}

?>