<?php 
session_start();
error_reporting();
//include'../modelo/Conexion.php';
include_once'../config.php';
include_once'../function/function_eagle.php';

$userData = $_SESSION['super_user_eagle'];
/*$code = $_SESSION['code_eagle'];
$status = $_SESSION['status_eagle'];
$patro = $_SESSION['patro_eagle'];
$pack_session = $_SESSION['pack_eagle'];*/

 $super_usuario = $_SESSION['super_user_eagle'] ;
 $super_status =  $_SESSION['super_status_eagle'];
 $super_email = $_SESSION['super_email_eagle'];

$link = "$_SERVER[REQUEST_URI]";


  define('CONTROLADOR', TRUE);
 include_once('../modelo/Reporte.php');

if (isset($_SESSION['super_user_eagle'])) {
  
}else{

  header("Location:".RUTA_URL.'sadmin');
  exit();
  }



 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Eagle">
  <meta name="keyword" content="eagle">
  <title>Datos</title>

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

 <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap.min.css"/>-->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title=""></div>
      </div>
      <!--logo start-->
      <a href="<?php echo RUTA_URL.'/data'?>" class="logo"><b>EAGLE<span>CLUB</span></b></a>
      <!--logo end-->
      



<?php //notification estart aqui,
include'../data/include/notification_start.php';
          
 ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include'menu/menu_left_admin.php'; ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       
       <?php 

$module = (isset($_REQUEST['module'])) ? $_REQUEST['module'] : null;
$op = (isset($_REQUEST['op'])) ? $_REQUEST['op'] : null;
if ($module == 'suscription' or $module == 'reportes' or $module == 'dash') {
  // code...


        ?>
        <div class="row">
          <br>
          <div class="col-lg-12 col-md-12 col-xs-12">
        <?php 

  

 
     include'../data/include/mercado.php';

    include'../data/include/banner.php';
    echo '<br>';
    if ($status == 1) {
   
   $pagos = Reporte::reporte_user($code);

      include'../data/include/progreso_paquete.php';
    }else{
 $pagos = Reporte::reporte_user($code);
      
    }
       

        ?>
      </div></div>
        

        


        
          <!--APP AQUI -->
          <?php 

        }
        
?>


<div class="row">

<?php 
switch ($module) {

case 'solicitud':
include_once('php/lista_solicitudes.php');
break;



case 'retiro':
include_once'../retiro/index.php';
break;

 case 'numeros':
include_once'../data/include/numeros.php';
 break;



//PAGOS DIARIOS
 case 'pagos':
     include_once'../modelo/Sucripcion.php';

 if ($op == 'init') {
   //include_once('pago_day/inicio_pago_diario.php');
  include_once('pago_day/pagando_fijo.php');
 }elseif ($op == 'pag-fijo') {
   // code...
     include_once('pago_day/pagando_fijo.php');
 }


    
    break;


//ADMINISTRAR USUARIOS
 case 'users':
include_once('../modelo/Usuario.php');
  if ($op =='lista') {
      require'php/lista_usuario.php';
   }elseif ($op =='d-user') {
    echo '<div class="col-12"style="padding: 15px 15px 15px 15px;">';
      require_once('php/delete_user.php');
      echo '</div>';
       require_once('php/lista_usuario.php');
   }elseif ($op =='edit') {
       require_once('form/edit_user.php');
   }else{
 
   include_once('usuariosAll.php');
   }
    break;

   
//ADMINISTRAR SUSCRIPCIONES

case 'suscripcion':
include_once('../modelo/Sucripcion.php');
if ($op == 'd-suscript') {
  echo '<div class="col-12"style="padding: 15px 15px 15px 15px;">';
      require_once('php/delete_suscripcion.php');
      echo '</div>';
  require'php/lista_paquetes.php';

}elseif($op == 'lista'){
       require'php/lista_paquetes.php';

}elseif($op == 'activar'){
   echo '<div class="col-12"style="padding: 15px 15px 15px 15px;">';
      require_once('php/activar_suscripcion.php');
      echo '</div>';
       require'php/lista_paquetes.php';

}elseif($op == 'factura'){
   
   require'php/factura_planes.php';
   
}else{

  include_once('paquetesAll.php');
}

    break;

    case 'open':
    require'../data/include/update_fichero.php';
    break;

  case 'suscription':
   include_once'../modelo/Sucripcion.php';
    require'../suscripciones/index.php';
    break;

    case 'open':
    require'../data/include/update_fichero.php';
    break;
 case 'api':
   include'../Payment_btc/example_basic.php';
    break;

   case 'reportes':
   

    require'../reportes/index.php';
    break;
    case 'planes':
    require'../planes/index.php';
    break;
   
    case 'btc':
    require'../pagos/btc_php.php';
    break;
     case 'perfil':

include_once'../modelo/Usuario.php';
include'../registro/php/arrayPaises.php'; 

     $perfil = Usuario::perfil($code);
    require'../data/perfil/perfil.php';
    break;

     case 'payb':
       include_once'../modelo/Sucripcion.php';
       $data_sus = Suscripcion::recuperarTodos();
       $reporte = new Reporte();
    
    require'../sadmin/diario_pay.php';

    break;

    case 'dash':
     $total_diario =  Reporte::total_diario($code); 
    $total_pagos =  Reporte::total_pagado($code); 
    $total_referido =  Reporte::total_referido($code); 

     include_once'../data/include/tablero.php';
 
    break;

  default:


  echo '<br>
          <div class="col-lg-12 col-md-12 col-xs-12">';
   include'../data/include/mercado.php';

    include'../data/include/banner.php';
       // $total_diario =  Reporte::total_diario($code); 

        //$total_pagos =  Reporte::total_pagado($code); 
       // $total_referido =  Reporte::total_referido($code); 
     
        echo '</div>';
         // require'include/tablero.php';
        echo '</div>';
  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
    break;
}
           ?>
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->

    <?php if ($module=='perfil') {
     
    }else{

/*GET https://www.coinbase.com/oauth/authorize?response_type=code&client_id=YOUR_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URL&state=SECURE_RANDOM&scope=wallet:accounts:read*/
     ?>
    <footer class="site-footer" >
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Eagle club</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
        
        </div>

        <a href="<?php echo RUTA_URL.$link; ?>" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>

    <?php } ?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>




  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <script src="../js/js.js"></script>
  <script src="../registro/js/validation_registro.js"></script>
 

 
  
     <script src="../retiro/js/validar_form.js"></script>
     
     <?php if ($module == 'users') {
       echo '<script src="js/user.js"></script>';

     } elseif($module == 'suscripcion'){
        echo '<script src="js/suscripcion.js"></script>';
        
     }elseif($module == 'pago'){
        echo '<script src="js/pago.js"></script>';
        
     }

     ?>

     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
     



  <script type="text/javascript">
    $(document).ready(function() {

var url = location.href;
if (url == "http://eagleclub.com/data/?auth=true") {



      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Eagle club!',
        // (string | mandatory) the text inside the notification
        text: 'Coloca el cursor sobre mí para habilitar el botón Cerrar. Puede ocultar la barra lateral izquierda haciendo clic en el botón junto al logotipo.',
        // (string | optional) the image to display on the left
        image: '../img/eagle-club-gold.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

}
      return false;
    });
  </script>


  <script type="application/javascript">
   /* $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });*/
/*
    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }*/
  </script>


   <script>$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

                
</body>

</html>
