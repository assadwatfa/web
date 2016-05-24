<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Login</title>
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

if (isset($_SESSION['email'])) {
    header('location: ../profile/');
} else {
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
                    <li><a href="../contactus/">Contact Us</a></li>
                </ul>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../register/">Register</a></li>
                    <li><a href="../login/">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <br/><br/><br/><br/>
    <form method="post" action="login_handler.php">
        <div class="form-group col-xs-3"
             style="background-color: white; border-radius: 25px; text-align:center; margin-left: 20%">
            <h2 class="form-heading">Login page</h2>
            <input type="text" placeholder="Enter your e-mail" name="email" id="email" class="form-control">


            <input type="password" placeholder="Enter your password" name="password"
                   class="form-control">
            <br/>
            <button type="submit" class="button-primary">Login</button>

        </div>
    </form>
    <?php
}

?>

</body>
</html>





