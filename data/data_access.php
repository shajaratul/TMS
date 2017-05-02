<?php require_once(APP_ROOT."/lib/data_access_helper.php") ?>

<?php
	function addUserToDb($user){  //this function adds user to the database through signup page
		$query = "INSERT INTO users(name, email, contactno, password, usertype) VALUES ('$user[firstName]', '$user[lastName]', '$user[email]', '$user[contactNo]', '$user[password]', $user[userType])";
		return executeNonQuery($query);
	}
	
	function editUserToDb($user){ //edit user details from the user profile page
		$query = "UPDATE users SET name='$user[name]', email='$user[email]', contactno='$user[contactNo]', password='$user[password]' WHERE userid=$user[id]";
		return executeNonQuery($query);
	}
	
	function removeUserFromDB($id){ //removes user from db. Admin only feature . Should not be used normally.
		$query = "DELETE FROM users WHERE userid='$id'";
		return executeNonQuery($query);
	}
	
	function getAllUsersFromDb(){ //Gets list of all users from db. Admin only feature.
		$query = "SELECT userid, name, email, contactno, usertype FROM users";  
		$result = executeQuery($query);	
		$userList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$userList[$i] = $row;				
			}
		}
		return $userList;
	}
	
	function getUserByIdFromDb($id){ //gets an individual user's details from database. Used in user profile page.
		$query = "SELECT name, email, contactno, usertype FROM users WHERE userid=$id";  
		$result = executeQuery($query);	
		$person = null;
		if($result){
			$person = mysqli_fetch_assoc($result);
		}
		return $person;
	}
	
	function getUserByLoginFromDb($login){
		$query = "SELECT userid FROM users WHERE email='$login[email]' AND password='$login[password]'";  
		$result = executeQuery($query);	
		$userid = null;
		if($result){
			$userid = mysqli_fetch_assoc($result);
		}
		return $userid;
	}
	
	function addPlaceToDb($place){ //adds a holiday destination to db. Rooms are assigned to a place. Admin only feature
		$query = "INSERT INTO places(name, division) VALUES ('$place[name]', '$place[division]')";
		return executeNonQuery($query);
	}
	
	function editPlaceToDb($place){ // edits the details of a holiday destination. Includes popularity count. Admin only feature
		$query = "UPDATE places SET name='$place[name]', division='$place[dision]' WHERE placeid=$place[id]";
		return executeNonQuery($query);
	}
	
	function removePlaceFromDb($id){ // removes a holiday destination from db. Used when there's no room in a place. Admin only feature.
		$query = "DELETE FROM places WHERE placeid='$id'";
		return executeNonQuery($query);
	}
	
	function getPlaceByIdFromDb($id){ // gets a particular place's details from db. Admin only feature.
		$query = "SELECT name, division FROM places WHERE placeid=$id";  
		$result = executeQuery($query);	
		$place = null;
		if($result){
			$place = mysqli_fetch_assoc($result);
		}
		return $place;
	}
	
	function getPlaceByNameFromDb($_name){ // gets a particular place's details from db. Admin only feature.
		$connection = establishDbConnection();
		$name = mysqli_real_escape_string($connection, $_name);
		mysqli_close($connection);
		$query = "SELECT placeid, name, division FROM places WHERE name LIKE '%$name%'";  
		$result = executeQuery($query);	
		$place = null;
		if($result){
			$place = mysqli_fetch_assoc($result);
		}
		return $place;
	}
	
	function getPlaceByDivisionFromDb($_division){
		$connection = establishDbConnection();
		$division = mysqli_real_escape_string($connection, $_division);
		mysqli_close($connection);
		$query = "SELECT placeid, name, division FROM places WHERE division LIKE '%$division%'";
		$result = executeQuery($query);	
		$place = null;
		if($result){
			$place = mysqli_fetch_assoc($result);
		}
		return $place;
	}
	
	function getAllPlacesFromDb(){ // gets all places from db. Used to create an xml file which will be used in "search" feature's autocomplete mechanism	
		$query = "SELECT placeid, name, division FROM places";  
		$result = executeQuery($query);	
		$placeList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$placeList[$i] = $row;				
			}
		}
		return $placeList;
	}
	
	function addRoomToDb($room){ // adds a hotel room under a place. Admin only
		$query = "INSERT INTO rooms( name, host, description, details, capacity, price, placeid) VALUES ('$room[name]', '$room[host]', '$room[description]', '$room[details]', $room[capacity], $room[price], $room[placeid])";
		return executeNonQuery($query);
	}
	
	function editRoomToDb($room){ //edits a rooms details. Mostly used to change the booking status of a room, and the user who book's it.
		$query = "UPDATE rooms SET name='$room[name]', host='$room[host]', description='$room[description]', details='$room[details]', capacity=$room[capacity], price=$room[price], placeid=$room[placeid]  WHERE roomid=$room[id]";
		return executeNonQuery($query);
	}
	
	function removeRoomFromDb($room){ //removes a room if the host/hotel stops offering it.
		$query = "DELETE FROM rooms WHERE roomid='$id'";
		return executeNonQuery($query);
	}
	
	function getRoomByIdFromDb($id){ //gets the details of a particular room.
		$query = "SELECT * FROM rooms WHERE roomid=$id";  
		$result = executeQuery($query);	
		$room = null;
		if($result){
			$room = mysqli_fetch_assoc($result);
		}
		return $room;
	}
	
	function getRoomsByPlaceIdFromDb($id){ //gets rooms in a particular place
		$query = "SELECT * FROM rooms WHERE placeid=$id";  
		$result = executeQuery($query);	
		$roomList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$roomList[$i] = $row;				
			}
		}
		return $roomList;
	}
	
	function getAllRoomsFromDb(){ //get a list of all rooms from db. Admin only feature.
		$query = "SELECT roomid, name, host, description, details, capacity, price, placeid FROM rooms";  
		$result = executeQuery($query);	
		$roomList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$roomList[$i] = $row;				
			}
		}
		return $roomList;
	}
	
	function addBookingToDb($booking){ //adds a booking which includes room info when user completes booking process.
		$query = "INSERT INTO bookings(userid, roomid, checkin, checkout, person, total, payment_method, requests) VALUES ($booking[userid], $booking[roomid], '$booking[checkin]', '$booking[checkout]', $booking[person], $booking[total], $booking[payment_method], '$booking[requests]')";
		return executeNonQuery($query);
	}
	
	function editBookingToDb($booking){ //edits an existing booking. Admin only feature
		$query = "UPDATE bookings SET userid=$booking[userid], roomid=$booking[roomid], checkin='$booking[checkin]', checkout='$booking[checkout]', person=$booking[person], total=$booking[total], payment_method=$booking[payment_method], requests='$booking[requests]' WHERE bookingid=$booking[id]";
		return executeNonQuery($query);
	}
	
	function removeBookingFromDb($id){ //removes a booking if user cancels it. Admin only feature.
		$query = "DELETE FROM bookings WHERE bookingid='$id'";
		return executeNonQuery($query);
	}
	
	function getBookingByIdFromDb($id){ //gets details of a particular booking
		$query = "SELECT userid, roomid, checkin, checkout, person, total, payment_method, requests FROM bookings WHERE bookingid=$id";  
		$result = executeQuery($query);	
		$booking = null;
		if($result){
			$booking = mysqli_fetch_assoc($result);
		}
		return $booking;
	}
	
	function getBookingsByUserIdFromDb($id){ // gets details of a particular booking by user id
		$query = "SELECT bookingid, roomid, checkin, checkout, person, total, payment_method, requests FROM bookings WHERE userid=$id";  
		$result = executeQuery($query);	
		$booking = null;
		if($result){
			$booking = mysqli_fetch_assoc($result);
		}
		return $booking;
	}
	
	function getBookingByRoomIdFromDb($id){ // gets details of a particular booking by room id
		$query = "SELECT bookingid, userid, checkin, checkout, person, total, payment_method, requests FROM bookings WHERE roomid=$id";  
		$result = executeQuery($query);	
		$booking = null;
		if($result){
			$booking = mysqli_fetch_assoc($result);
		}
		return $booking;
	}
	
	function getAllBookingsFromDb(){ //gets a list of all booking made currently recorded in the system.
		$query = "SELECT bookingid, userid, roomid, checkin, checkout, person, total, payment_method, requests FROM bookings";  
		$result = executeQuery($query);	
		$bookingList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$bookingList[$i] = $row;				
			}
		}
		return $bookingList;
	}
	
	function addTicketToDb($ticket){ //adds a trouble ticket under a user id in the system
		$query = "INSERT INTO tickets(userid, status, time, title, type, description, response) VALUES ($ticket[userid], $ticket[status], '$ticket[time]', '$ticket[title]', $ticket[type], '$ticket[description]', '$ticket[response]')";
		return executeNonQuery($query);
	}
	
	function editTicketToDb($ticket){ // edits the details of a ticket, including it's status (in-progress/resolved)
		$query = "UPDATE tickets SET userid=$ticket[userid], status=$ticket[status], time='$ticket[time]', title='$ticket[title]', type=$ticket[type], description='$ticket[description]', response='$ticket[response]' WHERE placeid=$place[id]";
		return executeNonQuery($query);
	}
	
	function removeTicketFromDb($id){ //removes a ticket from the system. Rarely used. Admin only.
		$query = "DELETE FROM tickets WHERE ticketid='$id'";
		return executeNonQuery($query);
	}
	
	function getTicketByIdFromDb($id){ //gets details of a particualar trouble ticket
		$query = "SELECT userid, status, time, title, type, description, response FROM tickets WHERE ticketid=$id";  
		$result = executeQuery($query);	
		$ticket = null;
		if($result){
			$ticket = mysqli_fetch_assoc($result);
		}
		return $ticket;
	}
	
	function getTicketsByUserIdFromDb($id){ //gets details of all the tickets a particular user opened
		$query = "SELECT userid, status, time, title, type, description, response FROM tickets WHERE userid=$id";  
		$result = executeQuery($query);	
		$ticket = null;
		if($result){
			$ticket = mysqli_fetch_assoc($result);
		}
		return $ticket;
	}
	
	function getAllTicketsFromDb(){ //gets the list of all tickets in the system. admin only
		$query = "SELECT ticketid, userid, status, time, title, type, description, response FROM tickets";
		$result = executeQuery($query);	
		$ticketList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$ticketList[$i] = $row;				
			}
		}
		return $ticketList;
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

