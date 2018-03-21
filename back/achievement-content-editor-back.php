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
	<!-- custom -->
    <link rel="stylesheet" href="css/achievement-back.css">
    <link rel="stylesheet" href="css/achievement-content-editor-back.css">
    <script src="js/plugin/jquery-3.3.1.min.js"></script>	
    <script src="js/achievement-content-edited-back.js"></script>
</head>

<body>
	<div class="wrapper">
		<div class="bg-img"></div>
		<div class="sidebar-section">
			<figure class="logo">
				<img src="../images/logo/logo.png" alt="logo">
			</figure>
			<div class="welcome">
				歡迎，<span><?php echo $_SESSION["managerName"]; ?></span>管理員
			</div>
			<ul>
				<li><a href="member-back.php" class="sidebar-item">會員管理</a></li>
				<li><a href="activity-back.php" class="sidebar-item">活動管理</a></li>
				<li><a href="achievement-back.php" class="sidebar-item">里程碑管理</a></li>
				<li><a href="#" class="sidebar-item">留言管理</a></li>
				<li><a href="#" class="sidebar-item">募資管理</a></li>
				<li><a href="#" class="sidebar-item">連署活動管理</a></li>
				<li><a href="#" class="sidebar-item">後台管理</a></li>
			</ul>
        </div>
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
                        <tr>
                            <td>內容</td>
                            <td>
                                <textarea id="textareaContent" cols="30" rows="10" class="textareaClsss" name="content"></textarea>
                            </td>                            
                        </tr>                        
                        <tr>
                            <td>新增圖片</td>
                            <td>
                                <input name="upFile" type="file">
                                <img class='preview' src='images/'> 
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
                                <?php echo $filename ?>
                                <img class='preview' src='images/<?php echo $filename?>'>
                                <input name="upFile" type="file" value="<?php echo $filename ?>">
                            </td>                                 
                        </tr>
    
                    </table>
                    <div class="FinishEditedBtnFather">
                        <input class="FinishEditedBtn" type="submit" name="submit" value="送出">
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