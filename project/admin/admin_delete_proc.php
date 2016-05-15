<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Search</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>


    <style>
        body {
            background: url('../media/bg.png') no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

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
                        <li><a href="admin.php">Verify Requests</a></li>

                    </ul>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Logout</a></li>
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
</body>
</html>