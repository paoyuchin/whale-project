<?php 
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- reset -->
	<link rel="stylesheet" href="css/reset.css">
	<!-- custom -->
    <link rel="stylesheet" href="css/achievement-back.css">
    <link rel="stylesheet" href="css/achievement-content-editor-back.css">
    <script src="achievement-content-edited-back.js"></script>
    

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
		<div class="main-section">
			<div class="block">

                <div class="title"> <?php echo ($_REQUEST['activityName'])?>活動成果管理</div>
                <div class="tellEmpty" id="tellEmpty">目前尚無資料，請點選新增按鈕即可新增</div>
				<div class="block-table">
                   
                <!-- =======要複製的東西============================================================== -->
                <form class="spotDiv" method="post" style="display:none" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>內容</td>
                            <td>
                                <textarea id="" cols="30" rows="10" id="contentId" name="content[]"></textarea>
                            </td>                            
                        </tr>                        
                        <tr>
                            <td>新增圖片</td>
                            <td>
                                <input type="file" name="file[]"value="">
                                <img class='preview' src='uploads/'> 
                            </td>                              
                        </tr>                       
                    </table>
                    <input type="hidden" name="achievementContentNo" value="<?php echo $achievementContentNo ?>">
                    <div class="FinishEditedBtnFather">
                        <input class="FinishEditedBtn" type="submit" name="submit" value="Submit">                                       
                    </div>
                    <div class="line"></div>
                </form>
                        

<!-- ========================================================================================================================                         -->

                        

                <form id="myForm" action="achieveUpdated.php" method="post" enctype="multipart/form-data">  
                <?php 
                try {
                    $activityNo = $_REQUEST['activityNo'];

                    require_once("connectback.php");
                    $sql = "SELECT content , title , filename
                    FROM achievementcontent
                    WHERE activityNo = :activityNo ";
                    $editContents = $pdo -> prepare($sql);
                    $editContents->bindvalue(":activityNo" , $activityNo);
                    $editContents->execute();
                    
                    while($editContent = $editContents -> fetchObject()){ 
                    $content = $editContent->content;
                    $filename = $editContent->filename;
                ?>
                    <table id="myForm" action="achieveUpdated.php" method="post">

                        <tr>
                            <td>內容</td>
                            <td>
                                <textarea id="" cols="30" rows="10" name="content[]" id="textArea">
                                    <?php echo $content ; ?>dddd
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>新增圖片</td>
                            <td>
                                <?php echo $filename ?>
                                <input type="file" name="file" id="filename" value="<?php echo $filename ?>">
                                <img class='preview' src='uploads/<?php echo $filename?>'> 
                            </td>                                 
                        </tr>
                    </table>

                <?php
                    }
                ?>
                    <input type="hidden" name="file" value="<?php echo $filename ?>">
                    <input type="hidden" name="achievementContentNo" value="<?php echo $achievementContentNo ?>">
                    <!-- <button id="btnSend" class="btn" type="submit" name="submit">確認修改</button> -->
                </form>
                    <div class="btnFather">
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
</body>
</html>