<?php
	if(!isset($fromController)){
		header('HTTP/1.1 403 Not Authorized');
		echo "<h1>403 - Not Authorized </h1> <br/>";
		exit;
	}
?>

<?php
	session_start();
	
	$roomName = $_SESSION['bookingDetails']['roomName'];
	$roomPrice = $_SESSION['bookingDetails']['roomPrice'];
	$roomCapacity = $_SESSION['bookingDetails']['roomCapacity'];
	$checkIn = $_SESSION['bookingDetails']['checkIn'];
	$checkOut = $_SESSION['bookingDetails']['checkOut'];
	$personNumber = $_SESSION['bookingDetails']['personNumber'];
	
	$_checkIn = DateTime::createFromFormat('d-M-Y', $checkIn);
	$_checkOut = DateTime::createFromFormat('d-M-Y', $checkOut);
	$_duration = $_checkOut->diff($_checkIn);
	
	$duration = $_duration->format('%a');
	
	$_roomNeeded = $personNumber/$roomCapacity;
	$roomNeeded = round($_roomNeeded, 0, PHP_ROUND_HALF_UP);
	
	$totalPrice = $roomPrice * $duration * $roomNeeded;
	
	
	
?>

<html>
<head>
	<title> TMS - Add Booking </title>
</head>

<body>
	<h1> Add Booking </h1>
	<fieldset>
	<form action="index.php">
		<fieldset>
			<legend> Booking Details </legend>
			<table border="0" width="100%">
				<tr>
					<td><h3> <?php echo $roomName; ?> </h3></td>
					<td> </td>
					<td> <h3> Tk.<?php echo $roomPrice; ?>/- Per Night </h3> </td>
				</tr>
				<tr>
					<td> <p> Check in <?php echo $checkIn; ?> </p> </td>
				</tr>
				<tr>
					<td> <p> Check out <?php echo $checkOut; ?> </p> </td>
				<tr>
					<td> <p> <?php echo $duration; ?> night(s) - <?php echo $personNumber; ?> person(s) - <?php echo $roomNeeded; ?> room(s) </p> </td>
				</tr>
			</table>
			</fieldset>
			
			<fieldset>
				<legend> Cost Calculation </legend>
				<table border="0" width="280%">
					<tr>
						<td> <h3> Total: </h3> </td>
						<td> <h3> tk.<?php echo $totalPrice; ?>/- </h3> </td>
					</tr>
					
					<tr>
						<td> <h4> Payment Method </h4> </td>
						<td>
							<input type="radio" name="payment" value="0"> Pay when checking in </input>
							<br/>
							<input type="radio" name="payment" value="1" disabled='disabled'> Pay with your ATM card </input>
							<br/>
							<input type="radio" name="payment" value="2" disabled='disabled'> Pay with bKash/Rocket </input>
							<br/>
							<br/>
						</td>
					</tr>
				
					<tr>
						<td> <h4> Special Requests </h4> </td>
						<td> <textarea name="specialreq" rows="4" cols="50"> </textarea> </td>
					</tr>
					
				</table>
				
			</fieldset>
			<br/>
			<center> <input type="submit" Value="Make Booking" /> </center>
		</fieldset>
	</form>
	</fieldset>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	$bkng = array();
	$bkng['userid'] = $_SESSION['id'];
	$bkng['roomid'] = $_SESSION['bookingDetails']['roomId']
	$bkng['checkin'] = $checkIn;
	$bkng['checkout'] = $checkOut;
	$bkng['person'] = $personNumber;
	$bkng['total'] = $totalPrice;
	$bkng['payment_method'] = 0;
	$bkng['requests'] = $_REQUEST['specialres'];
	
	addBooking($bkng);

}
?>


?>