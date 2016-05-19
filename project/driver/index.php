<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Driver</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>


    <style>
        body {
            background: url('../media/bg.png') no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>


<body>
<?php

session_start();
include('../config.php');
include('../nodes/index.php');

if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
if (getPermissions($email) == 1 || getPermissions($email) == 2) {
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"> <span class="glyphicon glyphicon-user"
                                           aria-hidden="true"></span> Driver Page</a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="driver_tasks.php">Tasks</a></li>
                <li><a href="driver_tasks_done.php">Tasks Accomplished</a></li>
            </ul>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                </li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>


<?php
$sql = "SELECT * FROM project_users WHERE email= '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$name = $row['firstname'];
echo "<h1>Welcome Back $name</h1>";
} else {
    print "You do not have permissions to access this page.<br/>";
}

} else {
    header('location: ../login/');
}
?>