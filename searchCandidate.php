<?php
session_start();
error_reporting(0);
include('dbcon.php');
error_reporting(0);

	if (strlen($_SESSION['userid']==0)) {
  	header('location:login.php');
  	} else{ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Jobs</title>
    <link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
</head>
<body>

	<!--NAVIGATION BAR-->
	<nav>
		<ul>
            <li><a href="Companydashboard.php" style="margin-left: 35%;"><span style="font-size: 24px;" class="fa fa-user"></span></a></li>
            <li><a href="logout.php"><span style="font-size: 24px;" class="fa fa-power-off"></span></a></li>
		</ul>
		<li><a href="index.php" style="font-family: 'Kaushan Script'; font-size: 25px; margin-left: 100px">FIND JOBS</a></li>
    </nav>
    <br>
<!--JOB AVAILABLE ARE SHOWN HERE-->
<div id="bodyofSite">
<h2>SEARCH FOR YOUR PREFFERED CANDIDATE</h2>
<br>
Select your category: 
<!--SKILL SELECTION DROPDOWN-->
<br><br>
<form method="post">
<select name="skillSelect">
    <option value="">All </option>
    <option value="Web Development">Web Development </option>
    <option value="App Development ">App Development </option>
    <option value="Graphic Designing">Graphic Designing </option>
    <option value="Game Development">Game Development</option>
</select>
<input type="submit" name="search" id="search" value="Search">
</form>

<br>

<?php

if(isset($_POST['search']))
{
    $GLOBALS['skillSelected'] = $_POST['skillSelect'];
    
    if( $GLOBALS['skillSelected']=="Web Development"){$sql="SELECT * FROM registration WHERE WebDevelopment=1";}
    if( $GLOBALS['skillSelected']=="App Development"){$sql="SELECT * FROM registration WHERE AppDevelopment=1";}
    if( $GLOBALS['skillSelected']=="Graphic Designing"){$sql="SELECT * FROM registration WHERE GraphicDesigning=1";}
    if( $GLOBALS['skillSelected']=="Game Development"){$sql="SELECT * FROM registration WHERE GameDevelopment=1";}

    //$final = $GLOBALS['skillSelected'];
    $result = mysqli_query($con,$sql);
    while($resultArray = mysqli_fetch_array($result))
    {
        echo '<div class="job-detail">';
            echo '<p class="companyName">'.$resultArray['SName'].'</p>';
            echo '<p>'.$resultArray['Email'].'</p>' ;
            echo $resultArray['SLocations'];
            echo $GLOBALS['skillSelected'];
        echo "</div>";
    }
}

else
{
    //$GLOBALS['skillSelected'] = $_POST['skillSelect'];
    $final = $GLOBALS['skillSelected'];
    $result = mysqli_query($con,"SELECT * FROM jobavailable WHERE category = '$final'");
    while($resultArray = mysqli_fetch_array($result))
    {
        echo '<div class="job-detail">';
            echo '<p class="companyName">'.$resultArray['companyName'].'</p>';
            echo '<p>'.$resultArray['payment'].'</p>' ;
            echo $resultArray['category'];
        echo "</div>";
    }
}
?>
</div>
</body>
</html>
<?php }?>