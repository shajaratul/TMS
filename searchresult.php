<!DOCTYPE html>
<html>
<head>
	<title> TMS </title>
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
		
		<div style="margin:20px">
		<table border="0" width="100%">
			<thead></thead>
			<tbody>
				<tr>
					<td>
					<form>
						<div style="padding-left:20px;padding-right:20px">
							<img width=80% src="images/deluxe-double-room.jpg" />
							<h4>DELUXE DOUBLE BEDROOM</h4>
							<h5>Breakfast included</h5>
							<p> Capacity: 3 person </p>
							<h3> Price: tk.10,000/- per night </h3>
							<div style="float:right;padding-right:80px">
								<input type="button" value="read more"/>
								<input type="submit" value="Book"/>
							</div>
						</div>
					</form>
					</td>

					<td>
					<form>
						<div style="padding-left:20px;padding-right:20px">
							<img width=80% src="images/luxury-suite.jpg" />
							<h4>LUXURY SUITE</h4>
							<h5>Pool & Jacuzzi Suite</h5>
							<p> Capacity: 5 person </p>
							<h3> Price: tk.45,000/- per night </h3>
							<div style="float:right;padding-right:80px">
								<input type="button" value="read more"/>
								<input type="submit" value="Book"/>
							</div>
						</div>
					</form>
					</td>

					<td>
					<div style="padding-left:20px;padding-right:20px">
						<img width=80% src="images/royal-suite.jpg" />
						<h4>ROYAL SUITE</h4>
						<h5>Pool & Jacuzzi Suite</h5>
						<p> Capacity: 5 person </p>
						<h3> Price: tk.55,000/- per night </h3>							
						<div style="float:right;padding-right:80px">
								<input type="button" value="read more"/>
								<input type="submit" value="Book"/>
						</div>
					</div>
					</td>
				</tr>

				
			</tbody>
		</table>
		</div>
	</div>