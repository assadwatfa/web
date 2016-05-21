<!DOCTYPE html>
<head>
    <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="verification.js"></script>
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>

</head>


<body>
<?php
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
    <form method="post" action="register_handler.php">
        <div class="form-group col-xs-4" style="background-color: white; border-radius: 25px; margin-left: 10%">
            <h2 class="form-heading ">Sign Up</h2>
            <input type="text" placeholder="Enter your First Name" name="fName" id="fName" class="form-control"
                   onchange="validateFName();validateFunctions();">
            <label style="display: none" for="fName" class="error" id="fnameerror">Please enter a valid First
                Name.</label>
            <input type="text" placeholder="Enter your Last Name" name="lName" id="lName" class="form-control"
                   onchange="validateLName();validateFunctions();">
            <label style="display: none" for="lName" class="error" id="lnameerror">Please enter a valid Last
                Name.</label>
            <input type="password" placeholder="Enter your desired password" name="newpassword" id="newpassword"
                   class="form-control">
            <input type="password" placeholder="Confirm your desired password" name="confirmnewpass"
                   id="confirmpassword"
                   class="form-control" onchange="checkPasswords();validateFunctions();">
            <label style="display: none" for="confirmpassword" class="error" id="passworderror">Please re-enter the
                passwords.</label>
            <input type="text" placeholder="Enter your phone number" name="phone" id="phonenumber" class="form-control"
                   onchange="validatePhoneNumber();validateFunctions();">
            <label style="display: none" for="phonenumber" class="error" id="phonenumbererror">Please enter a valid
                Phone Number(XXxxxxxx).</label>
            <input type="address" placeholder="Enter your address" name="address" id="address"
                   class="form-control"
                   onchange="validateAddress();validateFunctions();">
            <label style="display: none" for="address" class="error" id="addresserror">Please enter a valid
                address.</label>
            <input type="text" placeholder="Enter your Email address" name="email" id="email" class="form-control"
                   onchange="validateEmail();validateFunctions();">
            <label style="display: none" for="email" class="error" id="emailerror">Please enter a valid email
                address.</label>
            <br/>

            <div style="position:relative; left:90px;top:0px;">
                <button type="submit" class="btn btn-primary" disabled id="button">Register</button>
            </div>
        </div>
    </form>

    <?php
}
?>
</body>
</html>

