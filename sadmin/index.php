 <?php 
session_start();
//include'Conexion.php';
define('CONTROLADOR', TRUE);
include_once'../modelo/SuperUser.php';
include_once'../function/function_eagle.php';
include_once'../config.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Eagle">
  <meta name="keyword" content="eagle">
  <title>Eagle Club- Login</title>

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->


  <div id="login-page">
    <div class="container">
      <form class="form-login" action="<?php echo RUTA_URL.'/sadmin/';?>" method="POST">
     <!-- <h2 class="form-login-heading">Iniciar sesion</h2>-->
        <div class="form-login-heading white-header" style="text-align: center; padding-top: 5px; background-color: #4ecdc4;"><img  width="150" src="../img/eagle-club-login.png" alt="eagle"></div>
        <div class="login-wrap">
          <input type="text" name="user" class="form-control" placeholder="Usuario" autofocus>
          <br>
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <label class="checkbox">
           <!-- <input type="checkbox" value="remember-me"> Remember me-->
            <span class="pull-right">
            <a data-toggle="modal" href="login.php#myModal"> Forgot Password?</a>
            </span>
            </label>
          <input class="btn btn-theme btn-block" type="submit" value="Login">

          <hr>
          <?php 
if (isset($_POST['user']) && isset($_POST['pass'])) {
  $user = trim($_POST['user']);
  $p = trim($_POST['pass']);
  $pass = md5($p);
    #consultar a la base de datos

  //echo $user;
    $data = Superadmin::Superlogin($user, $pass);


var_dump($data);
if (empty($data)) {
  echo alert_msg('Usuario o contraseña invalido','rojo');
}else{




$conUsuario = $data->getUsuario();
$conContra = trim($data->getPass1());

    if (($conUsuario == $user) and ($conContra == $pass)) {
      
      $var_usuario = $data->getUsuario();
      $var_status = $data->getStatus();
      $var_email = $data->getEmail();
      

      $_SESSION['super_user_eagle'] = $var_usuario;
      $_SESSION['super_status_eagle'] = $var_status;
       $_SESSION['super_email_eagle'] = $var_email;
   
      

   header('Location:'.RUTA_URL.'/admin');
    



}else{


echo alert_msg('Datos invalidos','rojo');


}


}

}

 ?>
          
          
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <input class="btn btn-theme" type="submit" value="Login">
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="../lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../img/login-bg2.jpg", {
      speed: 500
    });
  </script>
</body>

</html>