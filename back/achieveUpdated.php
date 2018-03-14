<?php
    session_start();
    ob_start();
    $allow_types = array('jpg', 'jpeg', 'png');
    
    try {
        if(isset($_REQUEST["submit"])) {
            require_once("connectback.php");
            $sql = "update achievementContent set title = :title,
                                                  content1 = :content1,
                                                  content2 = :content2,
                                                  content3 = :content3,
                                                  img1 = :img1,
                                                  img2 = :img2,
                                                  img3 = :img3
                                                  where achievementContentNo = :achievementContentNo";
            $editContent = $pdo -> prepare($sql);
            $editContent -> bindValue(":achievementContentNo", $_REQUEST["achievementContentNo"]);        

            $title = $_REQUEST["title"];
            $editContent -> bindValue(":title", $title);    
            $content = array();
            for($i = 1; $i < 4; $i++){
                $editContent -> bindValue(":content" . $i, $_REQUEST["content" . $i]);
                $last_uploaded = $_REQUEST['img' . $i];
                $img = $_FILES["img" . $i];
                $file_ext = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
                error_log($file_ext);
                $msg = $img["name"];
                if(!in_array($file_ext , $allow_types)){
                    $msg .= ' Wrong type.';
                }
                if($img["error"] !== 0){
                    $msg .= ' Failed.';
                }
                if($img["size"] > 1000000){
                    $msg .= ' Too big.';
                }
                if($msg != $img["name"]) {
                    echo 
                    "<script>
                        alert('" . $msg . "');
                        window.location = 'achievement-content-editor-back.php?fileSize-fail';
                    </script>";
                } else{
                    if($img["size"] != 0){ // file not empty
                        error_log($i);
                        error_log($last_uploaded[0]);
                        error_log($last_uploaded[1]);
                        error_log($last_uploaded[2]);
                        $last_uploaded = $i . "." . $file_ext; // should be xxx.jpg
                        $path = "uploads/" . $title;
                        $dest = $path . "/" . $last_uploaded;
                        error_log($last_uploaded);
                        error_log($path);
                        error_log($dest);
                        if(!is_dir($path)){
                            mkdir($path);
                        }
                        //error_log($dest);
                        move_uploaded_file($img["tmp_name"], $dest);   
                    }
                }    
                $editContent -> bindValue(":img" . $i, $last_uploaded);     
            }        
            $editContent -> execute();
            header("location:achievement-back.php");
        }
    } catch (PDOExpection $e) {
        echo "錯誤原因:" , $e->getMessage() , "<br>" ; 
        echo "錯誤訊息:" , $e->getLine() , "<br>" ;
    }
?>