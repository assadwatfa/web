<!DOCTYPE html>
<html>
<head>
    <title>Green Leb - Home</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
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
                <li><a href="./index.php">Home</a></li>
                <li><a href="./requests/">Requests</a></li>
                <li><a href="./reviews/">Reviews</a></li>
                <li><a href="./education/">Education</a></li>
                <li><a href="./contactus/">Contact Us</a></li>
            </ul>

        </div>
        <?php
        /**
         * User: Hassan J.
         * Date: 5/8/16
         */

        session_start();
        include('./config.php');
        include('./nodes/index.php');

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            ?>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Profile</a>
                    </li>
                    <?php
                    if (getPermissions($email) == 1) {
                        print '<li><a href="./driver/">Driver</a></li>';
                        print '<li><a href="./admin/">Admin</a></li>';
                    } else if (getPermissions($email) == 2) {
                        print '<li><a href="./driver/">Driver</a></li>';
                    }
                    ?>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
            <?php
        } else {
            ?>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./register/">Register</a></li>
                    <li><a href="./login/">Login</a></li>
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

<div class="jumbotron" style="margin-left: 20px">
    <?php
    if (isset($_SESSION['email'])) {
        print "<h1>Hello " . $_SESSION['firstname'] . "!</h1>";
    } else {
        print "<h1>Hello there!</h1>";
    }
    ?>
    <p>Help us keep our community clean & safe for a better future!</p>

    <p><a class="btn btn-primary btn-lg" href="#about-us" role="button">Discover</a></p>
</div>


<div id="about-us" class="jumbotron" style="margin-left: 20px">
    <h1>About Us</h1>
    <ol>
        <li>
            <p>What is <strong>Green Leb</strong> project?</p>

            <p>Green Leb is an environmental project, aiming to keep our country clean and healthy</p>
        </li>

        <li>
            <p>How can I contribute into this project?</p>

            <p>Helping & contributing into this project, is easy, just by registering on our website,<br/>
                you will be able to request cleaning your street/or even picking up the garbage!</p>
        </li>

        <li>
            <p>Benefits:</p>

            <p>
            <ol>
                <li>Keep your area clean.</li>
                <li>Track your request process.</li>
                <li>Check out your previous requests.</li>
                <li>Leave reviews so we can improve our project :-)</li>
            </ol>
            </p>
        </li>

        <li>
            <p>Contact Us:</p>

            <p>
                You can contact us by clicking <a href="contactus" target="_blank"
                                                  style="color:black; text-decoration: underline">here</a> and we will
                contact you as
                soon as possible.
            </p>
        </li>

        <li>
            <p>Source code:</p>

            <p>The code is open source on <a href="https://github.com/BAUCSTeam" target="_blank"
                                             style="color:black; text-decoration: underline"><i
                        class="fa fa-github fa-1x" aria-hidden="true"></i> github.com</a>,
                allowing you to check it, edit or even suggest new features<br/>
                and helping us improve the code in case errors or bugs are encountered.</p>
        </li>

        <li>
            <p>Developers & Designers</p>

            <p>The project was inspired by a group of Computer Science students at <strong>BAU University</strong>.<br/>The
                group is
                formed of 4 people: Hassan J. - Assad W. - Hassan A. - Mohammad I.
            </p>
        </li>
    </ol>

    <p></p>
</div>

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