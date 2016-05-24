<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Profile</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <style type="text/css">
        img {
            border-radius: 80px;
        }

        td {
            width: 450px;
        }

    </style>
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
function displayInformation($email)
{

    global $conn;
    $sql = "SELECT * FROM project_users WHERE email= '$email'";

    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);


    $sql2 = "SELECT * FROM project_unverified_users WHERE email= '$email'";

    $result2 = mysqli_query($conn, $sql2);
    $rowcount2 = mysqli_num_rows($result2);
    ?>


    <div class="form-group col-xs-4"
         style="margin-left: 20%;text-weight:bold;font-size: medium">

    <?php
    if ($rowcount > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else if ($rowcount2 > 0) {
        $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    }
    print "<table class='td-user-data'>";
    print "<tr><td colspan='2'><img src='" . get_gravatar($_SESSION['email'], 80, 'mm') . "'</td></tr>";
    print "<tr>";
    print "<td style='font-weight: bold'>First name:</td>";
    print "<td>" . $row['firstname'] . "</td>";
    print "</tr>";

    print "<tr>";
    print "<td style='font-weight: bold'>Last name:</td>";
    print "<td>" . $row['lastname'] . "</td>";
    print "</tr>";

    print "<tr>";
    print "<td style='font-weight: bold'>E-mail:</td>";
    print "<td>" . $row['email'] . "</td>";
    print "</tr>";

    print "<tr>";
    print "<td style='font-weight: bold'>Phone:</td>";
    print "<td>" . $row['phone'] . "</td>";
    print "</tr>";

    print "<tr>";
    print "<td style='font-weight: bold'>Address:</td>";
    print "<td>" . $row['address'] . "</td>";
    print "</tr>";

    print "<tr>";
    print "<td style='font-weight: bold'>Date joined:</td>";
    print "<td>" . $row['date_joined'] . "</td>";
    print "</tr>";

    print "<tr><td colspan='2'>Click <a href='../logout.php'>here</a> to logout.</td></tr>";
    print "<tr><td colspan='2'>Click <a href='change_password.php'>here</a> to change password.</td></tr>";
    print "<tr><td colspan='2'>Click <a href='change_info.php'>here</a> to change your information.</td></tr>";
    print "<tr><td><input type='button' class='btn btn-primary' value='Show my requests' onclick='getData();'></td>";
    print "<td><input type='button' class='btn btn-primary' value='Hide my requests' onclick='hideData();'></td></tr>";
    print "<table>";
    ?>

    </div><?php
}


if (isset($_SESSION['email'])) {
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
                    <li><a href="../education/">Education</a></li>
                    <li><a href="../contactus/">Contact Us</a></li>
                </ul>

            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Profile</a>
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

    <br/>
    <br/>
    <?php
    if (isset($_SESSION['email-unverified'])) {
        print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please check your mail to activate your account!</div>';
    }

    displayInformation($_SESSION['email']);

    ?>

    <div id="requests-data">
        <table id="myTable">
        </table>
    </div>


    <?php

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