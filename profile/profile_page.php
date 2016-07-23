
	

<?php
session_start();
$username= $_SESSION['username'];

	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","posterwalldb");
		$q = mysqli_query($con,"UPDATE users SET profilepic = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
	}?>

<!DOCTYPE HTML>
<html>
	<head>

	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
		<?php
			$con = mysqli_connect("localhost","root","","posterwalldb");
			$q = mysqli_query($con,"SELECT * FROM users");
			$userimg = mysqli_query($con,"SELECT profilepic FROM users WHERE username = '$username'");
			$user = mysqli_query($con,"SELECT FROM users WHERE username = '$username'");
			while($row = mysqli_fetch_assoc($userimg)){
				echo $username;
				if($row['profilepic']==""){
					echo "<img width='100' height='100' src='pictures/default.png' alt='Default Profile Pic'>";
				}
				else {

					echo "<img width='100' height='100' src='pictures/".$row['profilepic']."' alt='Default Profile Pic'>";
				}
				echo "<br>";
			}
		?>
	</body>
</html>