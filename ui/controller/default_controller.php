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
			include_once(APP_ROOT."/ui/view/signup.php");
			break;
	
	