<?php 
session_start();
//include'../modelo/Conexion.php';
include_once'../config.php';
include_once'../function/function_eagle.php';

$userData = $_SESSION['user_eagle'];//usuario
$code = $_SESSION['code_eagle'];//usuario
$status = $_SESSION['status_eagle'];//estado
$patro = $_SESSION['patro_eagle'];//patrocinador
$status_pack ='';
$pack_session = 0;

if (isset($_SESSION['pack_eagle'])) {
  // paquete...
  $pack_session = $_SESSION['pack_eagle'];
}

if (isset($_SESSION['status_pack'])) {
  // code...
  $status_pack = $_SESSION['status_pack'];
}



$link = "$_SERVER[REQUEST_URI]";


  define('CONTROLADOR', TRUE);
 include_once'../modelo/Reporte.php';
include_once'../modelo/Retiro.php';


if (isset($_SESSION['user_eagle'])) {
  
}else{

  header("Location:".RUTA_URL);

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
  <title>Dashboard</title>

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css"/>

    <link href="../lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../lib/advanced-datatable/css/DT_bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

 <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
  <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">



 
</head>

<body>
  <section id="container">
    <!-- ********************************   class="sidebar-closed"  **************************************************************************************************************************
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
include'include/notification_start.php';
          
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
     <aside>
      <div id="sidebar" class="nav-collapse">
        <?php include_once('include/menu_left.php'); ?>
      </div>
    
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        ***********************************************************************************************************************************************************  style="margin-left: 210px;"  -->
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

  

 
     include'include/mercado.php';

    include'include/banner.php';
    echo '<br>';
    if ($status_pack == 1) {
   
   

      include'include/progreso_paquete.php';
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

  case 'doc':
  include_once('../doc/datos.php');
  break;
case 'sadmin':
    
    require_once'../sadmin/inicio_pago_diario.php';
    //require'../sadmin/diario_pay.php';
    break;

case 'retiro':
include_once('vars.php');
include_once'../retiro/index.php';
break;

 case 'numeros':
include_once'include/numeros.php';
 break;

 case 'users':
   
    require'../sadmin/lista_usuario.php';
    break;

case 'lsuscript':
   include_once'../modelo/Sucripcion.php';
    require'../sadmin/lista_paquetes.php';
    break;

    case 'open':
    require'include/update_fichero.php';
    break;

  case 'suscription':
    include_once'../modelo/Sucripcion.php';
  if (isset($op)) {
    if ($op == 'factura') {
      require'../suscripciones/factura_plan.php';
    }
     
  }else{

    require'../suscripciones/index.php';
  }
   
    break;

    case 'open':
    require'include/update_fichero.php';
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
    case 'pagos':
    include_once'../modelo/Sucripcion.php';
    require'../pagos/index.php';
    
    break;
    case 'btc':
    require'../pagos/btc_php.php';
    break;
     case 'perfil':

include_once'../modelo/Usuario.php';
include'../registro/php/arrayPaises.php'; 

     $perfil = Usuario::perfil($code);
    require'perfil/perfil.php';
    break;

     case 'payb':
       include_once'../modelo/Sucripcion.php';
       $data_sus = Suscripcion::recuperarTodos();
       $reporte = new Reporte();
    
    require'../sadmin/diario_pay.php';
    break;

    case 'dash':
    include_once('vars.php');
     
     include_once'include/tablero.php';
 
    break;

  default:


  echo '<br>
       <div class="col-lg-12 col-md-12 col-xs-12">';
   include('include/mercado.php');

    include_once('include/banner.php');
    include_once('vars.php');

    
     
     echo '</div>';
          include_once'include/tablero.php';
        echo '</div>';
  //echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
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
   <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>


  <!-- otros add -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="../js/js.js"></script>
  <script src="../registro/js/validation_registro.js"></script>
  <script src="js/copyClipboard.js"></script>
  <script src="js/reloapp.js"></script>
  <script src="js/simplyCountdown.min.js"></script>


 

 



 
   <!-- <script src="  https://code.jquery.com/jquery-3.5.1.js"></script>-->
      <!--<script src=" https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap.min.js"></script>-->
  
     <script src="../retiro/js/validar_form.js"></script>
    
     
    

  <script type="text/javascript">
    $(document).ready(function() {

var url = location.href;
if (url == "http://eagleclub.com/data/?auth=true") {



      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Eagle club!',
        // (string | mandatory) the text inside the notification
        text: 'El exito te espera aqui!',
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

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>


   <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );



       $(document).ready(function() {
      
      /*
       * Initialse DataTables, with no sorting on the 'details' column  yesss
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      
    });
</script>

 


                
</body>

</html>
