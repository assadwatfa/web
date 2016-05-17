<html>
<head>
    <meta>
    <title>Search Results</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            background: url('../media/bg.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>
<body>
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
session_start();
include('../nodes/index.php');
include('../config.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    if (getPermissions($email) == 1) {
        if ($_SESSION['emailtoedit']) {
            $emailtoedit = $_SESSION['emailtoedit'];
            $_SESSION['emailtoedit'] = "";
            if (isset($_POST['newid'])) {
                $newid = $_POST['newid'];
            } else {
                print "New id missing!<br/>";
            }

            if (isset($_POST['newfirstname'])) {
                $newfirstname = $_POST['newfirstname'];
            } else {
                print "New first name missing!<br/>";
            }

            if (isset($_POST['newlastname'])) {
                $newlastname = $_POST['newlastname'];
            } else {
                print "New last name missing!<br/>";
            }

            if (isset($_POST['newemail'])) {
                $newemail = $_POST['newemail'];
            } else {
                print "New email missing!<br/>";
            }

            if (isset($_POST['newphonenumber'])) {
                $newphonenumber = $_POST['newphonenumber'];
            } else {
                print "New phone number missing!<br/>";
            }

            if (isset($_POST['newpermissions'])) {
                $newpermissions = $_POST['newpermissions'];
            } else {
                print "New permissions missing!<br/>";
            }

            if (isset($_POST['newaddress'])) {
                $newaddress = $_POST['newaddress'];
            } else {
                print "New address missing!<br/>";
            }

            if (isset($_POST['newid']) && isset($_POST['newfirstname']) && isset($_POST['newlastname']) && isset($_POST['newemail']) && isset($_POST['newphonenumber']) && isset($_POST['newpermissions']) && isset($_POST['newaddress'])) {
                $sql = "UPDATE project_users SET id='$newid',firstname='$newfirstname',lastname='$newlastname',email='$newemail',phone='$newphonenumber',permissions='$newpermissions',address='$newaddress' WHERE email='$emailtoedit'";

                if (mysqli_query($conn, $sql)) {
                    echo "<h1>Record updated successfully</h1>";
                    ?>
                    </br>
                    <form style="float:left;" action="admin_search.php" enctype="multipart/form-data" method="post"
                          align="center">
                        <button type="submit" class="btn btn-default btn-lg">Return</button>
                    </form>
                    <?php
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                print "Something went wrong.<br/>";
            }
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