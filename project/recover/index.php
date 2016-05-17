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

    <form method="post" action="recover_process.php">
        <div class="form-group">
            <h2 class="form-heading">Recover page</h2>
            <input type="text" placeholder="Enter your e-mail" name="email" id="email" class="form-control">
            <br/>
        </div>

        <div style="position:relative; left:90px;top:0px;">
            <button type="submit" class="button-primary">Recover</button>
        </div>
    </form>

    <?php
}
?>
</body>
</html>



