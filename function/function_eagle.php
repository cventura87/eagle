<?php 
/*zanitizar un POST*/
function clean_str($texto)
{     /*eliminar caracteres especiales*/
      $text = preg_replace('([^A-Za-z0-9ñ@.,])', ' ', $texto);	   
      /*Eliminar los espacios vacios al principio y al final*/  					
      return trim($text);
}

/*imprimir en pantalla*/
function _e($string){
	echo $string;
     
}

function alert_msg($mensaje, $color){
     $alert = '';
	if ($color =='rojo') {
		$alert = 'alert-danger';
	}elseif ($color =='amarillo') {
		$alert = 'alert-warning';
	}elseif($color =='verde'){
		$alert = 'alert-success';
	}

	
    

    return'<div class="alert '.$alert.'  alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Message</strong> '.$mensaje.'
              </div>';

}

function alert_msg_pago($mensaje, $color){
     $alert = '';
    if ($color =='rojo') {
        $alert = 'alert-danger';
    }elseif ($color =='amarillo') {
        $alert = 'alert-warning';
    }elseif($color =='verde'){
        $alert = 'alert-success';
    }

    

    return'<div class="alert '.$alert.'  alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong><i class="fa fa-check"></i></strong> '.$mensaje.'
              </div>';

}


function m_num($num){
 
//visualizar un numero con ceros a la izquierda
        if ($num<10) {
         $num = '00'.$num;
         
         }elseif ($num<100) {
         $num = '0'.$num;
         
         }else{
         	$num = $num;
         }
         return $num;
}

function num_pedido($num){
 
//visualizar un numero con ceros a la izquierda
        if ($num<=99) {
         $num = '0000'.$num;
         
         }elseif ($num<=999) {
         $num = '000'.$num;
         
         }elseif($num<=9999){
            $num = '00'.$num;
         }
         elseif($num<=99999){
            $num = '0'.$num;
         }else{
          $num = $num;

         }
         return $num;
}



 function alert_vencimiento($vencimiento, $numDia){
        //  Y-m-d

      $alertVencimiento = date ('d-m-Y', strtotime ('- '.$numDia.' day', strtotime($vencimiento)));
      $fecha =  utf8_encode($alertVencimiento);
      return $fecha;
    }

    function aviso_vencimiento($vencimiento){
    	 $f_actual =  date("d-m-Y");

    	 //fecha actual a comparar
    	 $fecha_actual = strtotime(date("d-m-Y"));

        $color_bac = '';
        $title = '';
       $data = array('color'=>$color_bac, 'title'=>$title);

           $fecha_vencimiento = normalice_fecha($vencimiento);
              //marcar los tres dias antes de la fecha de vencimiento
            $f3 = alert_vencimiento($fecha_vencimiento, '3');
            $f2 = alert_vencimiento($fecha_vencimiento, '2');
            $f1 = alert_vencimiento($fecha_vencimiento, '1');
            
            $f_vencimiento = strtotime($fecha_vencimiento);
                //marcar el producto por vencer 
            if ($f3 == $f_actual || $f2 == $f_actual || $f1 == $f_actual) {
              $color_bac = 'alert-vencimiento';
              $title = 'Este producto vencera muy pronto!';
              $data = array('color'=>$color_bac, 'title'=>$title);
            }elseif($fecha_actual >= $f_vencimiento){
              //marcar el producto vencido

              $color_bac = 'alert-vencido';
              $title = 'Este producto esta vencido!';
              $data = array('color'=>$color_bac, 'title'=>$title);
            }

         return $data ;
    }
//formato fecha de fecha
  function normalice_fecha($fecha){
     //entrada 07/18/2020  m/d/Y
    //salida 2016-07-31  Y-m-d
    $entrada = explode('/', $fecha);
    $salida = $entrada[2].'-'.$entrada[0].'-'.$entrada[1];
    return $salida;

        
    }

  function fecha_diff($fecha){
 //fecha entrada = d m a

$f = explode('/', $fecha);
$fecha_ini = $f[2].'/'.$f[1].'/'.$f[0];
$fecha_ini = trim($fecha_ini);
//echo $fecha_inicial;
//salida  = a m d
$fecha_actual= date("Y/m/d");

if ($fecha_ini == $fecha_actual) {
    return '0 dias';
}else{ 

$fecha_inicial= new DateTime($fecha_ini);
$fecha_actual= new DateTime($fecha_actual);

/*
$dias = (strtotime($fecha_inicial)-strtotime($fecha_actual))/86400;
$dias = abs($dias); $dias = floor($dias);
return $dias;*/
$diff = $fecha_inicial->diff($fecha_actual);
return $diff->days .' dias';
}
  }



    function alert_stock($cantidad, $alert_cantidad, $alert_stock){
        $ref = '';
       if ($alert_stock == 1) {
         if ($cantidad <=$alert_cantidad) {
          $ref = '<a href="#" title="Stock bajo"><span class="badge badge-danger"><i class="fa fa-arrow-down"></i></span></a>';
         
        }
       }else{

       }

       return $ref;
    }


    /*comprobar si existe un archivo*/

    



    $host= $_SERVER["HTTP_HOST"];//  midominio.com 
    $url= $_SERVER["REQUEST_URI"];//    /?parametro=1  parametros enviados
    $dato = $host . $url;
    $data  =explode('/', $dato);

if (isset($data[2])) {
    $module_app = $data[2];
}else{
   $module_app = '';

}
    
if (isset($data[3])) {
  $detalle_ap = $data[3];
  if(!empty($detalle_ap)){
        $dapp=explode('=',$detalle_ap[3]);

  $detalle_app=$dapp[0];

  }
  

}else{
   $detalle_app='';

}

               

               function status($num, $message){
                $data ='';
                if ($num==0) {
                  $data  = '<span class="badge badge-success">'.$message.'</span>';


                }elseif ($num==1) {
                  $data  =  '<span class="badge badge-danger">'.$message.'</span>';

                }else{
                  $data  =  '<span class="badge badge-warning">'.$message.'</span>';

                }
                return $data;

               }


#comprobar si dos variables son iguales

               function compare_data($var1, $var2){
               #comprobar si estan vacias
                
               

                $var1 = trim($var1);
                $var2 = trim($var2);

              //return $var1.'--'.$var2;
             
              
                if (empty($var1)) {
                    $flag1 = 0;
                } else{
                 $flag1 = 1;

                }
                if (empty($var2)) {
                    $flag2 = 0;
                }else{
                    $flag2 = 1;
                }
              
              #retornar mensaje
                    if ($flag1 == 0) {
                        return 'empty';
                    }
                    if ($flag2 == 0) {
                        return 'empty';
                    }

               #--------------------------------------

                    if ($var1 == $var2) {
                        return 'ok';
                    }else{

                        return 'not';
                    }

                    

               }




                ?>