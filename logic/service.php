<?php require_once(APP_ROOT."/data/data_access.php") ?>

<?php
	function addUser($user){
		return addUserToDb($person);
	}
	
	function editUser($user){
		return editUserToDb($person);
	}
	
	function removeUser($id){
		
	}
	
	function getAllPlaces(){
		return getAllPlacesFromDb();
	}
	
	
	
?>