<?php
/**
 * User: Hassan J.
 * Date: 5/15/16
 */


$dbhost = "localhost";
$dbusername = "wwwhqbju_project";
$dbpassword = "st37CWna2f22K3auPS";
$dbname = "wwwhqbju_project";
$root = "http://team-hha.com/baucsteam";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
if ($conn) {
    mysqli_select_db($conn, $dbname);
} else {
    print "Cannot connect to database. <br/>";
}

?>

