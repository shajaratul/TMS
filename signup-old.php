<html>
<head>
	<title>
		User Registration page
	</title>
</head>

<body>
	<center><form method="post">
		Sign Up
		<br/>
		First Name: 
		<br/>
		<input type="text" name=""/>
		<br/>
	
		Last Name:
		<br/>
		<input type="text" name=""/>
		<br/>
		
		Email:
		<br/>
		<input type="text" name=""/>
		<br/>
		
		Password:
		<br/>
		<input type="Password" name=""/>
		<br/>
		
		Confirm Password:
		<br/>
		<input type="Password" name=""/>
		<br/>
		
		Contact No:
		<br/>
		<input type="text" name=""/>
		<br/><br/>

		User Type [User/Admin]
		<br/>
		<br/>
		<select name="usertype">
			<option>User</option>
			<option>Admin</option>
		</select>
		<br/><br/>
		<input type="submit" value="Register"/><br/>
		<a href="./login.php"> Login </a>
		<a href="index.php"> Home </a>

	</form>
	</center>
	


</body>
</html>