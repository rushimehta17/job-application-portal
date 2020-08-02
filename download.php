<?php
session_start();
include('dbcon.php');

$query = "SELECT * FROM registration";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$History = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $History[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=UserDetails.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('id', 'SName','Email', 'Username', 'SPassword', 'Conatct', 'SLocation', 'WebDevelopment', 'AppDevelopment', 'GraphicDesigning', 'GameDevelopment'));

if (count($History) > 0) {
    foreach ($History as $row) {
        fputcsv($output, $row);
    }
}
?>