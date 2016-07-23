<?php

	session_start();
	$username = 'root';
	$password = '';
	$hostname = 'localhost';

	

	$dbhandle = new mysqli($hostname, $username, $password) or die("Could not connect");
	
	

	$myusername = $_POST['user'];
	$mypassword = $_POST['pass'];

	$_SESSION["username"] = $myusername;
	$_SESSION["password"] = $mypassword;

	$query = mysql_query("SELECT * FROM posterwalldb . users WHERE username = '$myusername' and password = '$mypassword'");
	$count = mysql_num_rows($query);
	
		if($count==1)
		{
			header('Location: /posterwall/profile/profile_page.php');
		}
		else{
			echo "Username or Password not found.";
		}
?>
