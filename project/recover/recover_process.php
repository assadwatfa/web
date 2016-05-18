<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Recover</title>

    <link rel="stylesheet" href="../style/style.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
    <ul class="nav">
        <li class="logo">Green Lebanon</li>
        <li><a href="../index.php">Lobby</a></li>
        <li><a href="../requests">Requests</a></li>
        <li><a href="../login">Login</a></li>
        <li><a href="../register">Register</a></li>

    </ul>
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


