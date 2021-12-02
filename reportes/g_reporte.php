<?php
$id_reporte = (isset($_REQUEST["id_reporte"])) ? $_REQUEST["id_reporte"] : null;

if($id_reporte){        
	$reporte = Reporte::buscarPorId($id_reporte);  

	$mensaje = alert_msg("Actualizado con exito", "amarillo");



	}else{
		$reporte = new Reporte();
		$mensaje = alert_msg("Guardado con exito", "verde");
	}

/*
if (isset($_POST["id_reporte"])) {
			$id_reporte = clean_str($_POST["id_reporte"]);

		}else{ $id_reporte = null;
}



if (isset($_POST["code_usuario"])) {
			$code_usuario = clean_str($_POST["code_usuario"]);

		}else{ $code_usuario = null;
}
if (isset($_POST["nombre_plan"])) {
			$nombre_plan = clean_str($_POST["nombre_plan"]);

		}else{ $nombre_plan = null;
}
if (isset($_POST["valor_diario"])) {
			$valor_diario = clean_str($_POST["valor_diario"]);

		}else{ $valor_diario = null;
}
if (isset($_POST["estado"])) {
			$estado = clean_str($_POST["estado"]);

		}else{ $estado = null;
}
if (isset($_POST["tipo"])) {
			$tipo = clean_str($_POST["tipo"]);

		}else{ $tipo = null;
}
if (isset($_POST["fecha_diario"])) {
			$fecha_diario = clean_str($_POST["fecha_diario"]);

		}else{ $fecha_diario = null;
}

*/
//$reporte->setId_reporte($id_reporte);
$reporte->setCode_usuario($code_usuario);
$reporte->setNombre_plan($nombre_plan);
$reporte->setValor_diario($valor_diario);
$reporte->setEstado($estado);
$reporte->setTipo($tipo);
$reporte->setFecha_diario($fecha_diario);
$save=$reporte->guardar();
		$idd=$reporte->getId_reporte();
if($save==1){
echo $mensaje;
}else{ 
	echo alert_msg($save, "rojo");
}
?>