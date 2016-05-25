<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Change Password</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>

<?php
/**
 * User: Hassan J.
 * Date: 5/12/16
 */

session_start();
include('../config.php');
include('../nodes/index.php');


if (!isset($_SESSION['email'])) {
    header('location: ../login/');
} else {
    $email = $_SESSION['email'];
    ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"> <span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
                    Green Leb</a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../requests/">Requests</a></li>
                    <li><a href="../reviews/">Reviews</a></li>
                    <li><a href="../education/">Education</a></li>
                    <li><a href="../contactus/">Contact Us</a></li>
                </ul>

            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
                    </li>
                    <?php
                    if (getPermissions($email) == 1) {
                        print '<li><a href="../driver/">Driver</a></li>';
                        print '<li><a href="../admin/">Admin</a></li>';
                    } else if (getPermissions($email) == 2) {
                        print '<li><a href="../driver/">Driver</a></li>';
                    }
                    ?>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br/><br/>

    <?php
    if (isset($_SESSION['email-unverified'])) {
        print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please check your mail to activate your account!</div>';
    }

    if (checkAvailability($email) === 1) {
        $table = "project_users";
    } else if (checkAvailability($email) === 2) {
        $table = "project_unverified_users";
    }

    if (isset($_POST['firstname'])) {
        if (!empty($_POST['firstname'])) {
            $firstname = strip_tags($_POST['firstname']);
            $sql = "UPDATE $table SET firstname='$firstname' WHERE email= '$email'";
            if (mysqli_query($conn, $sql)) {
                print '<div class="alert alert-success" role="alert" style="text-align: center">Successfully changed first name.</div>';
            } else {
                print '<div class="alert alert-danger" role="alert" style="text-align: center">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Failed to change first name.<br/>';
                print "Go back by clicking <a href='change_info.php'>here</a>.</div>'";
            }
        }
    }

    if (isset($_POST['lastname'])) {
        if (!empty($_POST['lastname'])) {
            $lastname = strip_tags($_POST['lastname']);
            $sql = "UPDATE $table SET lastname='$lastname' WHERE email= '$email'";
            if (mysqli_query($conn, $sql)) {
                print '<div class="alert alert-success" role="alert" style="text-align: center">Successfully changed last name.</div>';
            } else {
                print '<div class="alert alert-danger" role="alert" style="text-align: center">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Failed to change last name.<br/>';
                print "Go back by clicking <a href='change_info.php'>here</a>.</div>'";
            }
        }
    }

    if (isset($_POST['address'])) {
        if (!empty($_POST['address'])) {
            $address = strip_tags($_POST['address']);
            $sql = "UPDATE $table SET address='$address' WHERE email= '$email'";
            if (mysqli_query($conn, $sql)) {
                print '<div class="alert alert-success" role="alert" style="text-align: center">Successfully changed address.</div>';
            } else {
                print '<div class="alert alert-danger" role="alert" style="text-align: center">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Failed to change address.<br/>';
                print "Go back by clicking <a href='change_info.php'>here</a>.</div>'";
            }
        }
    }
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address'])) {
        if (empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['address'])) {
            print '<div class="alert alert-danger" role="alert" style="text-align: center">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Fields cannot be all empty.<br/>';
            print "Go back by clicking <a href='change_info.php'>here</a>.</div>'";
        }
    }
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



