<?php 
    	try {
            require_once("connectback.php");
            // require_once("../common/connectDB.php");            
			$content = $_REQUEST['content'];
			// $upFile = $_REQUEST['upFile'];
			$activityNo = $_REQUEST['activityNo'];
			$FinishEditedBtn2 = $_REQUEST['FinishEditedBtn2'];
            
            switch($_FILES['upFile']['error']){
				case UPLOAD_ERR_OK:
					if( file_exists("images")===false){
						mkdir("images"); //make directory
					}
					$from = $_FILES['upFile']['tmp_name'];
					$imageName = $_FILES['upFile']['name'];
					$to = "images/" . $imageName;
					if(copy( $from, $to)){
                        //echo "圖片上傳成功！<br>";
                        if ($FinishEditedBtn2==2) {
                            $sql = "INSERT INTO achievementcontent(activityNo,content,filename) 
                                    VALUES (:activityNo,:content,:upFile)";
                            $insertData = $pdo->prepare($sql);
                            $insertData -> bindValue(":activityNo", $activityNo);
                            $insertData -> bindValue(":content", $content);
                            $insertData -> bindValue(":upFile", $imageName);
                            $insertData->execute();
                        }elseif ($FinishEditedBtn2==1) {
			                $achievementContentNo = $_REQUEST['achievementContentNo'];
                            $sql = "UPDATE achievementcontent 
                                    SET content=:content,filename=:filename WHERE achievementContentNo =:achievementContentNo";
                            $insertData = $pdo->prepare($sql);
                            $insertData -> bindValue(":filename", $imageName);
                            $insertData -> bindValue(":content", $content);
                            $insertData -> bindValue(":achievementContentNo", $achievementContentNo);
                            $insertData->execute();
                        };
						// echo "0";
						// echo "$content"."+"."$imageName";				
					}
					else{
						echo "99";
						echo "圖片上傳失敗";
					}
					break;
				case UPLOAD_ERR_INI_SIZE:
					echo "1";
					echo "上傳檔案太大,不可超過",ini_get("upload_max_filesize") , "<br>";
					break;
				case UPLOAD_ERR_FORM_SIZE:
					echo "2";
					echo "上傳檔案太大,不可超過",$_POST["MAX_FILE_SIZE"] , "Byte(位元組)<br>";
					break;
				case UPLOAD_ERR_PARTIAL:
					echo "3";
					echo "上傳檔案不完整<br>";
					break;
				case UPLOAD_ERR_NO_FILE:
					echo "4"; 
					echo "檔案未選<br>";
					break;
				default:
				//   echo "請通知系統維人員,錯誤代碼 : " , $_FILES["upFile"]["error"] ,"<br>";
				  echo $_FILES["upFile"]["error"];
			}
    	} catch (PDOException $e) {
    		echo "錯誤原因: ", $e->getMessage(), "<br>";
			echo "錯誤行號: ", $e->getLine(), "<br>";
    	}
?>