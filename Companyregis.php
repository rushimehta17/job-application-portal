<?php
session_start();
error_reporting(0);
include('dbcon.php');
error_reporting(0);
$webdev = 0;
$appdev = 0;
$gdes = 0;
$gamedev=0;

    if(isset($_POST['submit'])){
        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $contact=$_POST['contact'];
        $location=$_POST['location'];
        $payment = $_POST['payment'];
        $category = $_POST['cateSelect'];

        $query=mysqli_query($con,"INSERT INTO `jobavailable`(companyName, Email, SPassword, Contact, SLocation, payment, category) VALUES ('$name','$email','$password','$contact','$location','$payment','$category')");
       
        if ($query)
        {                 
            echo "<script>alert(' Detail has been added.')</script>";         
            header("location:Companylogin.php");
            
        }
        else{
            echo "error".mysqli_error($con);

        }
        
        }   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jobs</title>
	<!--style sheet link -->
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
<br>
<div class="input-details">
    <form method ="post">
        
        <h2>Registeration Info </h2>
            <input type="text" placeholder="Company Name" name="name" required>
            <input type="email" placeholder="Company Email" name="email" required>
            <input type="password" placeholder="Password" name="pass" required>
            <input type="text" placeholder="Contact" name="contact" required>
            <input type="text" placeholder="Location" name="location" required>
            <input type="text" placeholder="Payment given (₹​)" name="payment" required><br><br>
	        Select category:<br><br>
            <select name="cateSelect">
                <option value="">All </option>
                <option value="Web Development">Web Development </option>
                <option value="App Development ">App Development </option>
                <option value="Graphic Designing">Graphic Designing </option>
                <option value="Game Development">Game Development</option>
            </select><br><br>
            <input type="submit" class="mainBTN" name="submit" value="Register">
    </form>
<div>
</body>
</html>