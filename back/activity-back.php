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
					<div class="subtitle">
						活動內容管理
					</div>	
					<table align='center' cellspacing='0'>
						<tr><th>活動編號</th><th>標題</th><th>編輯</th></tr>
						<?php 
							try {
								require_once("connectback.php");
								// 取得總共有幾筆
								$sql = "select * from activityContent";
								$count = $pdo -> prepare($sql);
								$count -> bindValue(1,$_REQUEST["activity"]);
								$count->execute();
								$total = $count->rowCount();
								//先設定好每頁5筆
								$num = 5;
								// 抓到總共有幾頁
								$pages = ceil($total/$num);
								// 預設頁數
								$pageNum = 1;
								if(!isset($_REQUEST["pageNum"])){
									$pageNum = 1;
								}else{
									$pageNum = $_REQUEST["pageNum"];
								}
								// 記錄筆數
								$start = ($pageNum - 1)*$num;
								// 用limit限制每頁筆數
								$column = "select * from activityContent join activity where activityContent.activityNo = activity.activityNo limit $start,$num";
								$contents = $pdo->query($column);
								while($contentRow = $contents->fetch(PDO::FETCH_ASSOC)){
						?>
								<tr>
									<td><?php echo $contentRow["activityContentNo"] ?></td>
									<td><?php echo $contentRow["activityName"] ?></td>
									<td><a href="activity-editor-back.php?<?php echo $contentRow["activityContentNo"] ?>"><img src="images/component/pencil.png" alt="edit"></a></td>
								</tr>
						<?php	
								}
							} catch (PDOExpection $e) {
								echo "錯誤原因: ", $e->getMessage(), "<br>";
								echo "錯誤行號: ", $e->getLine(), "<br>";
							}
						?>
					</table>
					<div class="page-change">
						<?php 
							// 印出頁數和顯示各頁超連結
							// 藉由點選更換pageNum 達到換頁效果
							for($i=1;$i<=$pages;$i++) {
								echo "<a href='activity-back.php?pageNum=$i'>$i</a>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>