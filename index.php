<?php define('APP_ROOT', "$_SERVER[DOCUMENT_ROOT]/tms"); ?>

<?php 

$queryArray = array($_GET)[0];

if(sizeof($queryArray) == 0){
	$fromController = true;
	$view = "home";
	include_once(APP_ROOT."/ui/controller/default_controller.php");
}

else if (sizeof($queryArray) > 0){
	$queryKey = array_keys($queryArray)[0];
	$queryValue = $queryArray[$queryKey];
	
	$queryPortion = explode("-", $queryValue);
	
	if(count($queryPortion) == 1){
		$fromController = true;
		$view = $queryValue;
		include_once(APP_ROOT."/ui/controller/default_controller.php");
	}
	else if (count($queryPortion) == 2){
		$fromController = true;
		$controller = $queryPortion[0];
		$view = $queryPortion[1];
		include_once(APP_ROOT."/ui/controller/".$controller."_controller.php");
	}
	else{
		header('HTTP/1.1 403 Not Authorized');
		echo "<h1>403 - Not Authorized </h1> <br/>";
		exit;
	}
	
}

else{
	header('HTTP/1.1 403 Not Authorized');
	echo "<h1>403 - Not Authorized </h1> <br/>";
	exit;
}

?>