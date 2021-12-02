<?php 

// este archivo es llamado con ajax

  define('CONTROLADOR', TRUE);

  include_once'../../function/function_eagle.php';
  include_once'../../modelo/Sucripcion.php';
  include_once'../../modelo/Reporte.php';
       $data_sus = Suscripcion::planes_pago();
     

   
       $reporte = new Reporte();

       

//include'../modelo/Conexion.php';
$conexion = new Conexion();

//evaluando la lista de suscripciones
foreach($data_sus as $key) {
	
$status = $key['status_pack'];
$status_progres = $key['status_progres'];
//datos a guardar enn reportes diaarios
$valor_pack = $key['valor'];

$code_u = $key['code_user']; //1
$plan_u = $key['paquete'];   //2



$plan_user =($valor_pack*2); //valor total del plan con ganancias

#se pagara 360 dias del año, 7 dias de la semana
$valor_d = ($plan_user/360);//pago diario usd  //3
$estado = 1;                                   //4
$tipo = 1;                                     //5
$fecha_pag =date('d/m/Y-H:i:s');              //6


//-----------------------------------------------------------------------






//si el paquete esta activo, y aun no se ha completado el 100% , se paga el bono diario
if ($status == 1 and $status_progres == 0) {
	//pagar


$consulta = $conexion->prepare("INSERT INTO reporte (code_usuario, nombre_plan, valor_diario, estado, tipo, fecha_diario) VALUES(:code_usuario, :nombre_plan, :valor_diario, :estado, :tipo, :fecha_diario)");

$consulta->bindParam(":code_usuario", $code_u);
$consulta->bindParam(":nombre_plan", $plan_u);
$consulta->bindParam(":valor_diario", $valor_d);
$consulta->bindParam(":estado", $status);
$consulta->bindParam(":tipo", $tipo);
$consulta->bindParam(":fecha_diario", $fecha_pag);
$save=$consulta->execute();
 

if ($save){   
echo alert_msg('Pago diario al usuario '.$code_u, 'verde'); 
 }else{   
echo alert_msg( $consulta->errorcode()."/".$consulta->errorinfo()[2], 'rojo');  
  } 




}

}

$conexion = null;


 ?>