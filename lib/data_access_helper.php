<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "tms_db";
	
	
	function establishDbConnection(){
		global $serverName, $userName, $password, $dbName;
		return mysqli_connect($serverName, $userName, $password, $dbName);
	}
	
	
	function executeNonQuery($query){
		
		$result = false;
		$connection = establishDbConnection();
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