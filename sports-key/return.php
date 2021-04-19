<?php
include_once 'database.php';

$now = date("Y-m-d H:i:s");

$sql = "UPDATE entries set return_time='$now' order by Id DESC limit 1";

//echo $sql;

if(mysqli_query($conn, $sql)){
    // Obtain last inserted id
    header('Location: index.php');
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
?>
