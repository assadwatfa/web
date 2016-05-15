<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Search</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>


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
                        </li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        print "<h1>Welcome to the admin page " . $_SESSION['firstname'] . "</h1>";
        ?>
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
</body>
</html>