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
		case "add":
			include_once(APP_ROOT."/ui/view/adminpages/add-ticket.php");
			break;
		
		case "view":
			include_once(APP_ROOT."/ui/view/adminpages/view-ticket.php");
			break;
		
		case "edit":
			include_once(APP_ROOT."/ui/view/adminpages/edit-ticket.php");
			break;
			
		case "remove":
			include_once(APP_ROOT."/ui/view/adminpages/remove-ticket.php");
			break;
			
		default:
			header('HTTP/1.1 404 Not Found');
			echo "<h1>404 - Not Found </h1> <br/>";
	}
?>
	