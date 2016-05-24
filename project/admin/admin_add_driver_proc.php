<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Add Driver Processing</title>

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
                        <li><a href="admin_search.php">Search</a></li>
                        <li><a href="admin_process_requests.php">Process Requests</a></li>
                        <li><a href="admin_view_processing_requests.php">Requests Processing</a></li>
                        <li class="active"><a href="admin_add_driver.php">Add Driver</a></li>
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
        <?php
        if (!isset($_POST['firstname'])) {
            print "First name is missing. <br/>";
        } else {
            $firstname = strip_tags($_POST['firstname']);
        }

        if (!isset($_POST['lastname'])) {
            print "Last name is missing. <br/>";
        } else {
            $lastname = strip_tags($_POST['lastname']);
        }

        if (!isset($_POST['phone'])) {
            print "Phone number is missing. <br/>";
        } else {
            $phone = strip_tags($_POST['phone']);
        }

        if (!isset($_POST['address'])) {
            print "Address is missing. <br/>";
        } else {
            $address = strip_tags($_POST['address']);
        }

        if (!isset($_POST['password1'])) {
            print "Password 1 is missing. <br/>";
        } else {
            $password1 = strip_tags($_POST['password1']);
        }

        if (!isset($_POST['password2'])) {
            print "Password 2 is missing. <br/>";
        } else {
            $password2 = strip_tags($_POST['password2']);
        }

        if (!isset($_POST['email'])) {
            print "E-mail is missing. <br/>";
        } else {
            $email = strip_tags($_POST['email']);
            if (empty($email)) {
                print "E-mail cannot be empty. <br/>";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                print "Invalid email format. <br/>";
            } else {
            }
        }

        if (isset($_POST['password1']) && isset($_POST['password2'])) {
            if ($password1 != $password2) {
                print "Passwords do not match. <br/>";
            }
        }

        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['phone']) && isset($_POST['address'])) {
            if ($password1 == $password2) {
                $password = md5($password1);
                $sql_insert = "INSERT INTO project_users (firstname, lastname, email, password, phone, permissions, address)
              VALUES ('$firstname', '$lastname', '$email', '$password', '$phone', '2', '$address')";
                if (mysqli_query($conn, $sql_insert)) {
                    print "Driver successfully Added.<br/>";

                } else {
                    print "Something went wrong with adding the driver. <br/>";
                }
            } else {
                print "Something went wrong with inserting data. <br/>";
            }
        }


        ?>


        <?php
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