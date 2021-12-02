
<?php 

$suscriptions = Suscripcion::buscar_suscripcion($code); //paquete $pack_session
 ?>
<div class="col-md-12">
<div class="content-panel">
              <h4> Suscripciones</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>NOMBRE DEL PLAN</th>
                    <th>VALOR</th>
                    <th>ESTADO</th>
                    <th>2.0X</th>
                     <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                 if (empty($suscriptions)) {
                   
                 }else{

  // code...
$stat = $suscriptions['status_pack'];
                   ?>
                  <tr>
                    <td><?php echo 'Pack '.$suscriptions['paquete']; ?></td>
                    <td><?php echo '$'.$suscriptions['valor']; ?></td>
                    <td>

                      <?php 
               if ($stat == 0) {
                echo '<span class="badge bg-danger">No Active</span>';
               }elseif($stat == 1){
               echo ' <span class="badge bg-success">Active</span>';
               }
                       ?>
                     

                    </td>
                    <td><a href="?module=suscription&op=factura" class="btn btn-success">Detalles</a></td>
                  </tr>
                  

                  <?php 
                  }

                   ?>
                </tbody>
              </table>
            </div>
            </div>