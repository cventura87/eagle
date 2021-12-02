<?php 

if (isset($_SESSION['super_user_eagle'])) {
  
}else{


  echo '<script>window.location.replace("'.RUTA_URL.'/data/?module=dash");</script>';
  exit();
}

 ?>


<br>
<div class="col-12" style="display: flex;
  justify-content: center;">
<div class="col-md-8 mb">
                <div class="message-p pn">
                  <div class="message-header">
                    <h5>PAGO DIARIO DE PLANES DEL DIA <?php echo date('d  m  Y') ?></h5>
                  </div>
                  <div class="row">
                    <div class="col-md-3 centered hidden-sm hidden-xs">
                      <i  class="img-circle alert-warning fa fa-bitcoin" width="65" style="font-size: 150px;"></i>
                    </div>
                    <div class="col-md-9">
                      <p>
                        <name>EagleClub</name>
                        Pagos en bitcoin
                      </p>
                      <p class="small">3 hours ago</p>
                      <p class="message">Esta accion ara que se le acredite a cada plan un pago de acuerdo a su valor, que aparecera reflejado en los reportes diarios de cada usuario.</p>
                   
                        <form class="form-inline" role="form" method="post" id="js-form" onsubmit="return false">
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputText" placeholder="" value="<?php echo date('d/m/Y') ?>">
                        </div>
                        
                        <button id="js-enviar" class="btn btn-default">Iniciar</button>
                      </form>
                      <br>
                      <p><div id="estado" style="display:none;"></div></p>
                    </div>
                  </div>
                </div>
                <!-- /Message Panel-->

              </div>
              </div>