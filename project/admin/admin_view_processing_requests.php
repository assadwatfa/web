<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Search</title>

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
include('../config.php');

$query = "SELECT * FROM project_requests_processing ";
$result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
if ($result) {

    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {

        print "<table class=\"table table-striped\"><tr>
			<th>ID</th>
			<th>Driver's Email</th>
			<th>Address</th>
			<th>User's Email</th>
			<th>Date Processed</th>
			
			</tr>";
        for ($row_num = 1; $row_num <= $num_rows; $row_num++) {
            $row = mysqli_fetch_assoc($result);
            print "<tbody><tr>";
            print "</td><td>" . $row["id"];
            print "</td><td>" . $row["driver_email"];
            print "</td><td>" . $row["address"];
            print "</td><td>" . $row["email"];
            print "</td><td>" . $row["date_processing"];
            print "</td></tr>";

        }
        print "</tbody>";
        print "</table>";
    } else
        echo "<h2>No requests processing</h2>";
}
?>
</form>
</body>
</html>