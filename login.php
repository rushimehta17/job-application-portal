<?php
	session_start();
	error_reporting(0);
	include('dbcon.php');
	if(isset($_POST['login'])){
    	$loginuser=$_POST['username'];
    	$password=$_POST['password'];
    	$query=mysqli_query($con,"select * from registration where Username='$loginuser' && SPassword='$password'"); 
    	$ret=mysqli_fetch_array($query);
    	if($ret>0){
			$_SESSION['userid']=$ret['id'];
			$std=$_SESSION['userid'];
			header('location:searchjob.php');
		}
    	else{
			echo "<script> alert('Invalid Credentials')</script>";
    	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="main.css">

	<!--custom fonts -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>
<body>
	<!--NAVIGATION BAR-->
	<nav>
		<ul>
		</ul>
		<li><a href="index.php" style="font-family: 'Kaushan Script'; font-size: 25px; margin-left: 100px">FIND JOBS</a></li>
	</nav>

	<!--LOGIN FORM-->
	<div class="login-box">
		<h1>Emoployee Sign IN</h1>

		<form method="post">
		<div class="textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" placeholder="Username" name="username" required>
		</div>
		<div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="password" required>
		</div>
		<button class="btn" type="submit" name="login">Sign in</button>
		<br><br>
		 <a href="registration.php">Register Here as Employee</a>
		<br> <a href="Companyregis.php">Register Here as Company</a>
	</form>
<br>
		<a href="Companylogin.php">Login as Company </a> <br><a href="adminlogin.php">Login as Admin </a>
	</div>
</body>
</html>