<?php 
//leer
 $archivo = fopen("modo/modo.php", "r");

 $numlinea = 1;
 while ($linea = fgets($archivo)) {

   // $aux[] = $linea;    
  echo $numlinea++.' / '.$linea.'<br/>';;
}

fclose($archivo);

//-------------------------------------------


//escribir 

 $archivo = fopen("modo/modo.php", "w");


 fwrite($archivo, " <?php $"."modo"." = array('modo'=>0); ?>" . PHP_EOL);


fclose($archivo);

 ?>

