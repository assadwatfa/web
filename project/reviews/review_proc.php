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
if (isset($_POST['rating'])) {
    $rating = strip_tags($_POST['rating']);
}

if (isset($_POST['comment'])) {
    $comment = strip_tags($_POST['comment']);
}

if (isset($_POST['rating']) && isset($_POST['comment'])) {
    if (!empty($comment)) {
        $query = "SELECT * FROM project_reviews  WHERE email='$email'";
        $result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
        if ($result) {
            $numrows = mysqli_num_rows($result);
            if ($numrows > 0) {

                $query2 = "DELETE  From project_reviews  WHERE email='$email'";
                $result2 = mysqli_query($conn, $query2);
                if ($result2) {
                    echo "<h2> Old Review was Deleted</h2>";
                }
            }
        }
        $sql = "INSERT INTO project_reviews (rating,comment,email) VALUES ('$rating','$comment','$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<h2> Review Successfully Submitted</h2> ";
        }
    } else {
        print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Comment cannot be empty!</div>';
    }
} else {
    print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Comment is not set!</div>';
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