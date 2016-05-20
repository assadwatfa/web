function validateEmail() {
    var e = document.getElementById("email");
    var email = e.value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var b = re.test(email)
    var s = document.getElementById("email").style;
    if (!b) {
        s.borderColor = "red";
        document.getElementById("emailerror").style.display = "block";
        return false;
    }
    if (b) {
        s.borderColor = "green";
        document.getElementById("emailerror").style.display = "none";
        return true;

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
        return false;
    }
    if (b) {
        s.borderColor = "green";
        document.getElementById("fnameerror").style.display = "none";
        return true;
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
        return false;
    }
    if (b) {
        s.borderColor = "green";
        document.getElementById("lnameerror").style.display = "none";
        return true;
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
        return false;
    }
    else {
        s.borderColor = "green";
        s1.borderColor = "green";
        document.getElementById("passworderror").style.display = "none";
        return true;
    }
}
function validatePhoneNumber() {
    var re = /^(03|70|71|76|81|86)\d{6}$/;
    var pn = document.getElementById("phonenumber");
    var phonenum = pn.value;
    var b = re.test(phonenum);
    var s = document.getElementById("phonenumber").style;
    if (!b) {
        s.borderColor = "red";
        document.getElementById("phonenumbererror").style.display = "block";
        return false;
    }
    if (b) {
        s.borderColor = "green";
        document.getElementById("phonenumbererror").style.display = "none";
        return true;
    }
}
function validateAddress() {
    var add = document.getElementById("address");
    var s = document.getElementById("address").style;
    s.borderColor = "green";
    return true;
}
function validateFunctions() {
    if (validateEmail() && validateFName() && validateLName() && checkPasswords() && validatePhoneNumber() && validateAddress()) {
        document.getElementById("button").disabled = false;
    }
    else
        document.getElementById("button").disabled = true;
}
