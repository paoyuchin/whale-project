<?php 
    	try {
            require_once("connectback.php");
            
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
                        // $sql="SELECT aa.achievementContentNo 
                        //     FROM achievementcontent as aa 
                        //     WHERE aa.achievementContentNo 
                        //     = (select max(bb.achievementContentNo) 
                        //     from achievementcontent as bb where activityNo = $activityNo)";
                        // $sel = $pdo->query($sql);
                        // $id = $sel->fetchObject();
                        // $no = $id->achievementContentNo;
                        //echo "資料新增成功！";	
						echo "0";					
					}
					else{
						echo "99";//"圖片上傳失敗";
					}
					break;
				case UPLOAD_ERR_INI_SIZE:
					echo "1";//"上傳檔案太大,不可超過",ini_get("upload_max_filesize") , "<br>";
					break;
				case UPLOAD_ERR_FORM_SIZE:
					echo "2";//"上傳檔案太大,不可超過",$_POST["MAX_FILE_SIZE"] , "Byte(位元組)<br>";
					break;
				case UPLOAD_ERR_PARTIAL:
					echo "3";//"上傳檔案不完整<br>";
					break;
				case UPLOAD_ERR_NO_FILE:
					echo "4"; //"檔案未選<br>";
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