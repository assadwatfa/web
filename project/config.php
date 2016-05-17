<?php

$dbhost = "localhost";
$dbusername = "wwwhqbju_project";
$dbpassword = "st37CWna2f22K3auPS";
$dbname = "wwwhqbju_project";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
if ($conn) {
    mysqli_select_db($conn, $dbname);
//    print "Successfully connected.<br/>";
} else {
    print "Cannot connect to database. <br/>";
}

?>

