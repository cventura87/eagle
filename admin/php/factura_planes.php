
<?php 
//buscar la factura de este usuario

$suscripcion = (isset($_REQUEST['suscripcion'])) ? $_REQUEST['suscripcion'] : null;
$factura = new Suscripcion();
$detalle = $factura->detalle_suscripcion($suscripcion);

 ?>
<section class="wrapper" style="margin-top: 0;">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                 
                  <address>
                <abbr title="Regresar"> <a href="?module=suscripcion"><span class="fa fa-arrow-left"></span></a></abbr>
                <strong> De Eagleclub:  <?php echo md5($detalle['id_suscripcion']) ?></strong><br>
                <br>
                
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  
                  <p>Estado: <?php $estado_pay = $detalle['status_pack'];
                         if ($estado_pay == 1) {
                         echo ' <span class="badge bg-success">Paid</span>';
                         }else{
                              echo ' <span class="badge bg-warning">Pending</span>';
                         }


                   ?></p>
                </div>
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-9">
                    <h6><?php echo  $detalle['usuario']; ?></h6>
                     <h6><?php echo $detalle['nombre'].' '.$detalle['apellido']; ?></h6>
                    
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> FACTURA NO : </div>
                      <div class="pull-right"> <?php echo $detalle['id_suscripcion'] ?> </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> FECHA : </div>
                      <div class="pull-right"> <?php echo $detalle['fecha_pago'] ?></div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
              
                      <th class="text-left">PLAN</th>
                       <th class="text-left">BILLETERA A PAGAR</th>
                      <th class="text-left">DIVISA</th>
                      
                     
                      <th  class="text-right">PRECIO</th>
                       <th  class="text-right">FEE</th>
                        <th  class="text-right">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     
                      <td class="text-left"><?php echo $detalle['paquete'] ?></td>
                       <td class="text-left"><?php echo $detalle['billetera'] ?></td>
                       <td class="text-left"><?php echo $detalle['divisa'] ?></td>

                      <td class="text-right"><?php echo $detalle['monto_btc'] ?></td>
                      <td class="text-right"><?php echo $detalle['fee'] ?></td>
                      <td class="text-right"><?php echo $detalle['fee'].$detalle['monto_btc'] ?></td>
                    </tr>
                  
                    <tr>
                      <td colspan="4" rowspan="4">
                        
                        </td>

                        <td class="text-right"><strong>Subtotal</strong></td>
                        <td class="text-right"><?php echo '$'.$detalle['valor'] ?></td>
                    </tr>
                    <tr>
                      <td class="text-right no-border"><strong>Fee</strong></td>
                      <td class="text-right"><?php echo '$'.$detalle['fee'] ?></td>
                    </tr>
                    
                    <tr>
                      <td class="text-right no-border">
                        <div><strong class="text-red">Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo '$'.($detalle['valor']+$detalle['fee']) ?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </div></div></div></section>