<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>Green Leb - Register</title>

    <link rel="stylesheet" href="../style/style.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function validateEmail() {
            var e = document.getElementById("email");
            var email = e.value;
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var b = re.test(email)
            var s = document.getElementById("email").style;
            if (!b) {
                s.borderColor = "red";
                document.getElementById("emailerror").style.display = "block";
            }
            if (b) {
                s.borderColor = "green";
                document.getElementById("emailerror").style.display = "none";

            }
        }
        function validateFName() {
            var re = /^[A-Za-z0-9]{3,20}$/;
            var fname = document.getElementById("fName");
            var fName = fname.value;
            var b = re.test(fName)
            var s = document.getElementById("fName").style;
            if (!b) {
                s.borderColor = "red";
                document.getElementById("fnameerror").style.display = "block";
            }
            if (b) {
                s.borderColor = "green";
                document.getElementById("fnameerror").style.display = "none";
            }
        }
        function validateLName() {
            var re = /^[A-Za-z0-9]{3,20}$/;
            var lname = document.getElementById("lName");
            var lName = lname.value;
            var b = re.test(lName)
            var s = document.getElementById("lName").style;
            if (!b) {
                s.borderColor = "red";
                document.getElementById("lnameerror").style.display = "block";
            }
            if (b) {
                s.borderColor = "green";
                document.getElementById("lnameerror").style.display = "none";
            }
        }
        function checkPasswords() {

            var init = document.getElementById("newpassword");
            var sec = document.getElementById("confirmpassword");
            var s1 = document.getElementById("newpassword").style;
            var s = document.getElementById("confirmpassword").style;
            if (init.value == "" || init.value != sec.value) {
                s.borderColor = "red";
                s1.borderColor = "red";
                document.getElementById("passworderror").style.display = "block";
            }
            else {
                s.borderColor = "green";
                s1.borderColor = "green";
                document.getElementById("passworderror").style.display = "none";
            }
        }
        function validatePhoneNumber() {
            var re = /^/;
            var pn = document.getElementById("phonenumber");
            var phonenum = pn.value;
            var b = re.test(phonenum);
            var s = document.getElementById("phonenumber").style;
            if (!b) {
                s.borderColor = "red";
                document.getElementById("phonenumbererror").style.display = "block";
            }
            if (b) {
                s.borderColor = "green";
                document.getElementById("phonenumbererror").style.display = "none";
            }
        }
        function validateAddress() {
            var add = document.getElementById("address");
            var s = document.getElementById("address").style;
            s.borderColor = "green";
        }
    </script>
</head>


<body>
<?php
session_start();

if (isset($_SESSION['email'])) {
    header('location: ../profile/');
} else {
    ?>
    <ul class="nav">
        <li class="logo">Green Lebanon</li>
        <li><a href="../index.php">Lobby</a></li>
        <li><a href="../requests">Requests</a></li>
        <li><a href="../login">Login</a></li>
        <li class="active"><a href="">Register</a></li>
    </ul>


    <br/><br/><br/><br/>
    <form method="post" action="register_handler.php">
        <div class="form-group">
            <h2 class="form-heading">Sign Up</h2>
            <input type="text" placeholder="Enter your First Name" name="fName" id="fName" class="form-control"
                   onchange="validateFName()">
            <label for="fName" class="error" id="fnameerror">Please enter a valid First Name.</label>
            <input type="text" placeholder="Enter your Last Name" name="lName" id="lName" class="form-control"
                   onchange="validateLName()">
            <label for="lName" class="error" id="lnameerror">Please enter a valid Last Name.</label>
            <input type="password" placeholder="Enter your desired password" name="newpassword" id="newpassword"
                   class="form-control">
            <input type="password" placeholder="Confirm your desired password" name="confirmnewpass"
                   id="confirmpassword"
                   class="form-control" onchange="checkPasswords()">
            <label for="confirmpassword" class="error" id="passworderror">Please re-enter the passwords.</label>
            <input type="text" placeholder="Enter your phone number" name="phone" id="phonenumber" class="form-control"
                   onchange="validatePhoneNumber()">
            <label for="phonenumber" class="error" id="phonenumbererror">Please enter a valid Phone Number.</label>
            <input type="address" placeholder="Enter your address" name="address" id="address" class="form-control"
                   onchange="validateAddress()">
            <label for="address" class="error" id="addresserror">Please enter a valid address.</label>
            <input type="text" placeholder="Enter your Email address" name="email" id="email" class="form-control"
                   onchange="validateEmail()">
            <label for="email" class="error" id="emailerror">Please enter a valid email address.</label>
            <br/>
        </div>

        <div style="position:relative; left:90px;top:0px;">
            <button type="submit" class="button-primary">Register</button>
        </div>
    </form>

    <?php
}
?>
</body>
</html>

