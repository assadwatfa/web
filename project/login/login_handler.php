<!DOCTYPE html>
<html>
<head>
    <meta>
    <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../register/">Register</a></li>
                <li><a href="../login/">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<br/>

<?php
/**
 * User: Hassan J.
 * Date: 5/12/16
 */
session_start();
include('../config.php');


if (isset($_SESSION['email'])) {
    header('location: ../profile/');
} else {
    if (!isset($_POST['email'])) {
        print "E-mail is missing.";
    } else {
        $email = strip_tags($_POST['email']);
    }

    if (!isset($_POST['password'])) {
        print "Password is missing.";
    } else {
        $password = strip_tags($_POST['password']);
    }

    if (isset($_POST['email']) && isset($_POST['password'])) {

        $encryptedPassword = md5($password);
        $sql = "SELECT * FROM project_users WHERE email= '$email' AND password= '$encryptedPassword'";

        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);

        $sql2 = "SELECT * FROM project_unverified_users WHERE email= '$email' AND password= '$encryptedPassword'";

        $result2 = mysqli_query($conn, $sql2);
        $rowcount2 = mysqli_num_rows($result2);

        if ($rowcount > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
//            print "Welcome back " . $_SESSION['firstname'] . "!";
            header('location: ../profile/');
        } else if ($rowcount2 > 0) {
            $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            $_SESSION['email'] = $row['email'];
            $_SESSION['email-unverified'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
//            print "Welcome back " . $row['firstname'] . "!";
            header('location: ../profile/');
        } else {
            print "Wrong email or password.<br/>";
            print "Go back by clicking <a href='../login/'>here</a>.<br/>";
            print "Forgot your password? Click <a href='../recover/'>here</a>.";

        }
    }
}


?>
</body>
</html>



