<?php 



 ?>
<div class="col-lg-12 col-md-12 col-xs-12" style="position: relative; padding: 0px 10px 10px 10px ; ">

  
  <img src="../img/fondo_perfil.svg" alt="" style="position: absolute; width:98%;  margin-left: 10px; margin-right: 10px;">

<div class="col-lg-4 " style="margin-top: 50px;position: absolute; ">
  <h3 style="padding-left: 30px; color: #ffffff;"><?php echo 'Hola '.$userData; ?></h3>
  <p style="padding-left: 30px; color: #ffffff;"><strong>Esta es tu página de perfil. Aquí puede actualizar la configuración la información de su cuenta. </strong></p>
</div>


  <div class="col-md-12 " style="margin-top: 200px;position: absolute;">

     <div class="col-lg-12">
   <?php 

   if (isset($_POST['btn-perfil'])) {
     // code...
    include_once'g_perfil.php';
   }

$perfil = Usuario::perfil($code);
    ?>
 </div>

<div class="col-lg-8" style=" float: left;  margin:0px 0px 0px 0px;">

<div class="content-panel" style="padding: 10px 10px 10px 10px;">

            <div class="form-panelw" style="">
              <form class="form-horizontal  style-form" action="?module=perfil" method="POST">
                <h3>Mi cuenta</h3>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-3">Nombre de usuario</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <input type="text" class="form-control" disabled="" value="<?php echo $userData; ?>">
                       <input name="id_usuario" type="hidden" class="form-control" value="<?php echo $perfil->getId_usuario(); ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-users"></i></button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Direccion de correo electronico</label>
                  <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                      <input name="email" type="text" class="form-control timepicker-24"  value="<?php echo $perfil->getEmail(); ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-envelope-o"></i></button>
                        </span>
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="control-label col-md-3">Nombre</label>
                  <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                      <input name="nombre" type="text" class="form-control" value="<?php echo $perfil->getNombre(); ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-user"></i></button>
                        </span>
                    </div>
                  </div>
                </div>


                  <div class="form-group">
                  <label class="control-label col-md-3">Apellido</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <input name="apellido" type="text" class="form-control"  value="<?php echo $perfil->getApellido(); ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-user"></i></button>
                        </span>
                    </div>
                  </div>
                </div>
                <hr>
                <h3>Informacion de contacto</h3>
                 <div class="form-group">
                  <label class="control-label col-md-3">Direccion</label>
                  <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                      <input name="direccion" type="text" class="form-control"  value="<?php echo $perfil->getDireccion(); ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-edit"></i></button>
                        </span>
                    </div>
                  </div>
                </div>



                <div class="form-group">
                  <label class="control-label col-md-3">Pais</label>
                  <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                      <select name="pais" id="pais" class="form-control">

              
            
            <?php
            
               $pais_perfil = $perfil->getPais();
              foreach ($paises as $key) {
                if ($key['id_pais'] == $pais_perfil) {
                  echo '<option value="'.$key['id_pais'].' " selected="selected">'.$key['nombre_pais'].'</option>';
                }else{

                 echo '<option value="'.$key['id_pais'].'">'.$key['nombre_pais'].'</option>';
                }
               // echo '<option disabled selected>Selecione Pais</option>';
              }
             


            ?>
          </select>
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-frown-o"></i></button>
                        </span>
                    </div>
                  </div>
                </div>
                <hr>
                <h3>Seguridad</h3>

                 <div class="form-group">
                  <label class="control-label col-md-3">BILLETERA DE PAGO (BTC)</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <input name="billetera" type="text" class="form-control"  value="<?php echo $perfil->getBilletera(); ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-bitcoin"></i></button>
                        </span>
                    </div>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-md-3">Contraseña</label>
                  <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                      <input name="contrasena" type="password" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-key"></i></button>
                        </span>
                    </div>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-md-3">Nueva confirmacion de contraseña</label>
                  <div class="col-md-9">
                    <div class="input-group bootstrap-timepicker">
                      <input name="contrasena2" type="password" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-theme02" type="button"><i class="fa fa-key"></i></button>
                        </span>
                    </div>
                  </div>
                </div>

              <input type="submit" class="btn btn-success" name="btn-perfil" value="Actualizar">
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          </div>

          <div class="col-lg-4 col-xs-12" style=" float: left; left; padding: 0px 0px 0px 0px; margin:0px 0px 0px 0px;">
            <div class="form-panel" style="padding: 20px 20px 20px 20px;">
              
                  <label class="control-label col-md-12">LINK DE REFERIDO</label>
                  
                    
                     
                  
                    <div class="input-group bootstrap-timepicker">
                       <input name="referal" id="referal" type="text" class="form-control"  value="<?php echo RUTA_URL.'/registro/?ref='.$userData.'&c='.$perfil->getCode();?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme04" type="button" onclick="copyToClipBoard()">Copiar</button>
                        </span>
                    </div>
                
            
            </div>
            <!-- /form-panel -->
          </div>





        </div>
      </div>