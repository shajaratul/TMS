<html>
	<head>
		<title>Sign In</title>
		<script type="text/javascript">
		
			function validate(){
				var email = document.getElementById("email");
				validate_email(email.value);
			}
		
			function validate_email(email){
					if(email == ""){
						window.alert("Email cannot be empty.");
						validation_failed();
					}
					else{
						var parts = email.split("@");
						if(parts.length != 2){
							window.alert("Invalid Email Address");
							validation_failed();
						}
						else{
							var username = parts[0];
							if(username.length < 1){
								window.alert("Invalid Email Username");
								validation_failed();
							}
							var host = parts[1].split('.');
							if(host.length != 2){
								window.alert("Invalid Email Host.");
								validation_failed();
							}
							var hostname = host[0];
							for(var i=0; i < hostname.length; i++){
								if(!((hostname.charAt(i) >= 'a' && hostname.charAt(i) <= 'z') || (hostname.charAt(i) >= 'A' && hostname.charAt(i) <= 'Z'))){
									window.alert("email hostname should contain only letters.");
									validation_failed();
								}
							}
							var hostdomain = host[1];
							for(var i=0; i < hostdomain.length; i++){
								if(!((hostdomain.charAt(i) >= 'a' && hostdomain.charAt(i) <= 'z') || (hostdomain.charAt(i) >= 'A' && hostdomain.charAt(i) <= 'Z'))){
									window.alert("email domain should contain only letters.");
									validation_failed();
								}
							}
							
						}
					}
				}
				
			function validation_failed(){
				var form = document.getElementsByTagName("form")[0];
				form.onsubmit = function() {return false};
			}
		</script>
		
	</head>

	<body>
		<div align="center">
		<div align="center" style="width:500px; padding-top:150px">
		<form method="post">
		<fieldset>
		<legend><h1>Sign In</h1></legend>
		<table border="0">
		<tr>
			<td> <p><b>Email :</b></p> </td>
			<td> <input type="text" name="emailfield" id="email"/> </td>
		</tr>
		<tr>
			<td> <p><b>Password :<b></p> </td>
			<td> <input type="password" name="passfield" id="password"/> </td>
			<td> <a href="index.php?show=newpass">Forget Password !!!</a> </td>
		</tr>
		</table>
		<table border="0">
		<tr> </tr>
		<tr colspan="2" align="center">
			<td> <input type="submit" Value="Sign In" onclick="validate()"/> </td>
		</tr>
		</table>
		<hr/>
		<h3>Don't have an account ?</h3>
		<a href="index.php?show=signup">Click here to Registrater</a>
		<br><br>
		<a href="index.php">Back to Home</a>
		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	session_start();
	
	$email = trim($_REQUEST['emailfield']);
	$pass = trim($_REQUEST['passfield']);
	
	$login['email'] = $email;
	$login['password'] = $pass;
	
	$userid = getUserByLogin($login);
	
	if($userid != null){
		$_SESSION['id'] = $userid['userid'];
		$usertype = getUserTypeById($userid['userid']);
		if($usertype['usertype'] == 1)
			header("location: index.php?show=ticket-view");
		else
			header("location: index.php?show=home");
	}
	else
		header("location: index.php?show=login");

}

?>


