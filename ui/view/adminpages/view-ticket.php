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
			<li><a href="index.php?show=logout"> Logout </a></li>
		</ul>

	</div>
	
	<div id="dashboard">
		<fieldset>
			<legend> View Tickets </legend>
				<table border="1" cellspacing="5">
					<tr>
						<td> Ticket ID </td>
						<td> User ID </td>
						<td> Status </td>
						<td> Time </td>
						<td> Title </td>
						<td> Type </td>
						<td> Description </td>
						<td> Response </td>
						<td> Add </td>
						<td> Edit </td>
						<td> Remove </td>
					</tr>
					<?php
						$tickets = getAllTickets();
						foreach($tickets as $ticket){
						echo "<tr>
								<td>$ticket[ticketid]</td>
								<td>$ticket[userid]</td>
								<td>$ticket[status]</td>
								<td>$ticket[time]</td>
								<td>$ticket[title]</td>
								<td>$ticket[type]</td>
								<td>$ticket[description]</td>
								<td>$ticket[response]</td>
							</tr>";
						}
						?>
					
				</table>
		</fieldset>
	</div>
	
	</div>
</body>
</html>
