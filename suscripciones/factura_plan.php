
<?php 
//buscar la factura de este usuario

$factura = Suscripcion::buscar_suscripcion($code);

 ?>
<section class="wrapper" style="margin-top: 0;">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  
                  <address>
                <strong> De Eagleclub:  <?php echo md5($factura['id_suscripcion']) ?></strong><br>
                <br>
                <abbr title="Phone"></abbr> 
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  
                  <p>Estado: <?php $estado_pay = $factura['status_pack'];
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
                    <h6><?php echo $userData; ?></h6>
                     <h6><?php echo $_SESSION['nombre_eagle']; ?></h6>
                    
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> FACTURA NO : </div>
                      <div class="pull-right"> <?php echo $factura['id_suscripcion'] ?> </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> FECHA : </div>
                      <div class="pull-right"> <?php echo $factura['fecha_pago'] ?></div>
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
                     
                      <td class="text-left"><?php echo $factura['paquete'] ?></td>
                       <td class="text-left"><?php echo $factura['billetera'] ?></td>
                       <td class="text-left"><?php echo $factura['divisa'] ?></td>

                      <td class="text-right"><?php echo $factura['monto_btc'] ?></td>
                      <td class="text-right"><?php echo $factura['fee'] ?></td>
                      <td class="text-right"><?php echo $factura['fee'].$factura['monto_btc'] ?></td>
                    </tr>
                  
                    <tr>
                      <td colspan="4" rowspan="4">
                        
                        </td>

                        <td class="text-right"><strong>Subtotal</strong></td>
                        <td class="text-right"><?php echo '$'.$factura['valor'] ?></td>
                    </tr>
                    <tr>
                      <td class="text-right no-border"><strong>Fee</strong></td>
                      <td class="text-right"><?php echo '$'.$factura['fee'] ?></td>
                    </tr>
                    
                    <tr>
                      <td class="text-right no-border">
                        <div><strong class="text-red">Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo '$'.($factura['valor']+$factura['fee']) ?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </div></div></div></section>