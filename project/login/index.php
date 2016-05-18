<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Login</title>

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

if (isset($_SESSION['email'])) {
    header('location: ../profile/');
} else {
    ?>
    <ul class="nav">
        <li class="logo">Green Lebanon</li>
        <li><a href="../index.php">Lobby</a></li>
        <li><a href="../requests">Requests</a></li>
        <li class="active"><a href="">Login</a></li>
        <li><a href="../register">Register</a></li>
        <!--        <li style="float:right"><a href="profile.php">Profile</a></li>-->
        <!--        <li style="float:right"><a href="settings.php">Settings</a></li>-->

    </ul>


    <br/><br/><br/><br/>
    <form method="post" action="login_handler.php">
        <div class="form-group">
            <h2 class="form-heading">Login page</h2>
            <input type="text" placeholder="Enter your e-mail" name="email" id="email" class="form-control">


            <input type="password" placeholder="Enter your password" name="password"
                   class="form-control">
            <br/>
        </div>

        <div style="position:relative; left:90px;top:0px;">
            <button type="submit" class="button-primary">Login</button>
        </div>
    </form>
    <?php
}

?>

</body>
</html>





