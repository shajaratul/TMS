<head>
	<title> TMS Home Page </title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
	<style>
	ul {
		list-style-type: none;
		margin: 0px;
		padding: 0px;
		width: Auto;
		height: Auto;
		background-color: #f1f1f1;
	}
	
	li {
		float: right;
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
	
	#search {
		margin-top: 10%;
		text-align: center;
		color: #1a1a00;
		font-family: Arvo;
	}
	
	body {
		margin: 0px;
		padding: 0px;
		
	}
	
	#page-1 {
		background: url(ui/images/sajek.jpg);
		background-attachment: fixed;
		background-size: auto;
		height: 100%;
	}
	
	#page-2 {
		background: url(ui/images/village.jpg);
		background-attachment: fixed;
		background-size: cover;
		height: 100%;
		
		
	}
	
	#page-2 h1 {
		padding: 20px;
		margin: 0px;
		color: white;
		background-color: #0a1429;
		font-family: Arvo;
		width: 25%;
	}
	
	#site-header {
		color: white;
		padding: 20px;
		margin: 0px;
		width: 50%;
	}
	
	.site-nav {
		margin: 0px;
		padding: 0px;
		position: relative;
		top: 0px;
		right: 10px;
		
	}
	
	#grid {
		padding-left: 15%;
		padding-right: 10%;
		padding-top: 2%;
		margin: 0;
	}
	
	.place-name {
		padding: 10px;
		margin: 0px;
		color: white;
		background-color: #0a1429;
		font-family: Arvo;
		width: 25%;
	}
	</style>
<head>

<body>
	<div id="page-1">
		<div>
			<h1 id="site-header"> Travel.com </h1>
			
			<div class="site-nav">
			<ul>
				<li><a href="index?show=signup"> Sign UP </a></li>
				<li><a href="index?show=login"> Login </a></li>
				<li><a href="index?show=contact"> Contact </a></li>
				<li><a href="#page-3"> Holiday Packages </a></li>
				<li><a href="#page-2"> Places </a></li>
				<li><a href="#"> Home </a></li>
			</ul>
			</div>
		</div>
		
		<div id="search">
			<h1> <b> Where Do You Want to Go? </b> </h1>
			<h3> Trips, experiences and places all in one service </h3>
			
			<div>
				<form action="ui/view/searchresult.php">
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