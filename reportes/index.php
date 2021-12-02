

<div class="col-md-12">
<div class="content-panel" style="padding: 15px 15px 15px 15px;">
              <h4> Reportes</h4>
              <hr>
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <!--<table id="example" class="table table-striped table-bordered" style="width:100%">-->
        
        <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRE DEL PLAN</th>
                    <th>VALOR</th>
                    <th>ESTADO</th>
                    <th>TIPO</th>
                     <th>FECHA</th>
                  </tr>
                </thead>
                <tbody>



                  <?php 
                  include_once('../planes/packs.php');

                 /* if (defined('EAGLE_PACKS')) {
                    $pack = EAGLE_PACKS;
                  }else{

                    echo 'Los packs no estan definidos';
                    exit();
                  }*/
                  $i =0;
                  foreach ($pagos as $key) {
                    $status_pad = $key['estado'];
                     $tipo_pad = $key['tipo'];
                 ?>
                  <tr>
                    <td><?php echo $key['id_reporte'] ?></td>
                    <td><?php 

                    echo $plan =  $key['nombre_plan'];

                  /*     if ($plan == $pack[]) {
                         // code...
                       }*/
                  //echo 'reward';

                  ?> </td>
                    <td><?php echo '$'.$key['valor_diario'].'USD' ?></td>
                      <td><?php if ($status_pad == 1) {
                        echo ' <span class="badge bg-success">Paid</span>';
                      }else{
                           echo ' <span class="badge bg-warning">Pendiente</span>';

                      } 

                      ?>
                       </td>

                    <td>

                 <?php if ($tipo_pad == 1) {
                        echo ' <span class="badge bg-theme">Daily</span>';
                      }else{
                           echo ' <span class="badge bg-primary">Referal</span>';

                      } 

                      ?>
                     


                    </td>
                       <td><?php echo $key['fecha_diario'] ?></td>
                  </tr>
                  <?php

                   } ?>
                </tbody>
        </table>


</div>
<br>
<br>
            </div>
            </div>