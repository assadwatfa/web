<!DOCTYPE html>
<html>
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
function displayInformation($email)
{

    global $conn;
    $sql = "SELECT * FROM project_users WHERE email= '$email'";

    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);


    $sql2 = "SELECT * FROM project_unverified_users WHERE email= '$email'";

    $result2 = mysqli_query($conn, $sql2);
    $rowcount2 = mysqli_num_rows($result2);

    if ($rowcount > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="form-group col-xs-3"
     style="background-color: white; border-radius: 25px; text-align:center; margin-left: 20%;text-weight:bold;font-size: medium">
    <?php
        print "<img src='" . get_gravatar($_SESSION['email'], 80, 'mm') . "'/><br/>";
        print "First name: " . $row['firstname'] . " <br/>";
        print "Last name: " . $row['lastname'] . " <br/>";
        print "E-mail: " . $row['email'] . " <br/>";
        print "Phone number: " . $row['phone'] . " <br/>";
        print "Address: " . $row['address'] . " <br/>";
        print "Date joined: " . $row['date_joined'] . " <br/>";
    } else if ($rowcount2 > 0) {
        $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        print "<img src='" . get_gravatar($_SESSION['email'], 80, 'mm') . "'/><br/>";
        print "First name: " . $row['firstname'] . " <br/>";
        print "Last name: " . $row['lastname'] . " <br/>";
        print "E-mail: " . $row['email'] . " <br/>";
        print "Phone number: " . $row['phone'] . " <br/>";
        print "Address: " . $row['address'] . " <br/>";
        print "Date joined: " . $row['date_joined'] . " <br/></div>";
    }
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

    <br/>
    <br/>
    <?php
    if (isset($_SESSION['email-unverified'])) {
        print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please check your mail to activate your account!</div>';
    }


    displayInformation($_SESSION['email']);
    print "Click <a href='../logout.php'>here</a> to logout.<br/>";
    print "Click <a href='change_password.php'>here</a> to change password.<br/>";

} else {
    header('location: ../login/');
}

?>
</body>