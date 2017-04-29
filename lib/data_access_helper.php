<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "tms_db";
	
	function executeNonQuery($query){
		global $serverName, $userName, $password, $dbName;
		$result = false;
		$connection = mysqli_connect($serverName, $userName, $password, $dbName);
		if($connection){
			$result = mysqli_query($connection, $query);
			mysqli_close($connection);
		}
		else {
			die("Error connecting to database");
		}
		
		return $result;
	}
	
	function executeQuery($query) {
		return executeNonQuery($query);
	}

?>