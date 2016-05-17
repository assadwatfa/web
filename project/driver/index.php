<?php
/**
 * Created by PhpStorm.
 * User: Hassan
 * Date: 5/14/2016
 * Time: 5:18 PM
 */

session_start();
include('../nodes/index.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    if (getPermissions($email) == 1 || getPermissions($email) == 2) {
        print "Hello kappa<br/>";
    } else {
        print "You do not have permissions to access this page.<br/>";
    }

} else {
    header('location: ../login/');
}
