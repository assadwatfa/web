<!DOCTYPE html>
<head>
    <title>

    </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
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
                <li><a href="../help/">Help</a></li>
            </ul>

        </div>
        <?php

        session_start();
        include('../config.php');
        include('../nodes/index.php');
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            ?>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
                        <?php
                        if (getPermissions($email) == 1) {
                            print '<li><a href="../driver/">Driver</a>';
                            print '<li><a href="../admin/">Admin</a>';
                        } else if (getPermissions($email) == 2) {
                            print '<li><a href="../driver/">Driver</a>';
                        }
                        ?>

                    </li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
            <?php
        } else {
            ?>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../register/">Register</a></li>
                    <li><a href="../login/">Login</a></li>
                </ul>
            </div>
            <?php
        }
        ?>
    </div>
</nav>


<?php
if (isset($_SESSION['email-unverified'])) {
    print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please check your mail to activate your account!</div>';
}


if (isset($_POST['sendButton'])) {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM project_users WHERE email= '$email'";
        if ($result = mysqli_query($conn, $sql)) {
            $rowcount = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


            $requestEmail = $row['email'];
            $requestAddress = $row['address'];


            $sql2 = "INSERT INTO project_requests (email, address)VALUES('$requestEmail', '$requestAddress')";
            if (mysqli_query($conn, $sql2)) {
                print '
            <button name="sendButton" type="submit" class="btn btn-success disabled center-block btn-lg">Request</button><br/>
            <div class="alert alert-success" role="alert">Successfully requested!</div>';
            }
        }
    }
} else {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        if (checkUserRequest($email) != 1) {
            ?>
            <form action="index.php" method="post">
                <button name="sendButton" type="submit" class="btn btn-success center-block btn-lg">
                    Request
                </button>
            </form>

            <br/>
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
}


?>
<table class="table table-striped table-hover" style="background-color: inherit">
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

    displayRequests();
    ?>

</table>

</body>
</html>