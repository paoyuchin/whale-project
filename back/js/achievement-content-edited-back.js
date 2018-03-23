function $id(id) {
    return document.getElementById(id);
}

function addSpot() {
    // var textareaClsss = $('.textareaClsss').val();
    var btnSend = $id("btnSend"); //送出的按鈕
    var blockTable = $id("block-table"); //表單
    document.getElementById('tellEmpty').style.display = "none"
    var spotDiv = document.getElementsByClassName("spotDiv")[0];
    var newSpot = spotDiv.cloneNode(true);
    newSpot.getElementsByClassName('FinishEditedBtn')[0].onclick = update;
    newSpot.style.display = "";
    blockTable.insertBefore(newSpot, btnSend);
    // console.log(textareaClsss);
    // newSpot.querySelectorAll(".trash")[0].onclick = delSpot;
}

function update(e) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            // alert(xhr.responseText);
            switch (xhr.responseText) {
                case "0":
                    alert("資料編輯成功");
                    break;
                case "1":
                case "2":
                    alert("上傳檔案太大");
                    break;
                case "3":
                    alert("上傳檔案不完整");
                    break;
                case "4":
                    alert("檔案未選");
                    break;
                default:
                    alert("資料編輯成功");
            }
            // window.location.reload();
        } else {
            alert(xhr.status);
        }
    }
    var formData = new FormData(e.target.form);
    xhr.open("Post", "achieveContentUpdated.php", true);
    xhr.send(formData);
}




window.addEventListener("load", function () {
    console.log("aaa");
    $id("btnSpotAdd").onclick = addSpot;
    // $('.FinishEditedBtn').click(update);

    var divs = document.getElementsByClassName('FinishEditedBtn');
    for (i in divs) {
        divs[i].onclick = function (e) {
            var xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    switch (xhr.responseText) {
                        case "0":
                            alert("資料編輯成功");
                            break;
                        case "1":
                        case "2":
                            alert("上傳檔案太大");
                            break;
                        case "3":
                            alert("上傳檔案不完整");
                            break;
                        case "4":
                            alert("檔案未選");
                            break;
                        default:
                            alert("資料編輯成功");
                    }
                    // window.location.reload();
                } else {
                    alert(xhr.status);
                }
            }
            var formData = new FormData(e.target.form);
            xhr.open("Post", "achieveContentUpdated.php", true);
            xhr.send(formData);
        };
    }
}, false);