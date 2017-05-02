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
	
	function getUserById($id){
		return getUserByIdFromDb($id);
	}
	
	function getUserByLogin($login){
		return getUserByLoginFromDb($login);
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
	
	function getRoomById($id){
		return getRoomByIdFromDb($id);
	}
	
	function getRoomsByPlaceId($placeId){
		return getRoomsByPlaceIdFromDb($placeId);
	}
	
	function addBooking($booking){
		return addBookingToDb($booking);
	}
	
	function getBookingByRoomId($id){
		return getBookingByRoomIdFromDb($id);
	}
	
	
	
	
?>