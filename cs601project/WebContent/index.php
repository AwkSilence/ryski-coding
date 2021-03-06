<?php 
if(session_id() == '') {
	session_set_cookie_params(31536000,'/');
	session_start();
}
require_once('model/database.php');
require_once('model/person.php');
require_once('model/menu.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'home';
}

if (isset($_SESSION['isloggedin'])){
	$isLoggedIn=$_SESSION['isloggedin'];
}else {
	$isLoggedIn=false;
}

if (isset($_SESSION['isstaff'])){
	$isStaff=$_SESSION['isstaff'];
}else {
	$isStaff=false;
}

switch ($action) {
	case '':
		header('Location: home/index.php');
		break;
	case 'home':
		header('Location: home/index.php');
		break;
	case 'contact':
		header('Location: contact/index.php?'.$_SERVER['QUERY_STRING']);
		break;
	case 'events':
		if (!$isLoggedIn){
			header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		}else {
			header('Location: events/index.php?'.$_SERVER['QUERY_STRING']);
		}
		break;
	case 'login':
		$action='';
		header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		break;
	case 'logoff':
		$action='';
		include('controller/logoff.php');
		break;
	case 'menu':
		header('Location: menu/index.php?'.$_SERVER['QUERY_STRING']);
		break;
	case 'cart':
		header('Location: cart/index.php?'.$_SERVER['QUERY_STRING']);
		break;
	case 'reservations':
		if (!$isLoggedIn){
			header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		}else {
			header('Location: reservations/index.php?'.$_SERVER['QUERY_STRING']);
		}
		break;
	case 'history':
		if (!$isLoggedIn){
			header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		}else {
			header('Location: history/index.php?'.$_SERVER['QUERY_STRING']);
		}
		break;
	case 'specials':
		header('Location: specials/index.php?'.$_SERVER['QUERY_STRING']);
		break;
	case 'staff_customers':
		if (!$isStaff||!$isLoggedIn){
			header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		}else {
			header('Location: staff_customers/index.php?'.$_SERVER['QUERY_STRING']);
		}
		break;
	case 'staff_reservations':
		if (!$isStaff||!$isLoggedIn){
			header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		}else {
			header('Location: staff_reservations/index.php?'.$_SERVER['QUERY_STRING']);
		}
		break;
	case 'staff_orders':
		if (!$isStaff||!$isLoggedIn){
			header('Location: login/index.php?'.$_SERVER['QUERY_STRING']);
		}else {
			header('Location: staff_orders/index.php?'.$_SERVER['QUERY_STRING']);
		}
		break;
	default:
		header('Location: home/index.php');
		break;

}
?>