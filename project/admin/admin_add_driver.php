<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Add Driver</title>

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
if (getPermissions($email) == 1) {
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
                                           aria-hidden="true"></span> Admin Page</a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_search.php">Search</a></li>
                <li><a href="admin_process_requests.php">Process Requests</a></li>
                <li><a href="admin_view_processing_requests.php">Requests Processing</a></li>
                <li class="active"><a href="admin_add_driver.php">Add Driver</a></li>
                <li><a href="admin_view_drivers.php">View Drivers</a></li>

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
<div class="container">

    <form class="form-signin" action="admin_add_driver_proc.php" method="POST">
        <div class="col-xs-4" style="background-color:white;border-radius: 25px;">
            <h2 class="form-signin-heading">Add Driver</h2>
            <input type="text" placeholder="Enter Driver's First Name" name="firstname"
                   class="form-control">
            <input type="text" placeholder="Enter Driver's Last Name" name="lastname"
                   class="form-control">
            <input type="password" placeholder="Enter his desired password" name="password1"
                   class="form-control">
            <input type="password" placeholder="Confirm his desired password" name="password2"
                   class="form-control">
            <input type="text" placeholder="Enter his phone number" name="phone" pattern="[0-9]{2}[0-9]{6}"
                   class="form-control">
            <input type="address" placeholder="Enter his address" name="address"
                   class="form-control">
            <input type="email" placeholder="Enter his Email" name="email"
                   class="form-control">
            <br/>

        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>


    </form>


    <?php
    } else {
        print "You do not have permissions to access this page.<br/>";
    }

    } else {
        header('location: ../login/');
    }

    ?>


</body>
</html>