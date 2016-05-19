<!DOCTYPE html>
<head>
    <meta>
    <title></title>
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
                    <li><a href="../education/">Education</a></li>
                    <li><a href="../help/">Help</a></li>
                </ul>

            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Profile</a>
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
        </div>
    </nav>
    <br/><br/>

    <?php
    if (isset($_SESSION['email-unverified'])) {
        print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please check your mail to activate your account!</div>';
    }

    if (!isset($_POST['currentpassword'])) {
        print "Recovery code is missing.";
    } else if (!isset($_POST['password1']) || !isset($_POST['password2'])) {
        print "Passwords missing.";
    } else if (isset($_POST['currentpassword']) && isset($_POST['password1']) && isset($_POST['password2'])) {
        if ($_POST['password1'] === $_POST['password2']) {
            $email = $_SESSION['email'];

            $currentpassword = strip_tags($_POST['currentpassword']);
            $password = strip_tags($_POST['password1']);

            $encryptedCurrentPassword = md5($currentpassword);
            $encryptedNewPassword = md5($password);

            if (checkAvailability($email) === 1) {
                $sql_check = "SELECT * FROM project_users WHERE password= '$encryptedCurrentPassword' AND email= '$email'";
            } else if (checkAvailability($email) === 2) {
                $sql_check = "SELECT * FROM project_unverified_users WHERE password= '$encryptedCurrentPassword' AND email= '$email'";
            }

            $result_check = mysqli_query($conn, $sql_check);
            $rowcount = mysqli_num_rows($result_check);
            $row = mysqli_fetch_array($result_check, MYSQLI_ASSOC);
            $email = $row['email'];

            if ($rowcount > 0) {
                if (checkAvailability($email) === 1) {
                    $sql_update_password = "UPDATE project_users SET password='$encryptedNewPassword' WHERE email= '$email'";
                } else if (checkAvailability($email) === 2) {
                    $sql_update_password = "UPDATE project_unverified_users SET password='$encryptedNewPassword' WHERE email= '$email'";
                }

                if (mysqli_query($conn, $sql_update_password)) {
                    session_destroy();
                    print "Successfully changed password. <br/>";
                    print "Please login back in by clicking <a href='../login'>here</a>.";
                }
            } else {
                print "Wrong password.";
            }
        } else {
            print "Passwords do not match.";
        }
    } else {
        print "Something went wrong.";

    }
}
?>
</body>
</html>



