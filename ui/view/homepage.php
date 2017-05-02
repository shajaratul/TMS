<?php
	if(!isset($fromController)){
		header('HTTP/1.1 403 Not Authorized');
		echo "<h1>403 - Not Authorized </h1> <br/>";
		exit;
	}
?>

<?php
	session_start();
	
	$loggedIn = false;
	
	if(isset($_SESSION['id'])){
		$loggedIn = true;
	}
	
	if($loggedIn){
		$navbar = '<ul>
						<li><a href="index.php?show=logout"> Sign out </a></li>
						<li><a href="index.php?show=profile"> Profile </a></li>
						<li><a href="index.php?show=contact"> Contact </a></li>
						<li><a href="#page-2"> Places </a></li>
						<li><a href="#"> Home </a></li>
					</ul>';
	}
	else{
		$navbar = '<ul>
						<li><a href="index.php?show=signup"> Sign UP </a></li>
						<li><a href="index.php?show=login"> Login </a></li>
						<li><a href="index.php?show=contact"> Contact </a></li>
						<li><a href="#page-2"> Places </a></li>
						<li><a href="#"> Home </a></li>
					</ul>';
	}
	
?>
<html>
<head>
	<title> TMS Home Page </title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
	<link rel="stylesheet" type="text/css" href="ui/resources/homepage.css">
<head>

<body>
	<div id="page-1">
		<div>
			<h1 id="site-header"> Travel.com </h1>
			
			<div class="site-nav" id="navbar">
				<?php echo $navbar; ?>
			</div>
		</div>
		
		<div id="search">
			<h1> <b> Where Do You Want to Go? </b> </h1>
			<h3> Trips, experiences and places all in one service </h3>
			
			<div>
				<form method="post">
					<input type="text" name="keyword"/>
					<input type="submit" value="Search"/>
				</form>
			</div>
		</div>
	</div>
	
	<div id="page-2">
		<h1><b> Popular Destinations </b></h1>
	
		
		<div id="grid">
			<table border="0" width="100%">
				<thead></thead>
				
				<tbody>
					<tr>
						<td>
						<h4 class="place-name">Place Name</h4>
						<img width=70% height=auto src="ui/images/01.jpg" />
						</td>

						<td>
						<h4 class="place-name">Place Name</h4>
						<img width=70% height=auto src="ui/images/02.jpg" />
						</td>

						<td>
						<h4 class="place-name">Place Name</h4>
						<img width=70% height=auto src="ui/images/03.jpg" />
						</td>
					</tr>

					<tr>
						<td>
						<h4 class="place-name">Place Name</h4>
						<img width=70% height=auto src="ui/images/04.jpg" />
						</td>

						<td>
						<h4 class="place-name">Place Name</h4>
						<img width=70% height=auto src="ui/images/07.jpg" />
						</td>

						<td>
						<h4 class="place-name">Place Name</h4>
						<img width=70% height=auto src="ui/images/06.jpg" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<?php

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		if($loggedIn){
			$keyword = trim($_REQUEST['keyword']);
			$_SESSION['keyword'] = $keyword;
			header("location: index.php?show=search");
		}
		else
			echo "<script> alert('Please Login First.');</script>";
		
	}
	
	// $places = getAllPlaces();
	// //var_dump($places);
	// foreach($places as $item){
		// echo $item['name'];
		// echo "<br/>";
	// }

?>