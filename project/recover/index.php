<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Recover</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <style>
        a i {
            color: black
        }
    </style>
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
                    <li><a href="../reviews/">Reviews</a></li>
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

    <form method="post" action="recover_process.php">
        <div class="form-group col-xs-4">
            <h2 class="form-heading">Recover page</h2>
            <input type="text" placeholder="Enter your e-mail" name="email" id="email" class="form-control">
            <br/>
            <button type="submit" class="btn btn-primary">Recover</button>
        </div>
    </form>

    <?php
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



