<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Delete</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>


<body>

<?php
session_start();
include('../nodes/index.php');
include('../config.php');

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
                        <li><a href="admin_search.php">Search</a></li>
                        <li><a href="admin_process_requests.php">Process Requests</a></li>
                        <li><a href="admin_view_processing_requests.php">Requests Processing</a></li>
                        <li><a href="admin_add_driver.php">Add Driver</a></li>
                        <li><a href="admin_view_drivers.php">View Drivers</a></li>

                    </ul>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Profile</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        print "<h1>Welcome to the admin page " . $_SESSION['firstname'] . "</h1>";

        if (isset($_SESSION['emailtodelete'])) {
            $emailtodelete = $_SESSION['emailtodelete'];
            $sql = "DELETE FROM project_users WHERE email='$emailtodelete'";
            if (mysqli_query($conn, $sql)) {
                ?>
                <div align="center">
                    <div class="alert alert-success" role="alert">Record Deleted Succesfully!</div>
                    <form style="align:center;" action="admin_search.php" enctype="multipart/form-data" method="post"
                          align="center">
                        <button type="submit" class="btn btn-default btn-lg">Return</button>
                    </form>
                </div>
                <?php
                $_SESSION['emailtodelete'] = "";
            } else {
                echo "Error deleting record: " . mysqli_error();
            }
        } else {
            print "No email set.<br/>";
        }

    } else {
        print "You do not have permissions to access this page.<br/>";
    }

} else {
    header('location: ../login/');
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