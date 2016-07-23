<html>
<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" type="text/css" href="css/register.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/wall.css">
		<link rel="stylesheet" href="css/media-queries.css">

		<script src="js/modernizr.custom.js"></script>

		<title>Posterwall Registration</title>
</head>
<body>
<div class="row-fluid" id="container">
<center><h1 id="title"><br>
<?php
	Session_start();
	$username = "root";
	$password = "";
	$hostname = "localhost";
	mysql_select_db("post");

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$dbhandle = mysql_connect($hostname, $username, $password) or die("could not connect to MySQL");

	if (strlen($_POST['pass']) < 6 && strlen($_POST['pass']) > 1)
	{
    echo "Your password must be longer than 6 characters.<br>";
	}
	else if ($_POST['pass']== '')
	{
    echo "Please type a password, and then retype it to confirm.<br>";
	}
	else
	{   
		mysql_query(" INSERT INTO posterwalldb . users (username,password) VALUES ('$user','$pass') ");
		echo mysql_error();
		echo "Registration Complete!
			<br><br><input type='submit' value='Go to main page' class='btn btn-primary' id='btnmain'> ";
	}

?>

<?php
	if (isset($_POST['btnmain'])){
	header('Location: /posterwall/index2.html');
	}
?>

</h1>
		</div>
</body>
</html>