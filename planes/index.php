
<?php 

//si ya adquirio un paquete ya no habra alerta de comprar

if (isset($super_usuario)) {
  // code...
}else{
if (isset($_SESSION['status_pack'])) {

  if ($_SESSION['status_pack'] == 0) {
    include_once'include/alert_vender.php';
 }

}else{
  include_once'include/alert_vender.php';

}

}
include_once'packs.php';

 ?>

<div class="col-lg-12 ">
 
     
                   <?php 

foreach ($packs as $key ) {
  // code...

 ?>

          



                   <!-- plan1 -->

            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12 "  style="float:left;">
              <div class="custom-box bord_div" style="border-radius: 5px; <?php 

 

if (isset($_SESSION['pack_eagle'])) {
              if ($key['pack'] <=$pack_session) { 
  echo 'background-color: #f3f4f9;';
} }
echo '>';

?>">
             
                <div class="icn-main-container">
                  <span class=""><img src="../img/logo_gold_marron.svg" width="90" alt=""></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><h5><?php echo 'pack '.$key['pack']; ?></h5></li>
                  <li><h5><?php echo 'Precio $'.$key['precio']; ?></h5></li>
                  <li>tarifa 2%</li>
                 <li></li>
                </ul>

                <p>Ganancias del 0,05% al 0,06% de todos los dias</p>
                <?php 
                      //si ya tomo un paquete
                
                   if (isset($_SESSION['pack_eagle'])) {
                 
                if ($key['pack'] <=$pack_session) { 
  
                



                               ?>
                <a class="btn btn-default" href="#" style="background-color: #e3e3e3; cursor: not-allowed;">Comprar</a>

              <?php }

//-----------------------------------------
              else{ ?>
<?php 
$ref =RUTA_URL.'/registro?ref='.$userData.'&c='.$code;

  



if($_SESSION['status_pack'] == 1){
echo '<a class="btn btn-success" href="'.$ref.'">Comprar</a>';

}else{
  


 ?>

 <a class="btn btn-success" href="<?php echo '?module=pagos&pack='.$key['pack']; ?>">Comprar</a>
<?php }



}} else{


  //no ha tomado ningun paquete

  echo '<a class="btn btn-success" href="?module=pagos&pack='.$key["pack"].'">Comprar</a>';
}







 ?>

              </div>

          
              <!-- end plan1 -->
            </div>
          
       

          <?php 

          }//end foreach ?>
            </div>
          