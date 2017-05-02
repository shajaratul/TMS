<?php
	if(!isset($fromController)){
		header('HTTP/1.1 403 Not Authorized');
		echo "<h1>403 - Not Authorized </h1> <br/>";
		exit;
	}
?>

<?php
	session_start();
	if(!isset($_SESSION['keyword'])){
		header("location: index.php");
	}
	
	$keyword = $_SESSION['keyword'];
	
	$place = getPlaceByName($keyword);
	
	if(count($place) < 1){
		$place = getPlaceByDivision($keyword);
	}
	
	$rooms = getRoomsByPlaceId($place['placeid']);
	
	$bookings = array();
	
	foreach($rooms as $room){
		$bookings[] = getBookingByRoomId($room['roomid']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> TMS </title>
	
	<link rel="stylesheet" type="text/css" href="ui/resources/datepicker.css" /> 
	<script type="text/javascript" src="ui/resources/datepicker.js"></script>
	
	<style>
		.frame{
			float: left;
			position: relative;
			width: 30%;
			padding-bottom: 30%;
			margin: 1.66%;
			overflow: hidden;
		}
		
		.content{
			position: absolute;
			height: 90%;
			width: 90%;
			padding: 5%;
		}
	</style>
	
	<script type="text/javascript">
		var rooms = <?php echo json_encode($rooms)?>;
		var bookings = <?php echo json_encode($bookings)?>;
		var sr_frame;
		var counter=0;
		
		addFrame();
		
		
		function addFrame(){
			var obj = new XMLHttpRequest();
			obj.open('GET', 'ui/resources/sr_frame', true);
			obj.send();
			obj.onreadystatechange = function(){
				if(obj.readyState == 4){
					sr_frame = obj.responseText;
					init();
				}
			}
		}
		
		function init(){
			// for(var i=0; i<rooms.length; i++){
				// document.getElementById("canvas").innerHTML += sr_frame;
				// document.getElementsByTagName("form")[i].setAttribute("id", "form"+i);
				// document.getElementsByClassName("title")[i].innerHTML = rooms[i].name;
				// document.getElementsByClassName("host")[i].innerHTML = rooms[i].host;
				// document.getElementsByClassName("desc")[i].innerHTML = rooms[i].description;
				// document.getElementsByClassName("capacity")[i].innerHTML = "Capacity: " + rooms[i].capacity + " person(s)";
				// document.getElementsByClassName("price")[i].innerHTML = "Price: tk." + rooms[i].price + "/- per night";
				// document.getElementsByName("submit")[i].setAttribute("onclick", "doBooking("+i+")");
				
				// document.getElementsByName("roomId")[i].value = rooms[i].roomid;
				// document.getElementsByName("roomName")[i].value = rooms[i].name;
				// document.getElementsByName("roomPrice")[i].value = rooms[i].price;
				// document.getElementsByName("roomCapacity")[i].value = rooms[i].capacity;
				// document.getElementsByName("checkIn")[i].value = document.getElementById("checkin").value;
				// document.getElementsByName("checkOut")[i].value = document.getElementById("checkout").value;
				// document.getElementsByName("personNumber")[i].value = document.getElementById("personNumber").value;
			// }
		}

		
		function control(){
			var j=0;
			for(var i=0; i<rooms.length; i++){
				if(bookings[i] == null){
					document.getElementById("canvas").innerHTML += sr_frame;
					document.getElementsByTagName("form")[j].setAttribute("id", "form"+i);
					document.getElementsByClassName("title")[j].innerHTML = rooms[i].name;
					document.getElementsByClassName("host")[j].innerHTML = rooms[i].host;
					document.getElementsByClassName("desc")[j].innerHTML = rooms[i].description;
					document.getElementsByClassName("capacity")[j].innerHTML = "Capacity: " + rooms[i].capacity + " person(s)";
					document.getElementsByClassName("price")[j].innerHTML = "Price: tk." + rooms[i].price + "/- per night";
					document.getElementsByName("submit")[j].setAttribute("onclick", "doBooking("+i+")");
					
					document.getElementsByName("roomId")[j].value = rooms[i].roomid;
					document.getElementsByName("roomName")[j].value = rooms[i].name;
					document.getElementsByName("roomPrice")[j].value = rooms[i].price;
					document.getElementsByName("roomCapacity")[j].value = rooms[i].capacity;
					document.getElementsByName("checkIn")[j].value = document.getElementById("checkin").value;
					document.getElementsByName("checkOut")[j].value = document.getElementById("checkout").value;
					document.getElementsByName("personNumber")[j].value = document.getElementById("personNumber").value;
					
					
					
					j++;
				}
				else if (new Date(document.getElementById("checkout").value) >= new Date(bookings[i].checkin) && new Date(document.getElementById("checkin").value) <= new Date(bookings[i].checkout) ){
					
				}
				else{
					document.getElementById("canvas").innerHTML += sr_frame;
					document.getElementsByTagName("form")[j].setAttribute("id", "form"+i);
					document.getElementsByClassName("title")[j].innerHTML = rooms[i].name;
					document.getElementsByClassName("host")[j].innerHTML = rooms[i].host;
					document.getElementsByClassName("desc")[j].innerHTML = rooms[i].description;
					document.getElementsByClassName("capacity")[j].innerHTML = "Capacity: " + rooms[i].capacity + " person(s)";
					document.getElementsByClassName("price")[j].innerHTML = "Price: tk." + rooms[i].price + "/- per night";
					document.getElementsByName("submit")[j].setAttribute("onclick", "doBooking("+i+")");
					
					document.getElementsByName("roomId")[j].value = rooms[i].roomid;
					document.getElementsByName("roomName")[j].value = rooms[i].name;
					document.getElementsByName("roomPrice")[j].value = rooms[i].price;
					document.getElementsByName("roomCapacity")[j].value = rooms[i].capacity;
					document.getElementsByName("checkIn")[j].value = document.getElementById("checkin").value;
					document.getElementsByName("checkOut")[j].value = document.getElementById("checkout").value;
					document.getElementsByName("personNumber")[j].value = document.getElementById("personNumber").value;
					
					j++
				}
			}
		}
		
		function addData(){
			
		}
		
		function clearCanvas(){
			document.getElementById("canvas").innerHTML = "";
			counter = 0;
		}
		
		function filter(){
			var flag = true;
			flag = checkDatePicker();
			
			if(flag){
				clearCanvas();
				control();
			}
		}
		
		function checkDatePicker(){
			if(document.getElementById("checkin").value == ""){
				alert("Please select the check-in date");
				return false;
			}			
			
			else if(document.getElementById("checkout").value == ""){
				alert("Please select the check-out date");
				return false;
			}
			
			else if(new Date(document.getElementById("checkin").value) > new Date(document.getElementById("checkout").value)){
				alert("Please provide valid check-in check-out dates");
				return false;
			}
			else
				return true;

		}
		
		
		function doBooking(id){
			var checkDates = checkDatePicker();
			if(checkDates != true){
				var form = document.getElementById("form"+id);
				form.submit;
			}
		}
		
	</script>
	
	
</head>

<body>
<h1> Search Result </h1>

	<div style="padding-left:100px; padding-top:10px" >
	
		<div style="padding-left:15px; margin-right:100px; background-color:grey; height:160px">
			<p> </p>
			<h2 style="margin:0px; padding-top:10px"> Accomodations </h2>
			<table border="0" align="center">
				<tr>
					<td> <p> Check-in </p> </td>
					<td> <p> Check-out </p> </td>
					<td> <p> Person </p> </td>
				</tr>
				<tr>
					<div style="border:2px">
						<td> <input id="checkin" class="datepicker"/> </td>
						<td> <input id="checkout" class="datepicker"/> </td>
						<td> 
							<select id="personNumber">
								<option value="1"> One </option>
								<option value="2"> Two </option>
								<option value="3"> Three </option>
								<option value="4"> Four </option>
								<option value="5"> Five </option>
								<option value="6"> Six </option>
							</select> 
						</td>
					</div>
				</tr>
				<tr>
					<td colspan="4" align="center"> <input type="button" value="Apply" onclick="filter()"/> </td>
				</tr>
			</table>
		</div>
		
		<div id="canvas" style="margin:20px; margin-top:100px">
		</div>
	</div>
	
</body>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	$booking['userId'] = $_SESSION['id'];
	$booking['roomId'] = $_POST['roomId'];
	$booking['roomName'] = $_POST['roomName'];
	$booking['roomPrice'] = $_POST['roomPrice'];
	$booking['roomCapacity'] = $_POST['roomCapacity'];
	$booking['checkIn'] = $_POST['checkIn'];
	$booking['checkOut'] = $_POST['checkOut'];
	$booking['personNumber'] = $_POST['personNumber'];
	
	if($booking['checkIn'] != "" || $booking['checkOut'] != ""){
		$_SESSION['bookingDetails'] = $booking;

		echo "<script> window.location.href = 'index.php?show=booking'</script>";
	}
	


}
?>
