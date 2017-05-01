<?php
	if(!isset($fromController)){
		header('HTTP/1.1 403 Not Authorized');
		echo "<h1>403 - Not Authorized </h1> <br/>";
		exit;
	}
?>

<?php
	session_start();
	$keyword = $_SESSION['keyword'];
	
	$place = getPlaceByName($keyword);
	
	if(count($place) < 1){
		$place = getPlaceByDivision($keyword);
	}
	
	$rooms = getRoomsByPlaceId($place['placeid']);
	
	foreach($rooms as $item){
		echo $item['name'];
	}
	
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
		var index = 0;
		
		function addFrame(){
			var obj = new XMLHttpRequest();
			obj.open('GET', 'ui/resources/sr_frame', true);
			obj.send();
			obj.onreadystatechange = function(){
				if(obj.readyState == 4){
					document.getElementById("canvas").innerHTML += obj.responseText;
					addContent();
					index++;
				}
			}
		}
		
		for(var i in rooms){
			addFrame();
		}
		
		function addContent(){
			document.getElementsByClassName("title")[index].innerHTML = rooms[index].name;
			document.getElementsByClassName("host")[index].innerHTML = rooms[index].host;
			document.getElementsByClassName("desc")[index].innerHTML = rooms[index].description;
			document.getElementsByClassName("capacity")[index].innerHTML = "Capacity: " + rooms[index].capacity + " person(s)";
			document.getElementsByClassName("price")[index].innerHTML = "Price: tk" + rooms[index].price + "/- per night";

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
					<td> <p> Adult </p> </td>
					<td> <p> Children </p> </td>
				</tr>
				<tr>
					<td> <input type="text" name="checkinfield" value="dd/mm/yyyy"/> </td>
					<td> <input type="text" name="checkoutfield" value="dd/mm/yyyy"/> </td>
					<td> 
						<select>
							<option value="1"> One </option>
							<option value="2"> Two </option>
							<option value="3"> Three </option>
							<option value="4"> Four </option>
							<option value="5"> Five </option>
						</select> 
					</td>
					<td> 
						<select>
							<option value="0"> Zero </option>
							<option value="1"> One </option>
							<option value="2"> Two </option>
							<option value="3"> Three </option>
							<option value="4"> Four </option>
						</select> 
					</td>
				</tr>
				<tr>
					<td colspan="4" align="center"> <input type="button" value="Filter"/> </td>
				</tr>
			</table>
		</div>
		
		<div id="canvas" style="margin:20px">
		</div>
	</div>
	
</body>
