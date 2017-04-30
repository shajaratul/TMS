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
	
	function getPlaceByName($name){
		return getPlaceByNameFromDb($name);
	}
	
	function getPlaceByDivision($division){
		return getPlaceByDivisionFromDb($division);
	}
	
	function getRoomsByPlaceId($placeId){
		return getRoomsByPlaceIdFromDb($placeId);
	}
	
	
?>