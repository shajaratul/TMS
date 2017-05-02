<html>
<head>
	<title> TMS - Admin page </title>
	<style>
	
	ul {
		list-style-type: none;
		margin: 0px;
		padding: 0px;
		width: 20%;
		background-color: #f1f1f1;
		position: fixed;
		height: 100%;
		overflow: auto;
	}

	
	li a {
		display: block;
		color: #000;
		padding: 8px 16px;
		text-decoration: none;
	}
	
	li a.active {
		background-color: #3366ff;
		color: white;
	}
	
	li a.active:hover {
		background-color: #33ccff;
		color: white;
	}
	
	li a:hover:not(.active) {
		background-color: #555;
		color: white;
	}
	
	div #dashboard {
		margin-left: 20%;
		padding: 1px 16px;
		height: 100%;
	}
	
	div #site-header {
		position: fixed;
		background-color: grey;
		color: white;
	}
	</style>
</head>

<body>
	<div id="site-header">
		<h1> Travel.com </h1>
	</div>
	<div>		

	<div>	
		<ul>
			<li><a href="index.php?show=ticket-view"> Support Tickets</a></li>
			<li><a href="index.php?show=booking-view"> Bookings </a></li>
			<li><a href="index.php?show=place-view"> Places </a></li>
			<li><a href="index.php?show=room-view"> Rooms </a></li>
			<li><a href="index.php?show=user-view"> Users </a></li>
		</ul>

	</div>
	
	<div id="dashboard">
		<fieldset>
			<legend> Add Rooms </legend>
			<form method="post">
			<table>
				<tr>
					<td> Room ID </td>
					<td> <input type="id" name="#"/> </td>
				</tr>
				
				<tr>
					<td> Place ID </td>
					<td> <input type="text" name="#"/> </td>
				</tr>
				
				<tr>
					<td> Room Type </td>
					<td> <select name="#">
						  <option>Standard</option>
						  <option>Standard with Balcony</option>
						  <option>Deluxe Suite - Sea View</option>
						  <option>Deluxe Suite - Sea View with Balcony</option>
						  <option>Superior Deluxe - Sea View with Balcony</option>
						  <option>Superior Deluxe - Mountain View</option>

						</select> </td>
				</tr>
				
				<tr>
					<td> Host </td>
					<td> <select name="">
						  <option>Ocean Paradise Hotel & Resort</option>
						  <option>Trave</option>
						</select> </td>
				</tr>
				
				<tr>
					<td> Descryption </td>
					<td> <input type="text" size="50" name="#"> </td>
				</tr>

				<tr>
					<td>Room Details</td>
					<td><input type="text"></td>

				</tr>

				<tr>
					<td>Capacity</td>
					<td> <select name="usertype">
						  <option value="0">1</option>
						  <option value="1">2</option>
						  <option value="2">3</option>
						  <option value="3">4</option>
						  <option value="4">5</option>
						  </select> 
					</td>

				</tr>

				<tr>
					<td>Price</td>
					<td><input type="text"></td>

				</tr>
				
				<tr>
					<td>  </td>
					<td> <input type="submit" value="Edit"/> </td>
				</tr>
				
			</table>
			</form>
		</fieldset>
	</div>
	
	</div>
</body>
</html>
