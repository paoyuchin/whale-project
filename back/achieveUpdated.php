<?php
    session_start();
    ob_start();
    try {
        if(isset($_REQUEST["submit"])) {
            $achievementContentNo = $_REQUEST["achievementContentNo"];
            $title = $_REQUEST["title"];
            $content = $_REQUEST["content"];
            $file = $_FILES["file"];
            // print_r($file);
            //file要驗證的東西
            $file_name = $file["name"];
            $file_type = $_FILES["file"]["type"];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_ext = strtolower($file_ext);
            //. 用.拆開
            $allow_types = array('jpg','jpeg','png','pdf');
            $last_uploaded = $_REQUEST['file']; // uuid or ''
            if(in_array($file_ext , $allow_types )){
                if($file["error"] === 0 && $file["size"] != 0){
                    if($file["size"] < 1000000){
                        $last_uploaded = uniqid() . "." . $file_ext; // should be xxx.jpg
                        $dest = "uploads/" . $last_uploaded;
                        move_uploaded_file($file["tmp_name"], $dest);
                    }
                    else{
                        echo 
                        "<script>
                            alert('Too big.');
                            window.loction = 'achievement-content-editor.php?fileSize-fail';
                        </script>"; 
                    }
                }
                else{
                    echo 
                    "<script>
                        alert('Failed.');
                        window.loction = 'achievement-content-editor.php?fileError-fail';
                    </script>";
                }
            }
            else {
                echo 
                "<script>
                    alert('Wrong type.');
                    window.loction = 'achievement-content-editor.php?fileError-fail';
                </script>";
            }
            require_once("connectback.php");
            $sql = "update achievementContent set title = :title,
                                                  content = :content,
                                                  filename = :filename
                                                  where achievementContentNo = :achievementContentNo";
            $editContent = $pdo -> prepare($sql);
            $editContent -> bindValue(":achievementContentNo", $_REQUEST["achievementContentNo"]);        
            $editContent -> bindValue(":title", $title);    
            $editContent -> bindValue(":content", $content);
            $editContent -> bindValue(":filename", $last_uploaded);
            $editContent -> execute();
            header("location:achievement-back.php");
        }
    } catch (PDOExpection $e) {
        echo "錯誤原因:" , $e->getMessage() , "<br>" ; 
        echo "錯誤訊息:" , $e->getLine() , "<br>" ;
    }
?>