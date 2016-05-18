<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Profile</title>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
        print "Date joined: " . $row['date_joined'] . " <br/>";
    }
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array())
{
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

if (isset($_SESSION['email'])) {
    ?>

    <ul class="nav">
        <li class="logo">Green Lebanon</li>
        <li><a href="../index.php">Lobby</a></li>
        <li><a href="../requests">Requests</a></li>
        <li style="float:right" class="active"><a href="../profile/">Profile</a></li>
        <?php
        if (getPermissions($_SESSION['email']) == 1) {
            ?>
            <li style="float:right"><a href="../admin/">Admin</a></li>
            <?php
        }
        ?>
    </ul>

    <br/>
    <br/>
    <?php
    if (isset($_SESSION['email-unverified'])) {
        print '<div class="alert-danger"><strong>Warning!</strong> - Please check your mail to activate your account!</div>';
    }

    displayInformation($_SESSION['email']);
    print "Click <a href='../logout.php'>here</a> to logout.<br/>";
    print "Click <a href='change_password.php'>here</a> to change password.<br/>";

} else {
    header('location: ../login/');
}

?>
</body>