<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Profile</title>

    <link rel="stylesheet" href="../style/style.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: ../login/');
} else {
    ?>
    <ul class="nav">
        <li class="logo">Green Lebanon</li>
        <li><a href="../index.php">Lobby</a></li>
        <li><a href="../requests">Requests</a></li>
        <li style="float:right" class="active"><a href="../profile/">Profile</a></li>
    </ul>
    <br/><br/>
    <?php
    if (isset($_SESSION['email-unverified'])) {
        print '<div class="alert-danger"><strong>Warning!</strong> - Please check your mail to activate your account!</div>';
    }
    ?>

    <form method="post" action="change_password_handler.php">
        <div class="form-group">
            <h2 class="form-heading">Change password</h2>
            <input type="password" placeholder="Enter your current password" name="currentpassword" id="currentpassword"
                   class="form-control">


            <input type="password" placeholder="Enter your new password" name="password1"
                   class="form-control">

            <input type="password" placeholder="Confirm your new password" name="password2"
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