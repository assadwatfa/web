<?php

$dbhost = "localhost";
$dbusername = "";
$dbpassword = "";
$dbname = "";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
if ($conn) {
    mysqli_select_db($conn, $dbname);
//    print "Successfully connected.<br/>";
} else {
    print "Cannot connect to database. <br/>";
}

?>

