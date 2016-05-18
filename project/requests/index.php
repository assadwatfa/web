<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Requests</title>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Helvetica;
            background: url('../media/bg.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        img {
            border-radius: 80mm;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-align: center;
        }

        .nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #F8F8F8;
        }

        .nav li {
            display: inline-block;
            padding-right: 20px;
            font-size: 15px;
            float: left;
        }

        .nav li a {
            display: block;
            color: #737373;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #align-right {
            align: right;
            float: right;
            text-align: right;
        }

        .nav li a:hover {
            text-decoration: none;
            color: #C1C1C1;
        }

        .active {
            background-color: #e7e7e7;
        }

        .logo {
            color: #737373;
            float: left;
            font-size: 15px;
            font-weight: bold;
            padding-left: 15px;
            margin-top: 14px;

        }

    </style>
</head>


<body>
<ul class="nav">
    <li class="logo">Green Lebanon</li>
    <li><a href="../index.php">Lobby</a></li>
    <li class="active"><a href="">Requests</a></li>
    <?php
    /**
     * Created by PhpStorm.
     * User: Hassan
     * Date: 5/14/2016
     * Time: 5:14 PM
     */

    include('../config.php');

    session_start();
    if (isset($_SESSION['email'])) {
        ?>
        <li style="float:right"><a href="../profile">Profile</a></li>

        <?php
    } else {
        ?>
        <li><a href="../login">Login</a></li>
        <li><a href="../register">Register</a></li>

        <?php
    }
    ?>
</ul>
<br/><br/>

<?php

if (isset($_SESSION['email-unverified'])) {
    print '<div class="alert-danger">Please check your mail to activate your account!</div>';
}


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    if (checkUserRequest($email) != 1) {
        ?>
        <button type="button" class="btn btn-success center-block btn-lg">
            Request
        </button><br/>
        <?php
    } else {
        ?>
        <button type="button" class="btn btn-success disabled center-block btn-lg">
            Request
        </button><br/>
        <?php
    }
} else {
    ?>
    <button type="button" class="btn btn-success disabled center-block btn-lg">
        Request
    </button><br/>
    <?php
}


?>
<table class="table table-hover table-striped">
    <tr>
        <th>Address</th>
        <th>User e-mail</th>
        <th>Driver e-mail</th>
        <th>Date processing</th>
    </tr>
    <?php


    function checkUserRequest($email)
    {
        global $conn;
        $sql = "SELECT * FROM project_requests WHERE email= '$email'";
        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);

        $sql2 = "SELECT * FROM project_requests_processing WHERE email= '$email'";

        $result2 = mysqli_query($conn, $sql2);
        $rowcount2 = mysqli_num_rows($result2);

        if ($rowcount > 0 || $rowcount2 > 0) {
            return 1;
        } else {
            return -1;
        }
    }


    function displayRequests()
    {
        global $conn;
        $sql = "SELECT * FROM project_requests_processing";

        if ($result = mysqli_query($conn, $sql)) {
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $rows[] = $row;
                }

                foreach ($rows as $row) {
                    echo
                        "<tr>
                    <td> " . $row['address'] . " </td>
                    <td> " . $row['email'] . "</td>
                    <td> " . $row['driver_email'] . "</td>
                    <td> " . $row['date_processing'] . "</td>
                  </tr>";
                }
            }
        } else {
            print "Couldn't fetch data.<br/>";
        }
    }

    ?>

</table>

</body>
</html>