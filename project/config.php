<?php
/**
 * User: Hassan J.
 * Date: 5/15/16
 */


$dbhost = "";
$dbusername = "";
$dbpassword = "";
$dbname = "";
$root = "";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
if ($conn) {
    mysqli_select_db($conn, $dbname);
} else {
    print "Cannot connect to database. <br/>";
}

?>

