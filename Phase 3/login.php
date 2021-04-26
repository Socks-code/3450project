<?php
if (isset($_POST['username'])) {
	$connect = mysqli_connect("localhost","root","") or die("couldnt connect");
	mysqli_select_db($connect,"login");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($connect,$sql);

	if ((mysqli_num_rows($result) > 0))
	{
		$results = mysqli_fetch_array($result);
		header("location: welcome.php");


		}
		else{
			echo "invalid credentials";
		}
	}
?>