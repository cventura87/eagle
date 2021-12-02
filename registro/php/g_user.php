<?php




		$Clsusuario = new Usuario();
		$mensaje = alert_msg("Guardado con exito", "verde");
	



if (isset($_POST["code"])) {
			$code = clean_str($_POST["code"]);

		}else{ $code = null;
}

//-------------------------------------------------------

/*variables automaticas*/
$status = 0; //0 = no activo



$contra_user = md5($pa1_a);

//$usuario->setId_usuario($id_usuario);
$Clsusuario->setPais($pais_a);
$Clsusuario->setTelefono($telefono_a);
$Clsusuario->setUsuario($usuario_a);
$Clsusuario->setCode($code);
$Clsusuario->setEmail($email1_a);
$Clsusuario->setContrasena($contra_user);
$Clsusuario->setPatrocinador($patrocinador_a);
$Clsusuario->setStatus($status);

if (isset($_POST["fecha_registro"])) {
			$fecha_registro = clean_str($_POST["fecha_registro"]);
            //se recibbira pero nuca se actualizara 

		}else{
		 $Clsusuario->setFecha_registro(date('d/m/Y'));
		 //se guarda solo una vez
}



$save=$Clsusuario->guardar();
		$idd=$Clsusuario->getId_usuario();
if($save==1){

	

	//iniciar una sesion-------------------------------------------------


	$data = Usuario::login($usuario_a, $contra_user);

//var_dump($data);
if (empty($data)) {
  echo alert_msg('Usuario o contraseña invalido','rojo');
}else{




$conUsuario = $data->getUsuario();
$conContra = trim($data->getContrasena());

    if (($conUsuario == $usuario_a) and ($conContra == $contra_user)) {
      
      $var_usuario = $data->getUsuario();
      $var_status = $data->getStatus();
       $var_code = $data->getCode();
         $var_patro = $data->getPatrocinador();


      $_SESSION['user_eagle'] = $var_usuario;
      $_SESSION['status_eagle'] = $var_status;
       $_SESSION['code_eagle'] = $var_code;
       $_SESSION['patro_eagle'] = $var_patro;
      

    header('Location:../data');
    


}

}


	//---------------------------------------------------------------------


	
}else{ 
	echo alert_msg($save, "rojo");
}



?>