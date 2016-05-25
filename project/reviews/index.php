<!DOCTYPE html>
<html>
<head>
    <title>Green Leb - Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
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
                <li><a href="../reviews/">Reviews</a></li>
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
                    <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Profile</a>
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

?>

<?php
$query = "SELECT * FROM project_reviews ORDER BY date_reviewed DESC LIMIT 20";
$result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
if ($result) {

    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {

        print "<table class=\"table table-bordered \"style='background-color: inherit;min-width: 50%;max-width: 50%;margin-left:50px; '>";
        for ($row_num = 1; $row_num <= $num_rows; $row_num++) {
            $row = mysqli_fetch_assoc($result);
            echo "<tr> <td ><div style='background-color: gainsboro'>Rating: " . $row['rating'] . "/5</br>
        From:" . $row['email'] . "
        </br>
        On:" . $row['date_reviewed'] . "</div>";
            echo "<div style='background-color: white'>" . $row['comment'] . "</div></td></tr>";

        }
        echo "</table>";

    }
}

?>

<div class="navbar navbar-fixed-bottom">
    <div id="footer-data" style="text-align:center">
        <a href="https://github.com/BAUCSTeam" target="_blank"><i class="fa fa-github fa-3x" aria-hidden="true"></i></a>
        <a href="https://facebook.com/BAUCSTeam" target="_blank"><i class="fa fa-facebook-square fa-3x"
                                                                    aria-hidden="true"></i></a>
        <a href="https://instagram.com/BAUCSTeam" target="_blank"><i class="fa fa-instagram fa-3x"
                                                                     aria-hidden="true"></i></a>
        <a href="https://twitter.com/BAUCSTeam" target="_blank"><i class="fa fa-twitter-square fa-3x"
                                                                   aria-hidden="true"></i></a>
    </div>
</div>

</body>
</html>