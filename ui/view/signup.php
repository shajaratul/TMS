<html>
	<head>
		<title>Sign up</title>
	</head>

	<body>
		<div align="center">
		<div align="center" style="width:500px; padding-top:150px">
		<form id="form1" method="post">
		<fieldset>
		<legend><h1>Registration</h1></legend>
		<table border="0">
		<tr>
			<td> <p><b>Name:</b></p> </td>
			<td> <input type="text" id="name" name="name"/> </td>
		</tr>
		
		<tr>
			<td> <p><b>Email:</b></p> </td>
			<td> <input type="text" id="email" name="email"/> </td>
		</tr>
		<tr>
			<td> <p><b>Contact No:</b></p> </td>
			<td> <input type="text" id="contact" name="contact"/> </td>
		</tr>
		<tr>
			<td> <p><b>Password:</b></p> </td>
			<td> <input type="password" id="password" name="password"/> </td>
		</tr>
		<tr>
			<td> <p><b>Re-type Password:</b></p> </td>
			<td> <input type="password" id="repassword" name="repassword"/> </td>
		</tr>
		</table>
		<table border="0">
			<tr colspan="2" align="center">
			<td> <input type="button" Value="Sign Up" onclick="validation()"/></td>
			</tr>
		</table>
		<hr/>
		<h3>Already have an account ?</h3>
		<a href="index.php?show=login">Click here to Sign In</a>
		<br><br>
		<a href="index.php">Back to Home</a>
		</fieldset>
		</form>
		<script>
			function NameValidation()
			{
				var username = document.getElementById("name").value;
				var nameRE = /^[A-Za-z\s]+$/;
				if(username!="")
					{
						if(nameRE.test(username))
							{
								//alert(name);
								return true;
							}
							else alert("Only A-Z or a-z should be on Name !!!");
                    }
				else
					{
                        alert("Name is missing !!!");
                        return false;
					}
            }

            function EmailValidation()
			{
                var userEmail = document.getElementById("email").value;
                var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if(userEmail!="")
					{
						if(emailRE.test(userEmail))
						{
							//alert(userEmail);
							return true;
						}
						else
						{
							alert("Invalid Email format !!!");
							return false;
						}
					}
				else
					{
						alert("Enter your email address");
						return false;
					}
			}
			
			function PhoneValidation()
			{
                var phoneNo=document.getElementById("contact").value;
				var phoneNoRE = /^\d+$/;	
				if((phoneNo.length<12)&&(phoneNo.length>10))
				{
                    if(phoneNoRE.test(phoneNo))
						{
							var tmp1 = phoneNo.charAt(0);
							var tmp2 = phoneNo.charAt(2);
							if(tmp1==0)
							{
								if(tmp2==5||tmp2==6||tmp2==7||tmp2==8||tmp2==9)
								{
									//alert (phoneNo);
									return true;
								}
								else
								{
									alert("Phone operator does not exist !!!");
									return false;
								}		
							}
							else
							{
								alert("Invalid phone number !!! Must start with a '0'");
								return false;
							}	
						}
				}
					else
					{
                        alert("Invalid phone number !!!");
                        return false;
                    }
			}
			function passwordChecked()
			{
				var password = document.getElementById("password").value;
				var pCapital = /[A-Z]/g;
				var pSmall = /[a-z]/g;
				var pNumber = /[\d]/g;
				var pSymbol = /[!@#$%^&*()-_,.<>?]/g;
 				if(password!="")
				{
					if(password.length>5)
					{
						if(password.length<20)
						{
							if(password.match(pCapital)!=null)
							{
								if(password.match(pSmall)!=null)
								{
									if(password.match(pNumber)!=null)
									{
										if(password.match(pSymbol)!=null)
										{
											//alert("Password OK");
											return true;
										}
										else
										{
											alert("Password must contain a Special Charecter !!!");
											 return false;
										}
									}
									else
									{
										alert("Password must contain a Number !!!");
										 return false;
									}
								}
								else
								{
									alert("Password must contain a Lowercase Letter !!!");
									 return false;
								}
							}
							else
							{
								alert("Password must contain a UpperCase Letter !!!");
								return false;
							}
						}
						else
						{
							alert("Password too Long !!! 20 Charecter Maximum !!!");
							return false;
						}
					}
					else
					{
						alert("Password too Short !!! At least 6 Charecter Required !!!");
						return false;
					}		
				}
				else
				{
					alert("Password can't be Empty !!!");
					return false;
				}
			}
			function confirmPassword()
			{
				var password = document.getElementById("password").value;
				var confirm_password = document.getElementById("repassword").value;
				if(confirm_password!="")
				{
					if(password==confirm_password)
					{
						//alert("Password Matched!!");
						return true;
					}
					else
					{
						alert("Password Didn't Matched!!");
						return false;
					}
				}
				else
				{
					alert("Confirm Password Field Required!!!!");
					return false;
				}
			}
			function validation()
			{		
				var form = document.getElementById("form1");
                if(NameValidation()==true&&EmailValidation()==true&&PhoneValidation()==true&&passwordChecked()==true&&confirmPassword()==true)
				{
					alert("Registration Successful ...");
                    form.submit();
                }		
	        }
        </script>
		</div>
		</div>
	</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
		$user_name=$_POST['name'];	
		$user_email=$_POST['email'];
		$user_contactNo=$_POST['contact'];
		$password=$_POST['password'];
		$confirm_password=$_POST['repassword'];
		$words=explode("@",$user_email);
		$letter= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		
		$error = true;

		if($user_name==''){
			echo"Entter your name please !!!<br/>";
			$error = true;
		}else if(strpos($letter,$user_name[0])==false){
			echo "Name must start with Letter !!!<br/>";
			$error = true;
		}else if(str_word_count($user_name)<2){
			echo "Name must have two words !!!<br/>";
			$error = true;
		}else{
			$error = false;
			//echo $user_name."<br/>";
		}
		
		if($user_email==''){
			echo "Enter your email address !!!<br/>";
			$error = true;
		}else{
			if(count($words)<2){
				echo "Invalide formate !!!<br/>";
				$error = true;
			}else{
				if($words[1]==''){
					echo "Domain name missing !!!";
					$error = true;
				}else{
					$word=explode(".",$words[1]);
					if(count($word)<2){
						echo "wrong Pattern !!!<br/>";
						$error = true;
					}else{
						$error = false;
						//echo $user_email."<br/>";
					}
				}
			}
		}
		
		if(strlen($user_contactNo)<11 && strlen($user_contactNo)>11){
			echo "Invalid contact number !!!";
		}
		
		if( strlen($password) < 5 ) {
		echo "Password too short !!! <br/>";
			$error = true;
		}else{
			if( strlen($password) > 15 ) {
				echo  "Password too long !!! <br/>";
				$error = true;
			}else{
				if( strlen($password) < 5) {
				echo "Password too short !!! <br/>";
				$error = true;
				}else{
					if( !preg_match("#[0-9]+#", $password) ) {
						echo"Password must include at least one number !!! <br/>";
						$error = true;
					}else{
						if( !preg_match("#[a-z]+#", $password) ) {
						echo"Password must include at least one letter !!!<br/>";
						$error = true;
						}else{
							if( !preg_match("#[A-Z]+#", $password) ) {
								echo "Password must include at least one CAPS !!! <br/>";
								$error = true;
							}else{
								if( !preg_match("/[^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[‌​\d])\S*$]/", $password) ) {
									echo "Password must include at least one symbol !!!<br/> ";
									$error = true;
								}else {
									if(preg_match("/[~`!@#$%^&*()_-+=\[\]{}\|\\:;\"\'<,>.]/", $password)){
										echo "Password must include at least one special character !!!<br/> ";
										$error = true;
									}else{
									$error = false;
										//echo $password."<br/>";
										//echo "Your password is strong.<br/>";
										}
								}
							}
						}
					}
				}
			}
		}
		
		if($confirm_password!=$password){
			echo "Password don't match !!!";
			$error = true;
		}else{
				if($confirm_password==''){
					echo "Password don't match !!!";
					$error = true;
				}else{
					if($password==''){
						echo "Password don't match !!!";
						$error = true;
					}else{
						$error = false;
						//$password=md5($password);
						//echo "Your password is strong.<br/>";
					}
				}
			 }
			 
		if($error == false){
			$newUser = array();
			$newUser['name']=$user_name;
			$newUser['email']=$user_email;
			$newUser['contact']=$user_contactNo;
			$newUser['password']=$password;
			addUser($newUser);
			header('Location:index.php?show=login');
		}
		else{echo"Registion Failed ...";}
}
?>