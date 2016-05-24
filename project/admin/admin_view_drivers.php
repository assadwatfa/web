<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>View Drivers</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

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
                <li><a href="admin_add_driver.php">Add Driver</a></li>
                <li class="active"><a href="admin_view_drivers.php">View Drivers</a></li>

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
include('../config.php');
include('../nodes/index.php');
$query = "SELECT * FROM project_users WHERE permissions='2'";
$result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
if ($result) {

    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        print "<table class=\"table table-striped\"><tr>
			

			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Address</th>
			<th>Tasks Atm</th>
			<th>Date Joined</th>
			</tr>";
        for ($row_num = 1; $row_num <= $num_rows; $row_num++) {
            $row = mysqli_fetch_assoc($result);
            print "<tbody><tr>";
            print "</td><td>" . $row["firstname"];
            print "</td><td>" . $row["lastname"];
            print "</td><td>" . $row["email"];
            print "</td><td>" . $row["phone"];
            print "</td><td>" . $row["address"];
            print "</td><td>" . getTasksAtm($row["email"]);
            print "</td><td>" . $row["date_joined"];
            print "</td></tr>";
        }
        print "</tbody>";
        print "</table>";
    }
}
?>
</form>
</body>
</html>