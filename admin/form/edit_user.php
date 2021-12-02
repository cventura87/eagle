    
<?php 
$us = (isset($_REQUEST['us'])) ? $_REQUEST['us'] : null;

// buscar el usuario
$usuario = Usuario::buscarPorId($us);

if (isset($_POST['btnpass'])) {
$msg=array();
  if (!empty($_POST['pass1'])) {
      $pass1 = $_POST['pass1'];
    }else{
$msg[] =array('El campo contraseña esta vacio');
    }

if (!empty($_POST['pass2'])) {
      $pass2 = $_POST['pass2'];
    }else{
$msg[] =array('campo contraseña2 esta vacio');
    }
if(empty($msg)){
  if ($pass1 == $pass2) {
   $password = md5($pass1);
 $usuario->setContrasena($password);
  $save = $usuario->update_password();
  if ($save = 1) {
     echo alert_msg('Actualizado con exito', 'amarillo'); 
  }else{
    echo alert_msg('Error'.$save, 'rojo'); 
  }



  }else{
    alert_msg('Las contraseñas no coinciden', 'rojo');
  }
}else{

  foreach($msg as $row){
 //echo alert_msg($row[0], 'rojo');

  }
}


 
 
}
 ?>
    <div id="login-page">
    <div class="container">
      <form class="form-login" action="?module=users&op=edit&us=<?php echo $us; ?>" method="POST" autocomplete="off">
     
        <div class="form-login-heading white-header" style="text-align: left; padding-left: 15px; padding-top: 5px; background-color: #fcb322;">
            <h5> <?php echo 'Usuario: '.$usuario->getUsuario().'  '.$usuario->getNombre().' '.$usuario->getApellido(); ?></h5>
        </div>
       <div class="login-wrap">
          <input type="password" name="pass1" class="form-control" placeholder="Nueva Contraseña" autofocus autocomplete="off">
          <br>
          <input type="password" name="pass2" class="form-control" placeholder="Repetir contraseña" autocomplete="off">
          <label class="checkbox">
         
            
            </label>
            <did class="pull-right">
               <button name="btnpass" class="btn btn-success"  type="submit"><i class="fa fa-lock"></i> Cambiar</button>

            </did>
          <br>

      </form>
    </div>
  </div>