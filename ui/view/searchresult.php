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
	
	// var_dump($bookings);
	// var_dump($rooms);
	
	// $allPlaces = getAllPlaces();
	// $places = array();
	// $divisions = array();
	
	// //var_dump($allPlaces);
	
	// for($i=0; $i < sizeof($allPlaces); ++$i){
		// $places[$i] = $allPlaces[$i]['name'];
	// }
	
	// for($i=0; $i < sizeof($allPlaces); ++$i){
		// $divisions[$i] = $allPlaces[$i]['division'];
	// }
	
	// $temp = $divisions;
	// $divisions = array_unique($temp);
	
	// var_dump($places);
	// var_dump($divisions);
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
		// document.onreadystatechange = function(){
			// if(document.readyState){
		
			// }
		// }
		
		
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
			for(var i=0; i<rooms.length; i++){
				document.getElementById("canvas").innerHTML += sr_frame;
				document.getElementsByClassName("title")[i].innerHTML = rooms[i].name;
				document.getElementsByClassName("host")[i].innerHTML = rooms[i].host;
				document.getElementsByClassName("desc")[i].innerHTML = rooms[i].description;
				document.getElementsByClassName("capacity")[i].innerHTML = "Capacity: " + rooms[i].capacity + " person(s)";
				document.getElementsByClassName("price")[i].innerHTML = "Price: tk." + rooms[i].price + "/- per night";
			}
		}
		
		// function control(){
			// for(var i=0; i<rooms.length; i++){
				// if(bookings[i] == null){
					// if(counter < rooms.length){
						// addData();console.log("control adddata 1 "+i);console.log("control counter"+i);
					// }
				// }
				// else if (bookings[i].checkin < document.getElementById("checkout").value && bookings[i].checkout > document.getElementById("checkin").value){
					// //counter = counter + 1;
					// console.log("counter inc "+i);
				// }
				// else{
					// if(counter < rooms.length){
						// addData();console.log("control adddata 2 "+i);
					// }
				// }
			// }
		// }
		
		
			
		
		// function addData(){
			// document.getElementById("canvas").innerHTML += sr_frame;
			// console.log("adddata called! counter: " + counter);
			// document.getElementsByClassName("title")[counter].innerHTML = rooms[counter].name;
			// document.getElementsByClassName("host")[counter].innerHTML = rooms[counter].host;
			// document.getElementsByClassName("desc")[counter].innerHTML = rooms[counter].description;
			// document.getElementsByClassName("capacity")[counter].innerHTML = "Capacity: " + rooms[counter].capacity + " person(s)";
			// document.getElementsByClassName("price")[counter].innerHTML = "Price: tk." + rooms[counter].price + "/- per night";
			// counter = counter + 1;
			// console.log("adddata counter: " + counter);

		// }
		
		function control(){
			var j=0;
			for(var i=0; i<rooms.length; i++){
				if(document.getElementById("personNumber").value <= rooms[i].capacity){
					if(bookings[i] == null){
						document.getElementById("canvas").innerHTML += sr_frame;
						document.getElementsByClassName("title")[j].innerHTML = rooms[i].name;
						document.getElementsByClassName("host")[j].innerHTML = rooms[i].host;
						document.getElementsByClassName("desc")[j].innerHTML = rooms[i].description;
						document.getElementsByClassName("capacity")[j].innerHTML = "Capacity: " + rooms[i].capacity + " person(s)";
						document.getElementsByClassName("price")[j].innerHTML = "Price: tk." + rooms[i].price + "/- per night";
						j++;
					}
					else if (new Date(document.getElementById("checkout").value) >= new Date(bookings[i].checkin) && new Date(document.getElementById("checkin").value) <= new Date(bookings[i].checkout) ){
						
					}
					else{
						document.getElementById("canvas").innerHTML += sr_frame;
						document.getElementsByClassName("title")[j].innerHTML = rooms[i].name;
						document.getElementsByClassName("host")[j].innerHTML = rooms[i].host;
						document.getElementsByClassName("desc")[j].innerHTML = rooms[i].description;
						document.getElementsByClassName("capacity")[j].innerHTML = "Capacity: " + rooms[i].capacity + " person(s)";
						document.getElementsByClassName("price")[j].innerHTML = "Price: tk." + rooms[i].price + "/- per night";
						j++
					}
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
			if(document.getElementById("checkin").value == ""){
				alert("Please select the check-in date");
				flag = false;
			}			
			
			if(document.getElementById("checkout").value == ""){
				alert("Please select the check-out date");
				flag = false;
			}
			
			if(new Date(document.getElementById("checkin").value) > new Date(document.getElementById("checkout").value)){
				alert("Please provide valid dates");
				flag = false;
			}
			
			if(flag){
				clearCanvas();
				control();
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
					<td colspan="4" align="center"> <input type="button" value="Filter" onclick="filter()"/> </td>
				</tr>
			</table>
		</div>
		
		<div id="canvas" style="margin:20px; margin-top:100px">
		</div>
	</div>
	
</body>
