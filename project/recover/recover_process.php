<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Recover</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
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


if (isset($_SESSION['email'])) {
    header('location: ../profile/');
} else {
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
                    <li><a href="../register/">Register</a></li>
                    <li><a href="../login/">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br/>

    <?php
    if (!isset($_POST['email'])) {
        print "Recovery code is missing.";
    } else {
        $email = strip_tags($_POST['email']);
        $code = md5(uniqid(rand()));
        if (checkAvailability($email) != -1) {
            if (checkAvailability($email) === 1) {
                $sql = "UPDATE project_users SET password_recovery='$code' WHERE email= '$email'";
            } else if (checkAvailability($email) === 2) {
                $sql = "UPDATE project_unverified_users SET password_recovery='$code' WHERE email= '$email'";
            }

            if (mysqli_query($conn, $sql)) {
                print "Successfully generated a recovery code.<br/>";
                print "A recovery code has been sent to your e-mail.<br/>";
                print "Click <a href='recover_continue.php'>here</a> to process recovering your account. <br/>";

                $message = "Your recovery code is " . $code . "\r\n";
                $message .= "Go to http://team-hha.com/baucsteam/recover/recover_continue.php to process your password changes.\r\n";
                mail($email, 'Green Leb - Password Recovery', $message);
            } else {
                print "Couldn't connect.<br/>";
            }
        } else {
            print "E-mail not found in database.<br/>";
        }
    }
}

?>
</body>
</html>


