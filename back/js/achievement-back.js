function changeStatus(activityNo, checkVal) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText == "error") {
                    alert("修改失敗");
                } else {
                    alert("修改成功");
                    window.location.reload();
                }
            } else {
                alert(xhr.status);
            }
        }
    }

    var url = "changeActivityStatus.php?activityNo=" + activityNo + "&checkVal=" + checkVal;
    xhr.open("Get", url, true);
    xhr.send(null);

    //設定好所要連結的程式 
    // var url = "execution/workReview.php"; 
    // xhr.open("Post", url, true); 
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 

    // //送出資料 
    // var data_info = "workNo=" + workNo; 
    // xhr.send(data_info) 
}

$(document).ready(function () {
    $('.radioBtn').click(function () {
        var activityNo = $(this).parents('.tdbtn').attr("data-activityNo");
        var checkVal = $('input[name=status' + activityNo + ']:checked').val();
        // alert(checkVal);
        // if (confirm("確定修改？")) {
        changeStatus(activityNo, checkVal);
        // }
    }); //end
});