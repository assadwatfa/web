<!DOCTYPE html>
<head>
    <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
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
                <li><a href="../education/">Education</a></li>
                <li><a href="../help/">Help</a></li>
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
<form method="post" action="contactus.php">
    <div class="form-group col-xs-4" style="background-color: white; border-radius: 25px; margin-left: 10%">
        <h2 class="form-heading ">Contact Us</h2>
        <input type="text" placeholder="Enter your Subject" name="subject" id="subject" class="form-control">
        <textarea style="max-width: 100%;min-width:100%;height: 100px;" placeholder="Enter your Message" name="message"
                  id="message" class="form-control"></textarea>

        <div style="position:relative; left:90px;top:0px;">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
</form>


</body>
</html>