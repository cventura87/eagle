
  <?php 
include'../QR/config.php'; 
$output_data = false;
$otp = false;


/*$outdir = $_CONFIG['qrcodes_dir'];*/

 /*$PNG_TEMP_DIR = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$outdir.DIRECTORY_SEPARATOR;*/
 $PNG_TEMP_DIR = "../QR/qrimg/";


require "../QR/lib/phpqrcode.php";
require "../QR/lib/class-qrcdr.php";
require "../QR/include/functions.php";

$optionlogo   = 'none';
$output_data = false;
/*$getsection = filter_input(INPUT_POST, "section", FILTER_SANITIZE_STRING);*/
$getsection = '#bitcoin';
$setbackcolor = $_CONFIG['qr_bgcolor'];
$setfrontcolor = $_CONFIG['qr_color'];
$optionlogo = '../QR/images/watermarks/08-btc.png';

/*$setbackcolor = filter_input(INPUT_POST, "backcolor", FILTER_SANITIZE_STRING);
$setfrontcolor = filter_input(INPUT_POST, "frontcolor", FILTER_SANITIZE_STRING);
$optionlogo = filter_input(INPUT_POST, "optionlogo", FILTER_SANITIZE_STRING);*/

/*$optionstyle = filter_input(INPUT_POST, "style", FILTER_SANITIZE_STRING);*/
$optionstyle = '../QR/images/styleselect-default.jpg';
if ($setbackcolor) {
    $stringbackcolor = $setbackcolor;
}
if ($setfrontcolor) {
    $stringfrontcolor = $setfrontcolor;
}

$backcolor = hexdec(str_replace('#', '0x', $stringbackcolor));
$frontcolor = hexdec(str_replace('#', '0x', $stringfrontcolor));

/*$level = filter_input(INPUT_POST, "level", FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, "size", FILTER_SANITIZE_STRING);*/
$level = 'H';
$size = 400;
if (in_array($level, array('L','M','Q','H'))) {
    $errorCorrectionLevel = $level;    
}
if ($size) {
    $matrixPointSize = min(max((int)$size, 4), 32);
}

switch ($getsection) {



case '#bitcoin':
    /*$btc_account = filter_input(INPUT_POST, "btc_account", FILTER_SANITIZE_STRING);
    $btc_amount = filter_input(INPUT_POST, "btc_amount", FILTER_SANITIZE_STRING);
    $btc_label = filter_input(INPUT_POST, "btc_label", FILTER_SANITIZE_STRING);
    $btc_message = filter_input(INPUT_POST, "btc_message", FILTER_SANITIZE_STRING);*/
    $btc_account = $_CONFIG['btc_account'];;
    $btc_amount = $a_pagar_btc;
    $btc_label = 'EagleClub';
    $btc_message = 'Success';


    if ($btc_account) {
        $output_data = 'bitcoin:'.$btc_account;

        if ($btc_amount) {
            $output_data .= '?amount='.$btc_amount;
        }

        if ($btc_label) {
            $output_data .= '&label='.urlencode($btc_label);
        }

        if ($btc_message) {
            $output_data .= '&message='.urlencode($btc_message);
        }
    }
    break;
}


if ($output_data) {

    //Crear el nombre unico del qr, basado en el usuario y fecha:
    $fecha_codqr = date('d/m/Y h:i:s');
    $name_codqr = $userData.$code.$fecha_codqr;

    $trasp = true;//(isset($_POST['transparent']) ? true : false);
   // $filenamepng = $PNG_TEMP_DIR.md5($name_codqr).'.png';
    $filenamesvg = $PNG_TEMP_DIR.md5($name_codqr).'.svg';
   // $filenamepng = $PNG_TEMP_DIR.md5($output_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    // $filenamesvg = $PNG_TEMP_DIR.md5($output_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.svg';
    // $filenameeps = $PNG_TEMP_DIR.md5($output_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.eps';

    // QRcode::png($output_data, $filenamepng, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor);    
    // QRcode::svg($output_data, $filenamesvg, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor);
    // QRcode::eps($output_data, $filenameeps, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor);

   // QRcdr::png($output_data, $filenamepng, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor, $optionstyle);    
    QRcdr::svg($output_data, $filenamesvg, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor, $optionstyle);
    // QRcdr::eps($output_data, $filenameeps, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor);

    //$finalpng = basename($filenamepng);//toma el nombre sin ruta pero con su extension.
    $finalsvg = basename($filenamesvg);



    // $finaleps = basename($filenameeps);

    $mergedimage = false;
/*    //agregar marca de agua a codigo png
    if ($trasp) {
        $finalpng = basename(transparentBg($filenamepng));

  
    }
    if ($optionlogo && $optionlogo !== 'none') {
        $mergedimage = mergeImages($PNG_TEMP_DIR.$finalpng, $optionlogo, false);
    }
    if ($mergedimage) {
        $placeholder = $PNG_TEMP_DIR.$mergedimage;
    } else {
        $placeholder = $PNG_TEMP_DIR.$finalpng;
    }
*/
    $result = array(
       // 'png'=> $finalpng, 
        'svg'=> $finalsvg, 
        // 'eps'=> $finaleps, 
        //'placeholder'=> $placeholder, 
        'optionlogo'=> $optionlogo,
        // 'errore' => QRcode::text($output_data, false, $errorCorrectionLevel, $matrixPointSize, 2),
        /// 'errore'=> $_ERROR,

        );
    if ($otp) {
        $result['otp'] = $otp;
    }

    $result = json_encode($result);
} else {
    $result = json_encode(array('errore'=> getString('provide_more_data'), 'placeholder' => $_CONFIG['placeholder']));
}
//echo $result;
?>

 