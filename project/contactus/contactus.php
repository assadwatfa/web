<!DOCTYPE html>
<html>
<head>
    <title>Green Leb - Contact Us</title>
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
                <li><a href="../contactus/">Contact Us</a></li>
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


$subject = $_POST['subject'];
$message = $_POST['message'];
$to = "assad_watfa@hotmail.com";
if (isset($_POST['subject'])) {
    $subject = $_POST['subject'];
} else {
    print "Please Enter a Subject.<br/>";
}

if (!isset($_SESSION['email'])) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        print "Please Enter an E-mail.<br/>";
    }
}

if (isset($_POST['message'])) {
    $message = $_POST['message'];
} else {
    print "Please Enter a Message. <br/>";
}

if (isset($_POST['subject']) && isset($_POST['message']) && (isset($_SESSION['email']) || isset($_POST['email']))) {
    if (!empty($_POST['subject']) && !empty($_POST['message'])) {
        mail($to, "From:$email,Subject:$subject", $message);
        print "<h2>Message Sent</h2></br>";
        print "<h2>We will be in contact soon!</h2>";
        print "<h2>Go back by clicking <a href='../contactus/'>here</a>.</h2>";
    } else {
        print "<h2>Some fields are missing.</h2> </br>";
    }
}
?>


</body>
</html>