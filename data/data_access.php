<?php require_once(APP_ROOT."/lib/data_access_helper.php") ?>

<?php
	function addUserToDb($user){  //this function adds user to the database through signup page
		
	}
	
	function editUserToDb($user){ //edit user details from the user profile page
		
	}
	
	function removeUserFromDB($id){ //removes user from db. Admin only feature . Should not be used normally.
		$query = "DELETE FROM Person WHERE id=$id";
		return executeNonQuery($query);
	}
	
	function getAllUsersFromDb(){ //Gets list of all users from db. Admin only feature.
		
	}
	
	function getUserByIdFromDb($id){ //gets an individual user's details from database. Used in user profile page.
		
	}
	
	function addPlaceToDb($place){ //adds a holiday destination to db. Rooms are assigned to a place. Admin only feature
		
	}
	
	function editPlaceToDb($place){ // edits the details of a holiday destination. Includes popularity count. Admin only feature
		
	}
	
	function removePlaceFromDb($id){ // removes a holiday destination from db. Used when there's no room in a place. Admin only feature.
		
	}
	
	function getPlaceByIdFromDb($id){ // gets a particular place's details from db. Used in the "search" feature in the home page.
		
	}
	
	function getAllPlacesFromDb(){ // gets all places from db. Used to create an xml file which will be used in "search" feature's autocomplete mechanism	
		
	}
	
	function addRoomToDb($room){ // adds a hotel room under a place. Admin only
		
	}
	
	function editRoomToDb($room){ //edits a rooms details. Mostly used to change the booking status of a room, and the user who book's it.
		
	}
	
	function removeRoomFromDb($room){ //removes a room if the host/hotel stops offering it.
		
	}
	
	function getRoomByIdFromDb($id){ //gets the details of a particular room.
		
	}
	
	function getRoomsByUserIdFromDb($id){ //gets details of room(s) booking by a user.
		
	}
	
	function getAllRoomsFromDb(){ //get a list of all rooms from db. Admin only feature.
		
	}
	
	function addBookingToDb($booking){ //adds a booking which includes room info when user completes booking process.
		
	}
	
	function editBookingToDb($booking){ //edits an existing booking. Admin only feature
		
	}
	
	function removeBookingFromDb($id){ //removes a booking if user cancels it. Admin only feature.
		
	}
	
	function getBookingByIdFromDb($id){ //gets details of a particular booking
		
	}
	
	function getBookingsByUserIdFromDb($id){ // gets details of a particular booking by user id
		
	}
	
	function getAllBookingsFromDb(){ //gets a list of all booking made currently recorded in the system.
		
	}
	
	function addTicketToDb($ticket){ //adds a trouble ticket under a user id in the system
		
	}
	
	function editTicketToDb($ticket){ // edits the details of a ticket, including it's status (in-progress/resolved)
		
	}
	
	function removeTicketFromDb($id){ //removes a ticket from the system. Rarely used. Admin only.
		
	}
	
	function getTicketByIdFromDb($id){ //gets details of a particualar trouble ticket
		
	}
	
	function getTicketsByUserIdFromDb($id){ //gets details of all the tickets a particular user opened
		
	}
	
	function getAllTicketsFromDb(){ //gets the list of all tickets in the system. admin only
		
	}
	
	
	function addPackageToDb($package){ //adds a holiday package which includes booking details. admin only
		
	}
	
	function editPackageToDb($package){ //edits a holiday package. admin only
		
	}
	
	function removePackageFromDb($id){ 
		
	}
	
	function getPackageByIdFromDb($id){
		
	}
	
	function getAllPackagesFromDb(){
		
	}
	
	

?>

