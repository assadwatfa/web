/**
 * Created by Hassan on 5/20/2016.
 */

function ajax(url, callback) {
    if (window.XMLHttpRequest) {
        var xhr = new XMLHttpRequest();
    }
    else {
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            callback(response);
        }
    }
    xhr.open("GET", url, true);
    xhr.send(null);
}

function getData() {
    if (window.XMLHttpRequest) {
        var xhr = new XMLHttpRequest();
    } else {
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var data = document.getElementById("requests-data");
            data.innerHTML = response;
        }
    }
    xhr.open("GET", "fetchdata.php?data=all", true);
    xhr.send(null);
}


function hideData() {
    var data = document.getElementById("requests-data");
    data.innerHTML = "";
}