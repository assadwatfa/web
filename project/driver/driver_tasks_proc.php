<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Driver Page</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

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
                        <li class="active"><a href="driver_tasks.php">Tasks</a></li>
                        <li><a href="driver_tasks_done.php">Tasks Accomplished</a></li>
                    </ul>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Profile</a>
                        </li>
                        <li><a href="../driver/">Driver</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <?php
        $email_to_process_done = $_POST['email_to_process_done'];
        $query = "INSERT INTO project_requests_done(driver_email,address,email) SELECT driver_email,address,email FROM project_requests_processing where email = '$email_to_process_done'";
        $result = mysqli_query($conn, $query) or die("Connection failed : " . mysqli_connect_error());
        $query2 = "DELETE FROM project_requests_processing WHERE email = '$email_to_process_done'";
        $result2 = mysqli_query($conn, $query2) or die("Connection failed : " . mysqli_connect_error());
        if ($result && $result2) {
            echo "<h2>Task altered to DONE</h2>";
            ?>
            <form action="driver_tasks.php" align="center">
                <button type="submit" class="btn btn-default btn-lg">Return</button>
            </form>
            <?php


        } else {
            print "You do not have permissions to access this page.<br/>";
        }

    }
} else {
    header('location: ../login/');
}
?>
<div class="navbar navbar-fixed-bottom">
    <div id="footer-data" style="text-align:center">
        <a href="https://github.com/BAUCSTeam" target="_blank"><i class="fa fa-github fa-3x" aria-hidden="true"></i></a>
        <a href="https://facebook.com/BAUCSTeam" target="_blank"><i class="fa fa-facebook-square fa-3x"
                                                                    aria-hidden="true"></i></a>
        <a href="https://instagram.com/BAUCSTeam" target="_blank"><i class="fa fa-instagram fa-3x"
                                                                     aria-hidden="true"></i></a>
        <a href="https://twitter.com/BAUCSTeam" target="_blank"><i class="fa fa-twitter-square fa-3x"
                                                                   aria-hidden="true"></i></a>
    </div>
</div>
</body>
</html>