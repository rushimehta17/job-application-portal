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
        $user_name=$_POST['user_name'];
        $password=$_POST['pass'];
        $contact=$_POST['contact'];
        $location=$_POST['location'];
        
        //CHECK WHETHER CHECKBOX IS SELECTED OR NOT
        if(isset($_POST['WebDevelopment'])){$webdev = 1;}
        if(isset($_POST['AppDevelopment'])){$appdev=1;}
        if(isset($_POST['GraphicDesigning'])){$gdes=1;}
        if(isset($_POST['GameDevelopment'])){$gamedev=1;}

        $query=mysqli_query($con,"INSERT INTO `registration`(SName, Email, Username, SPassword, Contact, SLocation, WebDevelopment, AppDevelopment,GraphicDesigning,GameDevelopment) VALUES ('$name','$email','$user_name','$password','$contact','$location','$webdev','$appdev','$gdes','$gamedev')");
       
        if ($query)
        {      
            //$id = mysqli_query($con,"SELECT id FROM `registration` WHERE Username='$user_name'"); 
            //if($id) {echo $id;}
            //else{echo mysqli_error($con);}
           // $_SESSION['userid'] = $id;  
            
            echo "<script>alert(' Detail has been added.')</script>";         
            header("location:login.php");
            
        }
        else{
            echo "<script>alert('Something Went Wrong. Please try again query'.mysqli_error(.$con))</script>";

        }

        //echo $webdev;
        
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
	

	<nav>
		<ul>
		</ul>
		<li><a href="index.php" style="font-family: 'Kaushan Script'; font-size: 25px; margin-left: 100px">FIND JOBS</a></li>
	</nav>
<br>
<div class="input-details">
    <form method ="post">
        
        <h2>Registeration Info </h2>
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="text" placeholder="User Name" name="user_name" required>
            <input type="password" placeholder="Password" name="pass" required>
            <input type="text" placeholder="Contact" name="contact" required>
            <input type="text" placeholder="Location" name="location" required><br><br>
	        Select Your skils:<br><br>
            <input type="checkbox" name="WebDevelopment" value="WebDevelopment"> Web Development<br>
            <input type="checkbox" name="AppDevelopment" value="AppDevelopment"> App Development<br>
            <input type="checkbox" name="GraphicDesigning" value="GraphicDesigning"> Graphic Designing<br>
            <input type="checkbox" name="GameDevelopment" value="GameDevelopment"> Game Development <br><br>
            <input type="submit" class="mainBTN" name="submit" value="Register">
            <br><br>
            <a href="Companyregis.php">Register as company</a>
    </form>
<div>
</body>
</html>