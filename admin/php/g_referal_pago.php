<?php
// este documento es llamado con el archivo ajax_activar_suscripcion, para pagar un bono del 10% de referido
if (class_exists('Conexion')) {
  // code...
}else{

  include'../../modelo/Conexion.php';
}


if (class_exists('Reporte')) {
  // code...
}else{

  include'../../modelo/Reporte.php';


}



$conexion = new Conexion();
	//pagar
$tipo = 2;
$status = 1;
$fecha_pag =date('d/m/Y-H:i:s');  
$v_ref =($val_suscripcion*0.10);//10% de un paquete
$pat = explode('/', $patrocinador);

//codigo del usuario patrocinador
$cod_referal = $pat[1];
$query = $conexion->prepare("INSERT INTO reporte (code_usuario, nombre_plan, valor_diario, estado, tipo, fecha_diario) VALUES(:code_usuario, :nombre_plan, :valor_diario, :estado, :tipo, :fecha_diario)");

$query->bindParam(":code_usuario", $cod_referal);//codigo del que refirio
$query->bindParam(":nombre_plan", $pack);
$query->bindParam(":valor_diario", $v_ref);
$query->bindParam(":estado", $status);
$query->bindParam(":tipo", $tipo);
$query->bindParam(":fecha_diario", $fecha_pag);

//verificar porcentaje pagado, para valorar si se le pagara ese bono.
//bono solo es efectivo si el monto total es menor al 90% de su valor.
  $total_pagos =  Reporte::total_pagado($cod_user); 
$total_pagado = $total_pagos;
$tpp = ($total_pagado/0.5); //tpp = total pagado porcentaje
if($tpp <=90){   //si el total pagado es menor o igual al 90%, se le pagara bono


$save=$query->execute();

if ($save){   

echo "Bono de referido, paid success"; 
 }else{   
echo $query->errorcode()."/".$query->errorinfo()[2];  
  } 
 
}else{
echo ' no se le pagara debido a que su porcentaje de pago es mayor A 90%';
}
 






?>