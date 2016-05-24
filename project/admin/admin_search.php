<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Search</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>


<body>

<?php
session_start();

include('../config.php');
include('../nodes/index.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    if (getPermissions($email) == 1) {
        ?>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"> <span class="glyphicon glyphicon-user"
                                                   aria-hidden="true"></span> Admin Page</a>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="admin_search.php">Search</a></li>
                        <li><a href="admin_process_requests.php">Process Requests</a></li>
                        <li><a href="admin_view_processing_requests.php">Requests Processing</a></li>
                        <li><a href="admin_add_driver.php">Add Driver</a></li>
                        <li><a href="admin_view_drivers.php">View Drivers</a></li>

                    </ul>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        </li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div style="margin-left:100px;margin-top:100px;">
            <h1>Search for users in the database</h1>

            <form class="form-inline" action="admin_search_proc.php" method="POST">
                <div class="form-group">
                    <label for="emailsearch">Search</label>
                    <input type="text" class="form-control" id="emailsearch" placeholder="Enter User's Email address"
                           size="25"
                           name="searchedemail">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
        </div>
        <?php
    } else {
        print "You do not have permissions to access this page.<br/>";
    }

} else {
    header('location: ../login/');
}

?>


</form>
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