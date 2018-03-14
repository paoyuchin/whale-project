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
				<li><a href="achievement-back.php" class="sidebar-item">里程碑管理</a></li>
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
                            require_once("connectback.php");
                            $sql = "select * from achievementContent where achievementContentNo = :achievementContentNo";
                            $contents = $pdo -> prepare($sql);
                            $contents -> bindValue(":achievementContentNo", $_REQUEST["achievementContentNo"]);
                            $contents -> execute();
                            $content = $contents ->fetchObject();
                            $achieveContent1 = $content -> content1;
                            $achieveContent2 = $content -> content2;
                            $achieveContent3 = $content -> content3;
                            $title = $content -> title;
                            $img1 = $content -> img1;
                            $img2 = $content -> img2;
                            $img3 = $content -> img3;
                            $achievementContentNo = $content -> achievementContentNo;
                            echo "<script>console.log( 'Debug Objects: " . $title . "' );</script>";
                            echo "<script>console.log( 'Debug Objects: " . $img1 . "' );</script>";
                            echo "<script>console.log( 'Debug Objects: " . $img2 . "' );</script>";
                            echo "<script>console.log( 'Debug Objects: " . $img3 . "' );</script>";
                            // print_r("$achievementContentNo"); 驗證用
                    ?>
                        <form action="achieveUpdated.php" method="post" enctype="multipart/form-data">  
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
                                        <textarea id="" cols="30" rows="10" name="content1">
                                            <?php echo $achieveContent1; ?>
                                        </textarea>
                                        <textarea id="" cols="30" rows="10" name="content2">
                                            <?php echo $achieveContent2; ?>
                                        </textarea>
                                        <textarea id="" cols="30" rows="10" name="content3">
                                            <?php echo $achieveContent3; ?>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>新增圖片</td>
                                    <td>
                                        <?php echo $img1 ?>
                                        <?php echo $img2 ?>
                                        <?php echo $img3 ?>
                                        <input type="file" name="img1" value="<?php echo $img1 ?>">
                                        <input type="file" name="img2" value="<?php echo $img2 ?>">
                                        <input type="file" name="img3" value="<?php echo $img3 ?>">
                                        <img class='preview' src='uploads/<?php echo $title ?>/<?php echo $img1 ?>'> 
                                        <img class='preview' src='uploads/<?php echo $title ?>/<?php echo $img2 ?>'> 
                                        <img class='preview' src='uploads/<?php echo $title ?>/<?php echo $img3 ?>'> 
                                    </td>                                 
                                </tr>   
                            </table>
                            <input type="hidden" name="img1" value="<?php echo $img1 ?>">
                            <input type="hidden" name="img2" value="<?php echo $img2 ?>">
                            <input type="hidden" name="img3" value="<?php echo $img3 ?>">
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