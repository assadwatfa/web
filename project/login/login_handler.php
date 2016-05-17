<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Login</title>

    <link rel="stylesheet" href="../style/style.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>


<body>
<ul class="nav">
    <li class="logo">Green Lebanon</li>
    <li><a href="../index.php">Lobby</a></li>
    <li><a href="../requests">Requests</a></li>
    <li class="active"><a href="index.php">Login</a></li>
    <li><a href="../register">Register</a></li>
    <!--        <li style="float:right"><a href="profile.php">Profile</a></li>-->
    <!--        <li style="float:right"><a href="settings.php">Settings</a></li>-->

</ul>
<br/>

<?php
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
            print "Go back by clicking <a href='../login/'>here</a>.";

        }


    }
}


?>
</body>
</html>



