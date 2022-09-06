 <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
<?php 

$a = (isset($_REQUEST['a'])) ? $_REQUEST['a'] : null;
switch ($a) {
	case 'login':
	filexist('login.html');
	//include_once('login.php');
	break;

	case 'count':
	filexist('count.html');
	//include_once('count.php');
	break;


	case 'about':
	filexist('about.html');
	//include_once('about.html');
	break;

	case 'contact':
	filexist('contacts.html');
	//include_once('contacts.html');
	break;

	default:
filexist('home.html');
	//require_once('home.html');
	break;
}

function filexist($file){
	if (file_exists($file)) {
		return true;
		require_once($file);
	}else{
		echo'<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Message</strong> error al abrir la secuencia: no existe el archivo o directorio <strong>'.$file.'</strong>
              </div>';
	}
}
?>



