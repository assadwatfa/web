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
if (isset($_SESSION['email'])) {
$email_to_process=$_POST['email_to_process'];
    $driver_to_assign=$_POST['selected_driver'];
$query = "INSERT INTO project_requests_processing(email) select email from project_requests where email = '$email_to_process'";
$result = mysqli_query($conn,$query) or die("Connection failed :Cannot  insert email to project_requests_processing: " . mysqli_connect_error());
    $query2 = "UPDATE project_requests_processing SET driver_email='$driver_to_assign' WHERE email='$email_to_process'";
    $result2 = mysqli_query($conn,$query2) or die("Connection failed :Cannot  insert drivers email to project_requests_processing: " . mysqli_connect_error());
    if($result && $result2)
{
	$query = "DELETE FROM project_requests where email = '$email_to_process'";
   $result = mysqli_query($conn,$query) or die("Connection failed: " . mysqli_connect_error());
   if($result)
	echo"<h1>Request Successfully Processed</h1>";
?>
	</br>
	<form style="float:left;"action="admin_process_requests.php" enctype="multipart/form-data" method="post" align="center">
     <button type="submit" class="btn btn-default btn-lg">Return</button>
   </form>
   <?php
 }

else
	echo"Something went wrong";
}
else {
    header('location: ../login/');
}
?>
</form>
</body>
</html>