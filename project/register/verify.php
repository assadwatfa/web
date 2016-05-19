<!DOCTYPE html>
<html>
<head>
    <meta>
    <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>


<body>
<?php
//session_start();
//
//if (isset($_SESSION['email'])) {
//    header('location: ../profile/');
//} else {
//    ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"> <span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
                Green Leb</a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../requests/">Requests</a></li>
                <li><a href="../education/">Education</a></li>
                <li><a href="../help/">Help</a></li>
            </ul>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../register/">Register</a></li>
                <li><a href="../login/">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<br/><br/><br/><br/>

<?php
/**
 * User: Hassan J.
 * Date: 5/12/16
 */

include('../config.php');

if (isset($_GET['verification_code']) && isset($_GET['email'])) {
    $email = strip_tags($_GET['email']);
    $code = strip_tags($_GET['verification_code']);

    $sql_check = "SELECT * FROM project_unverified_users WHERE verification_code= '$code' AND email = '$email'";

    $result1 = mysqli_query($conn, $sql_check);
    $rowcount1 = mysqli_num_rows($result1);

    if ($rowcount1 > 0) {
        $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
        $address = $row['address'];
        $date_joined = $row['date_joined'];

        $sql_insert = "INSERT INTO project_users (firstname, lastname, email, password, phone, permissions, address, date_joined)
              VALUES ('$firstname', '$lastname', '$email', '$password', '$phone', '3', '$address', '$date_joined')";

        if (mysqli_query($conn, $sql_insert)) {
            $sql_delete = "DELETE FROM project_unverified_users WHERE verification_code= '$code'";
            if (mysqli_query($conn, $sql_delete)) {
                if (isset($_SESSION['email'])) {
                    session_destroy();
                }
                print '<div class="alert alert-success" role="alert" style="text-align: center">Account successfully activated.<br/>
                       Click <a href="../login">here</a> to log in.
                    </div>';
            } else {
                print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Something went wrong with deleting data.</div>';
            }
        } else {
            print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Something went wrong with inserting data.</div>';
        }

    } else {
        print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verification code was not found in database!</div>';
    }
} else {
    print '<div class="alert alert-danger" role="alert" style="text-align: center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please enter a valid verification code & email!</div>';
}
//}

?>

</body>
</html>


