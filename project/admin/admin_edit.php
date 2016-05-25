<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Edit</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

    <script type="text/javascript">

        function unreadonly2(id) {
            var x = document.getElementById("newfirstname");
            x.readOnly = false;
            x.focus();
        }
        function unreadonly3() {
            var x = document.getElementById("newlastname");
            x.readOnly = false;
            x.focus();
        }
        function unreadonly4() {
            var x = document.getElementById("newemail");
            x.readOnly = false;
            x.focus();
        }
        function unreadonly5() {
            var x = document.getElementById("newphonenumber");
            x.readOnly = false;
            x.focus();
        }
        function unreadonly6() {
            var x = document.getElementById("newpermissions");
            x.readOnly = false;
            x.focus();
        }
        function unreadonly7(id) {
            var x = document.getElementById("newaddress");
            x.readOnly = false;
            x.focus();
        }
        function readonlyon(id) {
            id.readOnly = true;
        }
    </script>
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


        if (isset($_SESSION['emailtoedit'])) {

            $emailtoedit = $_SESSION['emailtoedit'];

            $sql = "SELECT * FROM project_users WHERE email='$emailtoedit'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $oldfirstname = $row['firstname'];
            $oldlastname = $row['lastname'];
            $oldemail = $row['email'];
            $oldphonenumber = $row['phone'];
            $oldpermissions = $row['permissions'];
            $oldaddress = $row['address'];
            ?>

            <form class="form-horizontal" style="max-width:500px;" action="admin_edit_proc.php" method="post">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="newfirstname">First Name</label>

                    <div class="col-sm-10">
                        <input readOnly=true type="text" class="form-control" name="newfirstname"
                               value="<?php echo $oldfirstname; ?>" id="newfirstname" onblur="readonlyon(this)">
                        <input class="btn btn-primary" type="button" value="Edit First Name" onclick="unreadonly2();"
                               id="fnbutton">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="newlastname">Last Name</label>

                    <div class="col-sm-10">
                        <input readOnly=true type="text" class="form-control" name="newlastname"
                               value="<?php echo $oldlastname; ?>"
                               id="newlastname" onblur="readonlyon(this)">
                        <input class="btn btn-primary" type="button" value="Edit Last Name" onclick="unreadonly3(this);"
                               id="lnbutton">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="newemail">Email address</label>

                    <div class="col-sm-10">
                        <input readOnly=true type="email" class="form-control" name="newemail"
                               value="<?php echo $oldemail; ?>"
                               id="newemail" onblur="readonlyon(this)">
                        <input class="btn btn-primary" type="button" value="Edit Email" onclick="unreadonly4(this);"
                               id="emailbutton">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-2 control-label" for="newphonenumber">Phone Number</label>

                    <div class="col-sm-10">
                        <input readOnly=true type="text" class="form-control" name="newphonenumber"
                               value="<?php echo $oldphonenumber; ?>" id="newphonenumber" onblur="readonlyon(this)">
                        <input class="btn btn-primary" type="button" value="Edit Phone Number"
                               onclick="unreadonly5(this);"
                               id="pbutton">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-2 control-label" for="newphonenumber">Permissions</label>

                    <div class="col-sm-10">
                        <input readOnly=true type="text" class="form-control" name="newpermissions"
                               value="<?php echo $oldpermissions; ?>" id="newpermissions" onblur="readonlyon(this)">
                        <input class="btn btn-primary" type="button" value="Edit Permissions"
                               onclick="unreadonly6(this);"
                               id="permissionsbutton">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-2 control-label" for="newaddress">Address</label>

                    <div class="col-sm-10">
                        <input readOnly=true type="text" class="form-control" name="newaddress"
                               value="<?php echo $oldaddress; ?>"
                               id="newaddress" onblur="readonlyon(this)">
                        <input class="btn btn-primary" type="button" value="Edit Address" onclick="unreadonly7(this);"
                               id="addressbutton">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger btn-lg">Edit Changes</button>
                    </div>
                </div>
            </form>

            <?php
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