<?php
	if(!isset($fromController)){
		header('HTTP/1.1 403 Not Authorized');
		echo "<h1>403 - Not Authorized </h1> <br/>";
		exit;
	}
?>

<?php include_once(APP_ROOT."/logic/service.php");?>

<?php 
	switch($view){
		case "home":
			include_once(APP_ROOT."/ui/view/homepage.php");
			break;
		
		case "search":
			include_once(APP_ROOT."/ui/view/searchresult.php");
			break;
		
		case "login":
			include_once(APP_ROOT."/ui/view/login.php");
			break;
		
		case "signup":
			include_once(APP_ROOT."/ui/view/signup.php");
			break;
			
		case "profile":
			include_once(APP_ROOT."/ui/view/userhomepage.php");
			break;
			
		case "admin":
			include_once(APP_ROOT."/ui/view/adminhomepage.php");
			break;
			
		case "booking":
			include_once(APP_ROOT."/ui/view/booking.php");
			break;
			
		case "contact":
			include_once(APP_ROOT."/ui/view/contact.php");
			break;
			
		case "newpass":
			include_once(APP_ROOT."/ui/view/forget_password.php");
			break;
			
		default:
			header('HTTP/1.1 404 Not Found');
			echo "<h1>404 - Not Found </h1> <br/>";
	}
?>
	
	