function $id(id) {
    return document.getElementById(id);
}

function ajax_post() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "test.php";
    var ContentId = document.getElementById("contentId").value;
    // var ln = document.getElementById("last_name").value;
    var vars = contentId;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("contentId").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}



function addSpot() {
    var btnSend = $id("btnSend"); //送出的按鈕
    var myForm = $id("myForm"); //表單
    document.getElementById('tellEmpty').style.display = "none"
    var spotDiv = document.getElementsByClassName("spotDiv")[0];
    var newSpot = spotDiv.cloneNode(true);

    newSpot.style.display = "";
    myForm.insertBefore(newSpot, btnSend);
    // newSpot.querySelectorAll(".trash")[0].onclick = delSpot;
}
window.addEventListener("load", function () {
    $id("btnSpotAdd").onclick = addSpot;
    // document.querySelectorAll(".trash")[1].onclick = delSpot;
}, false);