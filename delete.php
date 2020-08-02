<?php
include('dbcon.php');
$sid = $_GET['id'];
$sql = "DELETE FROM registration WHERE id='$sid'";
$del = mysqli_query($con,$sql);
if($del)
{
    echo "<script>alert('Details Deleted.')</script>";
}
else
{
    echo '<script>alert("Something went wrong, Try again.'.mysqli_error($con).'")</script>';
}
?>