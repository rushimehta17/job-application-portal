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
            <li><a href="dashboard.php" style="margin-left: 35%;"><span style="font-size: 24px;" class="fa fa-user"></span></a></li>
            <li><a href="logout.php"><span style="font-size: 24px;" class="fa fa-power-off"></span></a></li>
		</ul>
		<li><a href="index.php" style="font-family: 'Kaushan Script'; font-size: 25px; margin-left: 100px">FIND JOBS</a></li>
    </nav>
    <br>
<!--JOB AVAILABLE ARE SHOWN HERE-->
<div id="bodyofSite">
<h2>APPLY FOR YOUR PREFFERED JOB</h2>
<br>
Your Skils: 
<!--DISPLAY SKILLS OF USER-->
<?php
$userid = $_SESSION['userid'];
$userQuery = mysqli_query($con,"SELECT * from registration where id='$userid'");
$rowhead=mysqli_fetch_array($userQuery);
$webdev=$rowhead['WebDevelopment'];
$appdev=$rowhead['AppDevelopment'];
$grapdes=$rowhead['GraphicDesigning'];
$gamedev=$rowhead['GameDevelopment'];


if($webdev==1){echo '<span class="Skils">Web Development</span>';$GLOBALS['skillSelected'] = "Web Development";}
if($appdev==1){echo '<span class="Skils">App Development</span>';$GLOBALS['skillSelected'] = "App Development";}
if($grapdes==1){echo '<span class="Skils">Graphic Designing</span>';$GLOBALS['skillSelected'] = "Graphic Designing";}
if($gamedev==1){echo '<span class="Skils">Game Development</span>';$GLOBALS['skillSelected'] = "Game Development";}



?>

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
    $final = $GLOBALS['skillSelected'];
    $result = mysqli_query($con,"SELECT * FROM jobavailable WHERE category = '$final'");
    while($resultArray = mysqli_fetch_array($result))
    {
        echo '<div class="job-detail">';
            echo '<p class="companyName">'.$resultArray['companyName'].'</p>';
            echo $resultArray['category'];
            echo '<br><br><p>Payment Given: ₹​'.$resultArray['payment'].'</p>' ;           
            echo '<br><p>Contact No.: '.$resultArray['Contact'].'</p>' ;
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
        echo $resultArray['category'];
        echo '<br><br><p>Payment Given: ₹​'.$resultArray['payment'].'</p>' ;           
        echo '<br><p>Contact No.: '.$resultArray['Contact'].'</p>' ;
        echo "</div>";
    }
}
?>
</div>
</body>
</html>
<?php }?>