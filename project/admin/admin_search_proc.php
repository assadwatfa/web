<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Search Results</title>
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
                        <li><a href="../profile/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Profile</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php

        if (isset($_POST['searchedemail'])) {
            $email = $_POST['searchedemail'];

            if (!empty($email)) {
                $query = "SELECT * FROM project_users WHERE email='$email'";
                $result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
                if ($result) {

                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows > 0) {
                        $_SESSION['emailtodelete'] = $email;
                        $_SESSION['emailtoedit'] = $email;
                        print "<table class=\"table table-striped\"><tr>
			

			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Phone Number</th>
			<th>Permissions</th>
			<th>Address</th>
			<th>Date Joined</th>
			</tr>";
                        for ($row_num = 1; $row_num <= $num_rows; $row_num++) {
                            $row = mysqli_fetch_assoc($result);
                            print "<tbody><tr>";


                            print "</td><td>" . $row["firstname"];
                            print "</td><td>" . $row["lastname"];
                            print "</td><td>" . $row["email"];
                            print "</td><td>" . $row["password"];
                            print "</td><td>" . $row["phone"];
                            print "</td><td>" . $row["permissions"];
                            print "</td><td>" . $row["address"];
                            print "</td><td>" . $row["date_joined"];
                            print "</td></tr>";
                        }
                        print "</tbody>";
                        print "</table>";
                        ?>
                        <div class="container">
                        <div align="center">
                            <form style="float:left;" action="admin_edit.php" method="">
                                <button type="submit" class="btn btn-default btn-lg">Edit</button>
                            </form>
                            <form style="float:left;" action="admin_delete_proc.php" method="">
                                <button type="submit" class="btn btn-danger btn-lg" id="deletebtn" onclick="check();">
                                    Delete
                                </button>
                            </form>
                            <form style="float:left;" action="admin_search.php" enctype="multipart/form-data"
                                  method="post"
                                  align="center">
                                <button type="submit" class="btn btn-default btn-lg">Return</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="container">
                            <div align="center">
                                <form style="align:center;" action="admin_search.php" enctype="multipart/form-data"
                                      method="post"
                                      align="center">
                                    <div class="alert alert-danger" role="alert">No match found</div>
                                    <button type="submit" class="btn btn-default btn-lg">Return</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        <?php
                    }
                }
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