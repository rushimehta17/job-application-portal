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
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
</head>
<body>

<!--NAVIGATION BAR-->
<nav>
		<ul>
            <li><a href="logout.php" style="margin-left: 35%;"><span style="font-size: 24px;" class="fa fa-user"></span></a></li>
            <li><a href="logout.php"><span style="font-size: 24px;" class="fa fa-power-off"></span></a></li>
		</ul>
		<li><a href="index.php" style="font-family: 'Kaushan Script'; font-size: 25px; margin-left: 100px">FIND JOBS</a></li>
	</nav>
	<br>
	
		<?php
			$userid=$_SESSION['userid'];			
			$rethead=mysqli_query($con,"SELECT * from `registration` where id='$userid'");
			$rowhead=mysqli_fetch_array($rethead);
			
			$SName=$rowhead['SName'];
			$users_name = $rowhead['Username'];
			$SPasswrd = $rowhead['SPassword'];
			$Contact = $rowhead['Contact'];
			$loactions = $rowhead['SLocation'];

			echo '<div style="margin-top: 6%;text-align:center;">';
			echo '<h3>Welcome '.$SName.' !</h3>';
			
		?>
	<div class="update-details">
     	<form METHOD ="POST">
               
        	Name: <input type="text" value='<?php echo $SName; ?>' name="txtName" id="txtName"><br>
        
        	Username: <input type="text" value='<?php echo $users_name; ?>' name="txtUser" id="txtUser"><br>
       
            Password: <input type="password" value='<?php echo $SPasswrd; ?>' name="txtPass" id="txtPass"><br>
        
            Contact no: <input type="text" value='<?php echo $Contact; ?>' name="txtContact" id="txtContact"><br>
			
			Location: <input type="text" value='<?php echo $loactions; ?>' name="txtLocation" id="txtLocation"><br>
        
            <input type="submit" name="update" value="Update">

    </form>
	  </div>
   <?php
		if(isset($_POST['update']))
		{
			$sregID = $_SESSION['userid'];
            $updatename=$_POST['txtName'];
            $updateusername=$_POST['txtUser'];
            $updatepassword=$_POST['txtPass'];
			$updatecontact=$_POST['txtContact'];
			$updatelocation = $_POST['txtLocation'];

			$sql="update registration set SName='$updatename', Username='$updateusername', SPassword='$updatepassword', Contact='$updatecontact', SLocation='$updatelocation' where id='$sregID'";
			
			$updation = mysqli_query($con,$sql);
			if($updation)
			{
				echo '<script>alert("Your details are updated successfully!")</script>';
				header("location:dashboard.php");
			}
			else
			{
				echo"Error:" .mysqli_error($conn);
			}
		}
   ?>


</body>
</html>
<?php }?>