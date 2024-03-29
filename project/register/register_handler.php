<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Registration</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>


<body>
<?php
/**
 * User: Hassan J.
 * Date: 5/12/16
 */

include('../config.php');
session_start();

if (isset($_SESSION['email'])) {
    header('location: ../profile/');
} else {
    ?>
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
                    <li><a href="../reviews/">Reviews</a></li>
                    <li><a href="../education/">Education</a></li>
                    <li><a href="../contactus/">Contact Us</a></li>
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


    if (isset($_SESSION['email'])) {
        header('location: ../profile/');
    } else {

        if (!isset($_POST['fName'])) {
            print "First name is missing. <br/>";
        } else {
            $firstname = strip_tags($_POST['fName']);
            if (empty($firstname)) {
                print "First name cannot be empty. <br/>";
            } else {

            }
        }

        if (!isset($_POST['lName'])) {
            print "Last name is missing. <br/>";
        } else {
            $lastname = strip_tags($_POST['lName']);
            if (empty($lastname)) {
                print "Last name cannot be empty. <br/>";
            } else {

            }
        }

        if (!isset($_POST['phone'])) {
            print "Phone number is missing. <br/>";
        } else {
            $phone = strip_tags($_POST['phone']);
            if (empty($phone)) {
                print "Phone number cannot be empty. <br/>";
            } else {

            }
        }

        if (!isset($_POST['address'])) {
            print "Address is missing. <br/>";
        } else {
            $address = strip_tags($_POST['address']);
            if (empty($address)) {
                print "Address cannot be empty. <br/>";
            } else {

            }
        }

        if (!isset($_POST['newpassword'])) {
            print "Password 1 is missing. <br/>";
        } else {
            $password1 = strip_tags($_POST['newpassword']);
            if (empty($password1)) {
                print "First password cannot be empty. <br/>";
            } else {

            }
        }

        if (!isset($_POST['confirmnewpass'])) {
            print "Password 2 is missing. <br/>";
        } else {
            $password2 = strip_tags($_POST['confirmnewpass']);
            if (empty($password2)) {
                print "Second password cannot be empty. <br/>";
            } else {

            }
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

        if (isset($_POST['newpassword']) && isset($_POST['confirmnewpass'])) {
            if ($password1 != $password2) {
                print "Passwords do not match. <br/>";
            }
        }

        if (isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['email']) && isset($_POST['newpassword']) && isset($_POST['confirmnewpass']) && isset($_POST['phone']) && isset($_POST['address'])) {
            if (!empty($firstname) && !empty($lastname) && !empty($password1) && !empty($password2) && !empty($email) && !empty($phone) && !empty($address)) {
                if ($password1 == $password2) {
                    $verification_code = md5(uniqid(rand()));
                    $encryptedPassword = md5($password1);
                    $sql1 = "SELECT * FROM project_unverified_users WHERE email= '$email'";

                    $result1 = mysqli_query($conn, $sql1);
                    $rowcount1 = mysqli_num_rows($result1);

                    $sql2 = "SELECT * FROM project_users WHERE email= '$email'";

                    $result2 = mysqli_query($conn, $sql2);
                    $rowcount2 = mysqli_num_rows($result2);
                    if ($rowcount1 > 0 || $rowcount2 > 0) {
                        print "Username or email is taken. <br/>";
                    } else {
                        $sql = "INSERT INTO project_unverified_users (verification_code, firstname, lastname, email, password, phone, permissions, address) VALUES ('$verification_code', '$firstname', '$lastname', '$email', '$encryptedPassword', '$phone', '3', '$address')";
                        mysqli_query($conn, $sql);

                        $message = "Welcome to Green Leb " . $firstname . "\r\n";
                        $message .= "Go to " . $root . "/register/verify.php?verification_code=$verification_code&email=$email to activate your account. \r\n";
                        mail($email, 'Green Leb - Account Activation', $message);

                        print "Successfully registered <br/>";
                        print "Please check your e-mail for activation link.<br/>";
                        print "Click <a href='../login'>here</a> to log in.";
                    }
                }
            } else {
                print "Fields cannot be empty. <br/>";
            }
        }
    }
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


