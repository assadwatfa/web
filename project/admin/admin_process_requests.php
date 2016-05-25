<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Process Requests</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

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
                <li class="active"><a href="admin_process_requests.php">Process Requests</a></li>
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
session_start();
include('../config.php');
include('../nodes/index.php');
$query = "SELECT * FROM project_requests ";
$result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
if ($result) {

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {

        print "<table class=\"table \" style='background-color: #f9f9f9'><tr>
			
			<th>Address</th>
			<th>User's Email</th>
			<th>Date Requested</th>
			<th>Drivers</th>
			<th>process</th>
			</tr><tbody>";

        for ($row_num = 1; $row_num <= $num_rows; $row_num++) {
            $query2 = "SELECT * FROM project_users WHERE permissions='2'";
            $drivers = mysqli_query($conn, $query2) or die("Connection failed: " . mysqli_connect_error());
            $num_drivers = mysqli_num_rows($drivers);
            $row = mysqli_fetch_assoc($result);
            print "<tr>";
            print "</td><td>" . $row["address"];
            print "</td><td>" . $row["email"];
            print "</td><td>" . $row["date_added"];
            ?>
            </td>
            <td>
                <form action="admin_process_requests_proc.php" method="POST">
                    <select name="selected_driver">
                        <?php

                        for ($row_num2 = 1; $row_num2 <= $num_drivers; $row_num2++) {
                            $row_drivers = mysqli_fetch_assoc($drivers);
                            echo "<option value=" . $row_drivers['email'] . ">" . $row_drivers['email'] . "(" . getTasksAtm($row_drivers['email']) . ")</option>";
                        }
                        echo "</select>";
                        ?>


            </td>
            <td>
                <input type="hidden" name="email_to_process" value="<?php echo $row['email'] ?>"/>
                <button type="submit" class="btn btn-default">Process</button>
                </form>
            </td></tr>
            <?php
        }
        print "</tbody>";
        print "</table>";
    } else
        echo "<h2>No requests to process</h2>";
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