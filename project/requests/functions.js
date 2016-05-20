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
    }
    else {
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            var table = document.getElementById("myTable");
            for (var i = 0; i < response.length; i++) {

                var row = table.insertRow(1);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);

                cell1.innerHTML = response[i].address;
                cell2.innerHTML = response[i].email;
                cell3.innerHTML = response[i].driver_email;
                cell4.innerHTML = response[i].date_processing;
            }
        }
    }
    xhr.open("GET", "fetchdata.php?data=all", true);
    xhr.send(null);
}