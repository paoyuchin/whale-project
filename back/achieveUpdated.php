<?php
    session_start();
    ob_start();

    try {
        if(isset($_REQUEST["submit"])) {
            // echo $_REQUEST["achieveContent"];
            // echo $_REQUEST["achievementContentNo"];
            // echo $_REQUEST["title"];
            require_once("connectback.php");
            $sql = "update achievementContent set content = :content,
                                                  title = :title
                                              where achievementContentNo = :achievementContentNo";
            $editContent = $pdo -> prepare($sql);
            $editContent -> bindValue(":achievementContentNo", $_REQUEST["achievementContentNo"]);        
            $editContent -> bindValue(":title", $_REQUEST["title"]);    
            $editContent -> bindValue(":content", $_REQUEST["achieveContent"]);
            $editContent -> execute();
            header("location:achievement-back.php");
        } else {
            echo "<script>
                    alert('好聽好聽');
                    window.loction = 'achievement-content-editor.php';
                  </script>";
        }    
    } catch (PDOExpection $e) {
        echo "錯誤原因:" , $e->getMessage() , "<br>" ; 
        echo "錯誤訊息:" , $e->getLine() , "<br>" ;
    }
?>