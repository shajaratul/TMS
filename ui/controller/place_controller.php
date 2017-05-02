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
			include_once(APP_ROOT."/ui/view/adminpages/add-place.php");
			break;
		
		case "view":
			include_once(APP_ROOT."/ui/view/adminpages/view-place.php");
			break;
		
		case "edit":
			include_once(APP_ROOT."/ui/view/adminpages/edit-place.php");
			break;
			
		case "remove":
			include_once(APP_ROOT."/ui/view/adminpages/remove-place.php");
			break;
			
		default:
			header('HTTP/1.1 404 Not Found');
			echo "<h1>404 - Not Found </h1> <br/>";
	}
?>
	