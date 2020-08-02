<?php
include('dbcon.php');
if(isset($_POST['download'])){
    $_SESSION['choice']=$_POST['choice'];
    header('location:download.php');
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
            <li><a href="dashboard.php" style="margin-left: 35%;"><span style="font-size: 24px;" class="fa fa-user"></span></a></li>
            <li><a href="logout.php"><span style="font-size: 24px;" class="fa fa-power-off"></span></a></li>
		</ul>
		<li><a href="index.php" style="font-family: 'Kaushan Script'; font-size: 25px; margin-left: 100px">FIND JOBS</a></li>
    </nav>
    <br>
<div class='details' style="margin-top:7%">
<h2>Employee Details</h2><br><br>
    <form method="post">
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Contact</th>
            <th>Location</th>
            <th>  </th>
        </tr>
        <?php
            $query=mysqli_query($con,"select * from registration"); 
            while($row=mysqli_fetch_array($query)){    
        ?>
        <tr>
            <td><?php  echo $row['id'];?></td>
            <td><?php  echo $row['SName'];?></td>
            <td><?php  echo $row['Email'];?></td>
            <td><?php  echo $row['Username'];?></td>
            <td><?php  echo $row['SPassword'];?></td>
            <td><?php  echo $row['Contact'];?></td>
            <td><?php  echo $row['SLocation'];?></td> 
            <?php  echo '<td><a href="delete.php?id='.$row['id'].'"><span class="fa fa-trash"></span></a></td>' ?>
            
        </tr>
            <?php }?>
    </table>
    </form>


<br><br>
    <!--COMPANY DETAILS TABLE-->
    <h2>Company Details</h2><br><br>
    <form method="post">
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact</th>
            <th>Location</th>
            <th>Payment</th>
            <th>Category</th>
            <th>  </th>
        </tr>
        <?php
            $query=mysqli_query($con,"select * from jobavailable"); 
            while($row=mysqli_fetch_array($query)){    
        ?>
        <tr>
            <td><?php  echo $row['id'];?></td>
            <td><?php  echo $row['companyName'];?></td>
            <td><?php  echo $row['Email'];?></td>
            <td><?php  echo $row['SPassword'];?></td>
            <td><?php  echo $row['Contact'];?></td>
            <td><?php  echo $row['SLocation'];?></td>
            <td><?php  echo $row['payment'];?></td> 
            <td><?php  echo $row['category'];?></td> 
            <?php  echo '<td><a href="deleteCompany.php?id='.$row['id'].'"><span class="fa fa-trash"></span></a></td>' ?>
            
        </tr>
            <?php }?>
    </table>
    <br><br>
        <button type="submit" class="mainBTN"  name="download">Download</button>
    
    </form>
</div>
</body>
</html>