<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Search</title>

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
                <li><a href="admin_process_requests.php">Proccess Requests</a></li>
                <li><a href="admin_view_processing_requests.php">Requests Proccessing</a></li>
                <li><a href="admin_add_driver.php">Add Driver</a></li>
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
session_start();

include('../config.php');
include('../nodes/index.php');

if (isset($_SESSION['email'])) {
    $email_to_process = $_POST['email_to_process'];
    $driver_to_assign = $_POST['selected_driver'];
    $query = "INSERT INTO project_requests_processing(address, email) SELECT address,email FROM project_requests WHERE email = '$email_to_process'";
    $result = mysqli_query($conn, $query) or die("Connection failed :Cannot  insert email to project_requests_proccesing: " . mysqli_connect_error());
    $query2 = "UPDATE project_requests_processing SET driver_email='$driver_to_assign' WHERE email='$email_to_process'";
    $result2 = mysqli_query($conn, $query2) or die("Connection failed :Cannot  insert drivers email to project_requests_proccesing: " . mysqli_connect_error());
    if ($result && $result2) {
        $query = "DELETE FROM project_requests where email = '$email_to_process'";
        $result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());

        if ($result)
            echo "<h1>Request Successfully Processed</h1>";
        ?>
        </br>
        <form style="float:left;" action="admin_process_requests.php" enctype="multipart/form-data" method="post"
              align="center">
            <button type="submit" class="btn btn-default btn-lg">Return</button>
        </form>
        <?php
    } else
        echo "Something went wrong";
} else {
    header('location: ../login/');
}
?>
</form>
</body>
</html>