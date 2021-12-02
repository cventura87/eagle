<?php 

$pagos = Reporte::reporte_user($code);
$total_p =Reporte::total_pagado($code);
include_once'../planes/packs.php';
if (!empty($pagos)) {
    // code...

foreach ($pagos as $key) {
                    $pack = $key['nombre_plan'];
                   
                 }
switch ($pack) {
     case '1':
  $valor =25;
    // code...
    break;
     case '2':
  $valor =50;
    // code...
    break;
    
     case '3':
  $valor =100;
    // code...
    break;
     case '4':
  $valor =250;
    // code...
    break;
   
     case '5':
  $valor =500;
    // code...
    break;
     case '6':
  $valor =1000;
    // code...
    break;
      case '7':
  $valor =5000;
    // code...
    break;
    
    default:
        // code...
        break;
}
//total a pagar en todo el plan
$plan_user =($valor*2); //valor total del plan con ganancias $50

//200% de reembolso
//$porcent = ($total_p/200)*100;

$porcent = ($total_p/$plan_user*100);
//--------------------------------------
$porcentaje = 0.00;
//evaluando el porcentaje
if ($porcent >=100) {
  
  $porcentaje = 100;
    $porcent = 100;
}else{
    $porcentaje = $porcent;
}
//-----------------------------------------
}else{

    $porcent = 0;
    $porcentaje = 0.00;
    }
 ?>


<div class="bar-progres">
              <h4><i class=""></i> Progreso de su paquete</h4>

            <div class="progress progress-striped active">
  <div class="progress-bar" role="progressbar" style="<?php echo 'width:'.$porcentaje.'%;';?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php 
if ($porcent == 0) {
  
     echo '0%';
     
}else{

  
   echo round($porcent,2).'%';
}
 ?></div>
</div>
</div>