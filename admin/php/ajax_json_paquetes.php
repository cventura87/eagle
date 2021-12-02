
<?php 
include_once('../../function/function_eagle.php');
//este archivo es llamado con ajax

define('CONTROLADOR', TRUE);
include_once('../../modelo/Sucripcion.php');

//recibe una consulta como un objeto
$suscriptions = Suscripcion::lista_suscripcionUQuery();
$data = array();

 $result = $suscriptions->fetchAll(PDO::FETCH_ASSOC);


 ?>




                    <?php 
foreach ($result as $key) {
  // code...
  $id_suscripcion =  $key['id_suscripcion'];
  //---------------------------------------------
    $estado = $key['status_pack'];
    if ($estado == 0) {
      $stat = '<span class="badge bg-danger">No Active</span>';
    }elseif($estado == 1){
     $stat = ' <span class="badge bg-success">Active</span>';
   }

  //---------------------------------------------

  $progres = $key['status_progres'];
  $progreso ='';
   if ($progres == 0) {
              $progreso = '<span class="badge bg-danger">En progreso</span>';
               }elseif($progres == 1){
               $progreso = ' <span class="badge bg-success">Completado</span>';
               }

  $paquete = 'Pack '.$key['paquete'];
  $usuario = $key['usuario'];
  //-----------------------------------
  $fech=  $key['fecha_pago'];
  $fecha = fecha_diff($fech);
  //-----------------------------------
  $valor = '$'.$key['valor'];
  //------------------------------------------
 $detalles ='<a href="?module=suscripcion&op=factura&suscripcion='.$id_suscripcion.'" class="btn btn-success btn-xs">Detalles</a';
 $activar = '<a onclick="confirmActive('.$id_suscripcion.')" href ="#"  class="btn btn-success btn-xs"><i class="fa fa-check ">Activar</i></a>';

  $data[] = array('paquete'=>$paquete, 'usuario'=>$usuario, 'fecha'=>$fecha, 'valor'=>$valor, 'status_pack'=>$stat, 'progreso'=>$progreso, 'detalles'=>$detalles, 'activar'=>$activar);

                  } 

$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData"=>$data);

echo json_encode($results);


                  ?>
            