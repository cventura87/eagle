<?php
$id_superadmin = (isset($_REQUEST["id_superadmin"])) ? $_REQUEST["id_superadmin"] : null;

if($id_superadmin){        
	$superadmin = Superadmin::buscarPorId($id_superadmin);  

	$mensaje = alert_msg("Actualizado con exito", "amarillo");



	}else{
		$superadmin = new Superadmin();
		$mensaje = alert_msg("Guardado con exito", "verde");
	}
if (isset($_POST["id_superadmin"])) {
			$id_superadmin = clean_str($_POST["id_superadmin"]);

		}else{ $id_superadmin = null;
}
if (isset($_POST["nombre"])) {
			$nombre = clean_str($_POST["nombre"]);

		}else{ $nombre = null;
}
if (isset($_POST["apellido"])) {
			$apellido = clean_str($_POST["apellido"]);

		}else{ $apellido = null;
}
if (isset($_POST["usuario"])) {
			$usuario = clean_str($_POST["usuario"]);

		}else{ $usuario = null;
}
if (isset($_POST["email"])) {
			$email = clean_str($_POST["email"]);

		}else{ $email = null;
}
if (isset($_POST["pass1"])) {
			$pass1 = clean_str($_POST["pass1"]);

		}else{ $pass1 = null;
}
if (isset($_POST["pass2"])) {
			$pass2 = clean_str($_POST["pass2"]);

		}else{ $pass2 = null;
}
if (isset($_POST["telefono"])) {
			$telefono = clean_str($_POST["telefono"]);

		}else{ $telefono = null;
}
if (isset($_POST["documento"])) {
			$documento = clean_str($_POST["documento"]);

		}else{ $documento = null;
}
if (isset($_POST["status"])) {
			$status = clean_str($_POST["status"]);

		}else{ $status = null;
}
if (isset($_POST["fecha_registro"])) {
			$fecha_registro = clean_str($_POST["fecha_registro"]);

		}else{ $fecha_registro = null;
}
//$superadmin->setId_superadmin($id_superadmin);
$superadmin->setNombre($nombre);
$superadmin->setApellido($apellido);
$superadmin->setUsuario($usuario);
$superadmin->setEmail($email);
$superadmin->setPass1($pass1);
$superadmin->setPass2($pass2);
$superadmin->setTelefono($telefono);
$superadmin->setDocumento($documento);
$superadmin->setStatus($status);
$superadmin->setFecha_registro($fecha_registro);
$save=$superadmin->guardar();
		$idd=$superadmin->getId_superadmin();
if($save==1){
$mensaje;
}else{ 
	echo alert_msg($save, "rojo");
}
?>