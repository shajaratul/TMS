<html>
<head>
	<title> TMS - Add Booking </title>
</head>

<body>
	<h1> Add Booking </h1>
	<fieldset>
	<form action="./index.php">
		<fieldset>
			<legend> Booking Details </legend>
			<table border="0" width="100%">
				<tr>
					<td><h3> Deluxe Double Bedroom </h3></td>
					<td> </td>
					<td> <h3> tk.XX,XXX/- </h3> </td>
				</tr>
				<tr>
					<td> <p> Check in 27-02-2015 </p> </td>
				</tr>
				<tr>
					<td> <p> Check out 02-03-2015 </p> </td>
				<tr>
					<td> <p> 1 night(s) - 1 person(s) </p> </td>
				</tr>
			</table>
			</fieldset>
			
			<fieldset>
				<legend> Extra Services </legend>
				<table border="0" width="100%">
				<tr>
					<td> <input type="checkbox" value="tour"> Guided Tour </input> </td>
					<td> </td>
					<td> <p> tk.XXXX/- </p> </td>
				</tr>
				<tr>
					<td> <input type="checkbox" value="carrent"> Car Renting </input> </td>
					<td> </td>
					<td> <p> tk.XXXX/- </p> </td>
				</tr>
				<tr>
					<td> <input type="checkbox" value="bikerent">  Quadbike Renting </input> </td>
					<td> </td>
					<td> <p> tk.XXXX/- </p> </td>
				</tr>
				<tr>
					<td> <input type="checkbox" value="swimrent"> Swiming Gear Renting </input> </td>
					<td> </td>
					<td> <p> tk.XXXX/- </p> </td>
				</tr>
				<tr>
					<td> <input type="checkbox" value="boatrent"> Speedboat Renting </input> </td>
					<td> </td>
					<td> <p> tk.XXXX/- </p> </td>
				</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend> Cost Calculation </legend>
				<table border="0" width="280%">
					<tr>
						<td> <h3> Total: </h3> </td>
						<td> <h3> tk.XX,XXX/- </h3> </td>
					</tr>
					
					<tr>
						<td> <h4> Payment Method </h4> </td>
						<td>
							<input type="radio" name="payment" value="self"> Pay when checking in </input>
							<br/>
							<input type="radio" name="payment" value="easy"> Pay with your ATM card </input>
							<br/>
							<input type="radio" name="payment" value="bkash"> Pay with bKash/Rocket </input>
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