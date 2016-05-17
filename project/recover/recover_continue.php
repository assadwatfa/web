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
session_start();

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

    <form method="post" action="recover_handler.php">
        <div class="form-group">
            <h2 class="form-heading">Recover Process page</h2>
            <input type="text" placeholder="Enter your email" name="email" id="email" class="form-control"
                   onchange="validateFName()">
            <input type="text" placeholder="Enter your recovery code" name="recovery_code" id="recovery_code"
                   class="form-control"
                   onchange="validateLName()">
            <input type="password" placeholder="Enter your new password" name="password1" id="password1"
                   class="form-control">
            <input type="password" placeholder="Confirm your new password" name="password2" id="password2"
                   class="form-control">
            <br/>
        </div>

        <div style="position:relative; left:90px;top:0px;">
            <button type="submit" class="button-primary">Save</button>
        </div>
    </form>
    <?php
}
?>

</body>
</html>