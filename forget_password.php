<html>
	<head>
		<title>Forget Password</title>
	</head>

	<body>
		<div align="center">
		<div align="center" style="width:500px; padding-top:150px">
		<form method="post">
		<fieldset>
		<legend><h1>Forget Password</h1></legend>
		<table border="0">
		<tr>
			<td> <p><b>Email :</b></p> </td>
			<td> <input type="text" name="email"/> </td>
		</tr>
		<tr>
			<td> <p><b> New Password :<b></p> </td>
			<td> <input type="password" name="newpassword"/> </td>
		</tr>
		<tr>
			<td> <p><b> Confirm New Password :<b></p> </td>
			<td> <input type="password" name="confirmpassword"/> </td>
		</tr>
		</table>
		<table border="0">
		<tr> </tr>
		<tr colspan="2" align="center">
			<td> <input type="button" Value="Submit" onclick="validation()"/> </td>
		</tr>
		</table>
		<hr/>
		<a href="sign_in.php">Back to Sign In</a>
		<br><br>
		<a href="index.php">Back to Home</a>
		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>

<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$new_password=$_POST['newpassword'];
		$confirm_password=$_POST['confirmpassword'];
		$email=$_POST['email'];
		if($confirm_password!=$new_password){
			echo "Password not matched!!";
		}else{
			$encrypt_new_pass=md5($new_password);
		}
			
		$email_check=mysqli_query($conn,"select * from registration where email='$email'");
		$count=mysqli_num_rows($email_check);
	
		if($count != 0){
			$query="UPDATE registration SET password='$encrypt_new_pass' WHERE email='$email'";
			if(mysqli_query($conn,$query)){
				echo "Records added successfully.";
				header('Location:../View/Signin.php');
			}
			else{
			echo "<h1>*Records  not added.</h1>";
			}	
		}
		else{
			echo "<h1>*email not exits</h1>";
		}
	}
		
?>