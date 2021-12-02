
        


<?php 




$pack = (isset($_REQUEST['pack'])) ? $_REQUEST['pack'] : null;
switch ($pack) {
  case '1':
  $valor =25;
    // code...
    break;
     case '2':
  $valor =50;
    // code...
    break;
    
     case '3':
  $valor =100;
    // code...
    break;
     case '4':
  $valor =250;
    // code...
    break;
   
     case '5':
  $valor =500;
    // code...
    break;
     case '6':
  $valor =1000;
    // code...
    break;

   break;
     case '7':
  $valor =5000;
    // code...
    break;

  default:
    // code...
    break;
}

$fee =$valor*0.02;

$total_valor = $valor+$fee;


$url = "https://api.binance.com/api/v3/ticker/price";
$data = file_get_contents($url);
$json = json_decode($data, true);

$btc ='';
$dollar =0;

foreach ($json as $k =>$v) {
  if($v['symbol']=='BTCUSDT') {
   $btc = $v['price'];
  }
}

$a_pagar_btc = round($total_valor/$btc,6);
/*echo '1 bitcoin = '.$btc.' USD <br>';
echo '100 dollar = '.round(100/$btc,6).' BTC <br>';*/

 ?>
<div class="row">

                   <!-- plan1 -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              

        
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-box">
               <h5>Direccion bitcoin</h5>
               
                <div class="icn-main-container">
                 
                 <?php 

                    include_once'../QR/qr_create.php';

                    if (file_exists($filenamesvg)) {
                      echo '<img src="'.$filenamesvg.'" width="300" alt="">';
                    }else{
                      echo '<img src="" width="300" alt="qr img">';
                    }
                  ?>
                   

                </div>
                <br>
            <div class="input-group bootstrap-timepicker">
                       <input name="wallet_address" id="wallet_address" type="text" class="form-control"  value="<?php echo $btc_account;?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme04" type="button" onclick="copyWallet()">Copiar</button>
                        </span>
                    </div>

                 <br>
                 <p class="float-left">Cantidad en btc:<span class="badge bg-success"><?php echo round($total_valor/$btc,6)?></span></p>
                 <hr>
                 <?php 
                 $monto_bitcoin = round($total_valor/$btc,6);
                 $divisa = 'BTC';

               //guardar la suscripcion
                 include_once'../suscripciones/g/g_suscriptor.php'; 
              //guardar pago del 10% del referido

              /*     $data_refer = explode('/', $patro);

                   $user_name =$data_refer['0'];
                   $cod_user =$data_refer['1'];



                 include_once'php/g_referal_pago.php';*/

                 ?>
              </div>
             </div>




             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-box">


                <?php echo '<strong>1 bitcoin = '.$btc.' USD</strong> <br>';  ?> 

     
 
              </div>
             </div>
               
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-box">


                <?php echo '<strong>FEE = $'.$fee.'</strong><br>';  ?> 
             
 
              </div>
             </div>



        
            </div>
     
        </div>


