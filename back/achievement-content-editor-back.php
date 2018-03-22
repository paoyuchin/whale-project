<?php 
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>編輯活動成果內頁</title>
	<!-- reset -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- common -->
    <link rel="stylesheet" href="../common/css/menu-back.css">    
	<!-- custom -->
    <link rel="stylesheet" href="css/achievement-back.css">
    <link rel="stylesheet" href="css/achievement-content-editor-back.css">
    <script src="js/plugin/jquery-3.3.1.min.js"></script>	
    <script src="js/achievement-content-edited-back.js"></script>
</head>

<body>
	<div class="wrapper">
        <?php  require_once "../common/menu-back.html" ?>
            <!-- require_once("../common/connectDB.php");             -->

        <div class="scroll-back">
		<div class="main-section">
			<div class="block">

                <div class="title"> <?php echo ($_REQUEST['activityName'])?>活動成果管理</div>
                <?php 
                    try {
                        $activityNo = $_REQUEST['activityNo'];

                        require_once("connectback.php");
                        $sql = "SELECT content , filename,achievementContentNo
                        FROM achievementcontent
                        WHERE activityNo = :activityNo ";
                        $editContents = $pdo -> prepare($sql);
                        $editContents->bindvalue(":activityNo" , $activityNo);
                        $editContents->execute();
                ?>
                <div class="tellEmpty" id="tellEmpty">
                    <?php
                    if ($editContents->rowCount() == 0) {
                        echo "目前尚無資料，請點選新增按鈕即可新增"; 
                    }
                    ?>
                </div>
				<div class="block-table" id="block-table">
                   
                <!-- =======要複製的東西============================================================== -->
                <form class="spotDiv" method="post" style="display:none" enctype="multipart/form-data">
                    <input type="hidden" name="activityNo" value="<?php echo $activityNo?>">
                    <table>
                        <tr class="contentTr">
                            <td>內容</td>
                            <td>
                                <textarea id="textareaContent" cols="30" rows="10" class="textareaClsss" name="content"></textarea>
                            </td>                            
                        </tr>                        
                        <tr class="imgTr">
                            <td>新增圖片</td>
                            <td>
                                <!-- <img class='preview' src='images/'>                                  -->
                                <input class="fileBtn" name="upFile" type="file">
                            </td>                              
                        </tr>                       
                    </table>
                    <div class="FinishEditedBtnFather">
                        <input class="FinishEditedBtn" type="button" name="submit" value="送出">
                        <input type="hidden" name="FinishEditedBtn2" value="2">                                                                                                      
                    </div>
                    <input type="hidden" name="achievementContentNo" value="<?php echo $achievementContentNo ?>">                    
                    <div class="line"></div>
                </form>


                        

<!-- ========================================================================================================================                         -->

                        
                <?php    
                    while($editContent = $editContents -> fetchObject()){ 
                    $content = $editContent->content;
                    $filename = $editContent->filename;
                    $achievementContentNo = $editContent->achievementContentNo;
                ?>
                <form id="myForm" method="post" enctype="multipart/form-data">  
                    <input type="hidden" name="activityNo" value="<?php echo $activityNo?>">                    
                    <table method="post">
                        <tr>
                            <td>內容</td>
                            <td>
                                <textarea id="textareaContent" cols="30" rows="10" class="textareaClsss" name="content"><?php echo $content;?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>新增圖片</td>
                            <td>
                                <img class='preview' src='images/<?php echo $filename?>'>
                                <input name="upFile" type="file" value="<?php echo $filename ?>">
                                <?php echo $filename ?>
                                
                            </td>                                 
                        </tr>
    
                    </table>
                    <div class="FinishEditedBtnFather">
                        <input class="FinishEditedBtn" type="button" name="submit" value="送出">
                        <input type="hidden" name="FinishEditedBtn2" value="1">                                       
                    </div>
                    <input type="hidden" name="file" value="<?php echo $filename ?>">
                    <input type="hidden" name="achievementContentNo" value="<?php echo $achievementContentNo ?>">
                    <div class="line"></div>
                </form>
                 <?php
                    
                        }
                    ?>
                    <div class="btnFather" id="btnSend">
                        <div class="btn" id="btnSpotAdd">新增內容與圖片</div>
                    </div>          
                    <?
                        } catch (PDOExpection $e){
                            echo "錯誤原因:" , $e->getMessage() , "<br>" ; 
                            echo "錯誤訊息:" , $e->getLine() , "<br>" ;
                        }
                
                    ?>
				</div>
			</div>
		</div>
        </div>
    </div>
</body>
</html>