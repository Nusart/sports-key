<?php
include_once 'database.php';
$success = "";

if(isset($_POST['save']))
{  
    $roll   = $_POST['roll'];
    $name   = $_POST['name'];
    $mobile = $_POST['mobile'];
    $court  = $_POST['court'];
//    $issue  = $_POST['issue_time']; 
     
    $sql    = "INSERT INTO entries (roll,name,mobile,court)
    VALUES ('$roll','$name','$mobile','$court')";

    if (mysqli_query($conn, $sql))
    {
        if ( $court == 'Practice Court')
            $success = $court . " key issued successfully!";
        else
            $success = $court . " court key issued successfully!"; 
    }
    else
    {
   echo "Error: " . $sql . "
    " . mysqli_error($conn);
   }
    mysqli_close($conn);
}
?>