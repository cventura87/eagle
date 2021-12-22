<?php 

$a = (isset($_REQUEST['a'])) ? $_REQUEST['a'] : null;
switch ($a) {
	case 'login':
	include_once('login.php');
	break;

	case 'count':
	include_once('count.php');
	break;


	case 'about':
	include_once('about.html');
	break;

	case 'contact':
	include_once('contacts.html');
	break;

	default:
	require_once('home.html');
	break;
}

?>

