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
	<link rel="stylesheet" href="css/activity-back.css">
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
				<li><a href="#" class="sidebar-item">里程碑管理</a></li>
				<li><a href="#" class="sidebar-item">留言管理</a></li>
				<li><a href="#" class="sidebar-item">募資管理</a></li>
				<li><a href="#" class="sidebar-item">連署活動管理</a></li>
				<li><a href="#" class="sidebar-item">後台管理</a></li>
			</ul>
		</div>
		<div class="main-section">
			<div class="block">
				<div class="title">活動管理</div>
				<div class="block-table">
                    <?php 
                        try {
                            // echo $_REQUEST["achievementContentNo"];
                            require_once("connectback.php");
                            $sql = "select * from achievementContent where achievementContentNo = :achievementContentNo";
                            $contents = $pdo -> prepare($sql);
                            $contents -> bindValue(":achievementContentNo", $_REQUEST["achievementContentNo"]);
                            $contents -> execute();

                            $content = $contents ->fetchObject();
                            $achieveContent = $content -> content;
                            $title = $content -> title;
                            $filename = $content -> filename;
                            $achievementContentNo = $content -> achievementContentNo;
                            // print_r("$achievementContentNo"); 驗證用
                    ?>
                        <form action="achieveUpdated.php" enctype="multipart/form-data">  
                        <!-- 傳東西可以傳多種typeenctype="multipart/form-data" -->
                            <table>
                                <tr>
                                    <td>成果標題</td>
                                    <td>
                                        <input type="text" value="<?php echo $title ?>" name="title">
                                    </td>
                                </tr>
                                <tr>
                                    <td>內容</td>
                                    <td>
                                        <textarea id="" cols="30" rows="10" name="achieveContent">
                                            <?php echo $achieveContent; ?>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>新增圖片</td>
                                    <td>
                                        <input type="file" value="<?php echo $filename ?>">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="achievementContentNo" value="<?php echo $achievementContentNo ?>">
                            <button class="btn" type="submit" name="submit">確認修改</button>
                        </form>
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