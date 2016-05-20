<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Your Tasks</title>

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

include('../config.php');
include('../nodes/index.php');

if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
if (getPermissions($email) == 1 || getPermissions($email) == 2) {
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
                                           aria-hidden="true"></span> Driver Page</a>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="driver_tasks.php">Tasks</a></li>
                <li><a href="driver_tasks_done.php">Tasks Accomplished</a></li>
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
$sql = "SELECT * FROM project_requests_processing WHERE driver_email= '$email'";
$result = mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_connect_error());
if ($result)
{
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0)
{

print "<table class=\"table table-striped\"><tr>
			<th>Address</th>
			<th>User's Email</th>
			<th>Date Proccessed</th>
			<th>Press when Done</th>
			</tr>";
for ($row_num = 1;
$row_num <= $num_rows;
$row_num++)
{
$row = mysqli_fetch_assoc($result);
print "<tbody><tr>";
print "</td><td>" . $row["address"];
print "</td><td>" . $row["email"];
print "</td><td>" . $row["date_processing"];
print "</td><td>";
?>
<form action="driver_tasks_proc.php" method="POST">
    <input type="hidden" name="email_to_process_done" value="<?php echo $row['email'] ?>"/>
    <button style="background-color: lawngreen" type="submit" class="btn btn-default">Press When Done</button>
</form>
<?php

}
print "</tbody>";
print "</table>";
}
else
    echo "<h2>No tasks for you</h2>";
}


} else {
    print "You do not have permissions to access this page.<br/>";
}

} else {
    header('location: ../login/');
}
?>