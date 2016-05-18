<?php
/**
 * User: Hassan J.
 * Date: 5/12/16
 */

session_start();

if (isset($_SESSION['email'])) {
    session_destroy();
    print "Successfully logged out. <br/>";
    print "Click <a href='login'>here</a> to log back in.";
} else {
    print "No session found. <br/>";
    print "Click <a href='login'>here</a> to log in.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Title</title>

    <link rel="stylesheet" href="style/style.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            background: url('media/bg.png') no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>


<body>
<ul class="nav">
    <li class="logo">Green Lebanon</li>
    <li><a href="index.php">Lobby</a></li>
    <li><a href="requests">Requests</a></li>
    <li><a href="login">Login</a></li>
    <li><a href="register">Register</a></li>
</ul>
<br/>

</body>
</html>