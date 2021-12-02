<?php
include'../data/modo/modo.php';
 define('CONTROLADOR', TRUE);

 $ref = (isset($_REQUEST['ref'])) ? $_REQUEST['ref'] : null;
 $c = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : null;

 include'../config.php'; 
  include'../function/function_eagle.php'; 
   include'../modelo/Usuario.php'; 
$user_class = new Usuario();
$cod = $user_class->num_code();

?>


<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="eagle club">
  <meta name="keyword" content="eagle, club, inversiones, bitcoin">
  <title>Eagle Club- Register</title>

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
   <link href="css/toast.css" rel="stylesheet">
   
   
  
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
      <form class="form-login" action="index.php" method="post" style="margin-top:50px ;">

         
     <!-- <h2 class="form-login-heading">Iniciar sesion</h2>-->
        <div class="form-login-heading white-header" style="text-align: center; padding-top: 5px; background-color: #4ecdc4;"><img  width="150" src="../img/eagle-club-login.png" alt="eagle"></div>

        <?php  
if ($modo['modo'] == 1) {
  // code...

$data_registro = array(
  'pais_a'=>'',
  'telefono_a'=>'',
  'usuario_a'=>'',
  'email1_a'=>'',
  'email2_a'=>'',
  'pa1_a'=>'',
  'pa2_a'=>'',
  'patrocinador_a'=>''
);

if (isset($_POST['registro']) and  !empty($_POST['registro'])) {
  

$pais_a = $_POST['pais'];
$telefono_a = trim($_POST['telefono']);
$usuario_a = trim($_POST['usuario']);
$email1_a = trim($_POST['email1']);
$email2_a = trim($_POST['email2']);
$pa1_a = trim($_POST['pa1']);
$pa2_a = trim($_POST['pa2']);
$patrocinador_a = trim($_POST['patrocinador']);

$data_registro = array(
  'pais_a'=>$pais_a,
  'telefono_a'=>$telefono_a,
  'usuario_a'=>$usuario_a,
  'email1_a'=>$email1_a,
  'email2_a'=>$email2_a,
  'pa1_a'=>$pa1_a,
  'pa2_a'=>$pa2_a,
  'patrocinador_a'=>$patrocinador_a
);


#comprobar  ----------------------------------------------------
$pass = compare_data($_POST['pa1'], $_POST['pa2']);

if ($pass == 'empty') {
  echo alert_msg('El campo contraseña esta vacio', 'rojo');
}elseif($pass == 'not'){
  echo alert_msg('Las contraseñas no coinciden', 'rojo');

}elseif($pass == 'ok'){
  //echo alert_msg('excelente password', 'verde');
  $pass_true =1;

}

 #end comprobacion password---------------------------------------
#comprobar los email
$mail = compare_data($_POST['email1'], $_POST['email2']);

if ($mail == 'empty') {
  echo alert_msg('El campo email esta vacio', 'rojo');
}elseif($mail == 'not'){
 // echo alert_msg('Los email no coinciden', 'rojo');

}elseif($mail == 'ok'){
  //echo alert_msg('excelente email', 'verde');
  $mail_true =1;
}


#end mail
if (($pass_true == 1) && ($mail_true ==1)) {
       include_once'php/g_user.php';

}

     
//echo '<a href="'.RUTA_URL.'" class="btn btn-theme btn-block">Iniciar Sesion</a>';

    
}


     
      include'php/arrayPaises.php'; 



         ?>


        <div class="login-wrap">
          <input type="hidden" name="code" id="code" class="form-control"  value="<?php echo $cod;?>">
          <br>
          

          <select name="pais" id="pais" class="form-control" required>

              <option disabled selected>Selecione Pais</option>
            
            <?php
            
                   $pais_val = $data_registro['pais_a'];
              foreach ($paises as $key) {
                if ($pais_val == $key['id_pais']) {
               echo '<option value="'.$key['id_pais'].'" selected="selected">'.$key['nombre_pais'].'</option>';
                }else{
                  echo '<option value="'.$key['id_pais'].'">'.$key['nombre_pais'].'</option>';
                 
              }
                }
             


            ?>
          </select>
          <br>
          <input type="text" name="telefono" id="telefono" class="form-control"   placeholder="Ingrese su numero de telefono" required value="<?php echo $data_registro['telefono_a'] ?>">
         <br>
         <input type="text" name="usuario" id="usuario" class="form-control"   placeholder="Ingrese su nombre de usuario" required value="<?php echo $data_registro['usuario_a'] ?>">
          <span class="text-red" id="Iusuario"></span>
         <br>
          <input type="email" name="email1" id="email1" class="form-control"   placeholder="Ingrese un correo electronico" autocomplete="off" required value="<?php echo $data_registro['email1_a'] ?>" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
         <br>
         <input type="email" name="email2" id="email2" class="form-control"   placeholder="Confirmar correo electronico" autocomplete="off" required value="<?php echo $data_registro['email2_a'] ?>" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
         <br>
         <input type="password" name="pa1" id="pa1" class="form-control"  placeholder="Contraseña"  autocomplete="off" required value="<?php echo $data_registro['pa1_a'] ?>">

         <br>
          <input type="password" name="pa2" id="pa2" class="form-control"  placeholder="Confirmar Contraseña"  autocomplete="off" required value="<?php echo $data_registro['pa2_a'] ?>">
          <span class="text-red" id="Mpass"></span>
         <br>
          <input type="text" name="patrocinador" class="form-control" placeholder="Patrocinador" value="<?php

           if(isset($ref)){

         echo $ref.'/'.$c;
           }else{
                echo $data_registro['patrocinador_a'];
           }


           ?>">
         <br>



         
          <input name="registro" type="submit" class="btn btn-theme btn-block" value="Crear usuario">
          
          <hr>
          <div class="registration">
            Ya tienes una cuenta?<br/>
            <a class="" href="<?php echo RUTA_URL; ?>">
              INICIAR SESION
              </a>
          </div>
        </div>
         
        
      </form>

      <?php }else{


      echo alert_msg('Estamos en mantenimiento del sistema, para brindarle una mejor experiencia de usuario', 'amarillo');
      } ?>

      
    </div>
  </div>











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
   <script src="js/validation_registro.js"></script>
    



   

<script>
  $( document ).ready( function() {
   
   $('#myModal').modal('show');
} )
    $('#myModal').modal('show');

</script>
</body>

</html>
