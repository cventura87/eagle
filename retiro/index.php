
<?php 
//incluir monto total disponnible


 ?>
<div class="col-12" style="margin-left: 15px;">
<div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!--  BASIC PROGRESS BARS -->

            
            <!--/showback -->
            <!--  STRIPPED PROGRESS BARS -->
            <div class="showback">

              <form class="form-inline" role="form" method="post" id="form_retiro" onsubmit="return false">
              <h4 class="text-center " style="color: #3c41a4;"><strong> Hacer un nuevo retiro</strong></h4>
         <!--     <label for="label" class="control-label"><strong>Seleccionar wallet</strong></label>
                     
 <select name="wall" id="wall" class="form-control" style="width: 100%;">
   <option value="0">< ?php echo 'Diario ($'.T_DIARIO.')'; ?></option>
   <option value="1">< ?php echo 'Referido ($'.T_REFERIDO .')'; ?></option>

 </select>-->
                    

<label for="label" class="control-label"><strong>Billetra de BTC de retiro</strong></label>
                    <br> 
              <input name="btcwallet" id="btcwallet" class="form-control" type="text" onclick="javascript:validar_w()" style="width: 100%;">
              <span class="text-danger" id="wallet_msg"></span>
               
               <label for="label" class="control-label"><strong>Monto en usd</strong><?php echo '(Disponible $'.$disponible.')'; ?></label>
                
                <input type="hidden" name="disp" id="disp" value="<?php echo $disponible; ?>">
              <input name="usdmonto" id="usdmonto" class="form-control" type="number" onclick="javascript:monto_validar()" style="width: 100%;">
                  <span class="text-danger" id="monto_msg"></span>

              <!-- <label for="label" class="control-label"><strong>Seleccione una Billetera</strong></label>
              <select name="" id="" class="form-control">
                
                <option value="1">Billetera diario</option>
              </select>-->
              
             <span class="text-danger"> Retiro minimo de 25 USD</span>
                     <label class="text-info">Del monto total se debitara el 5% del valor del retiro.</label>

                   
                     <button id="js-enviar" class="btn btn-default">Retirar</button>
                       <div id="estado" style="display:none;"></div>
                   </form>
            </div>
            <!-- /showback -->
            
            <!-- /showback -->
          </div>
          <!-- /col-lg-6 -->
          <div class="col-lg-8 col-md-8 col-sm-12">
            <!--  ALERTS EXAMPLES -->



            
            <!-- /showback -->
            <!--  DISMISSABLE ALERT -->
            <div class="showback" id="historial">
                 
            </div>
            <!-- /showback -->
            <!--  BADGES -->
                        <!-- /showback -->
            <!--  LABELS -->
          
            <!-- /showback -->
          </div>
          <!-- /col-lg-6 -->
        </div>

        </div>