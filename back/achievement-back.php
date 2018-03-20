<?php 
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>活動列表</title>
	<!-- reset -->
	<link rel="stylesheet" href="css/reset.css">
	<!-- custom -->
	<link rel="stylesheet" href="css/achievement-back.css">
	<script src="js/plugin/jquery-3.3.1.min.js"></script>	
	<script src="js/achievement-back.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="bg-img"></div>
		<div class="sidebar-section">
			<figure class="logo">
				<img src="images/logo/logo.png" alt="logo">
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
				<div class="title">活動成果管理</div>
				<div class="block-table">	
					<table align='center' cellspacing='0'>
						<tr>
                            <th>活動編號</th>
							<th>活動名稱</th>
							<th>結束日期</th>
							<th>活動狀態</th>
							<th>編輯</th>
                        </tr>
						<?php 
							try {
								require_once("connectback.php");
								// // 取得總共有幾筆
								// $sql = "select * from achievementContent"; //拿全部東西 從 「表格」
								// $count = $pdo -> query($sql);
								// $total = $count->rowCount();
								// //先設定好每頁5筆
								// $num = 5;
								// // 抓到總共有幾頁
								// $pages = ceil($total/$num);
								// // 預設頁數
								// $pageNum = 1;
								// if(!isset($_REQUEST["pageNum"])){
								// 	$pageNum = 1;
								// }else{
								// 	$pageNum = $_REQUEST["pageNum"];
								// }
								// // 記錄筆數
								// $start = ($pageNum - 1)*$num;
								// // 用limit限制每頁筆數
								// $column = "select * from achievementContent limit $start,$num";
								// $contents = $pdo->query($column);
								$sql = "SELECT activityNo , activityName ,date_add(startDate, interval 1 day) as endDay, achievementStatus
								FROM activity
								where startDate < now()
								ORDER by startDate
								";
								$activityDatas = $pdo -> query($sql);
								while($activityData = $activityDatas -> fetchObject()){ //array
								$activityNo = $activityData -> activityNo;
								$activityName = $activityData -> activityName;
								$endDay = $activityData -> endDay ;
								$achievementStatus = $activityData-> achievementStatus;
								?> 		
								<form action="achievement-content-editor-back.php" method="GET" enctype="multipart/form-data">
									<tr>
										<td>
											<?php echo $activityNo ?>
                           						 <!-- 活動編號 -->
											<input type="hidden" name="activityNo" value="<?php echo $activityNo?>">
										</td>
										<td>
											<?php echo  $activityName ?>
											<input type="hidden" name="activityName" value="<?php echo $activityName?>">
											<!-- 活動名稱 -->
										</td>
										<td>
											<?php echo $endDay ?>
											<!-- 結束日期 -->
										</td>
										<td class="tdbtn" data-activityNo="<?php echo $activityNo ?>">
											<?php 
											if($achievementStatus == 1){
												echo 
												"<label>
													<input type='radio' class='radioBtn' name='status$activityNo' value='1' checked>上架
												</label>
												<label>											
													<input type='radio' class='radioBtn' name='status$activityNo' value='0'>未上架
												</label>";
											}else{
												echo "
												<label>
													<input type='radio' class='radioBtn' name='status$activityNo' value='1'>上架
												</label>
												<label>											
													<input type='radio' class='radioBtn' name='status$activityNo' value='0' checked>未上架
												</label>";
											}
											
											?>
										
											
												<!-- <?php //echo $achievementStatus ?> -->
											<!-- 活動狀態 -->
										</td>
										<td>
											<button class="btn" type="submit">
												<img src="images/component/pencil.png" alt="edit"></a>
											</button>
										</td>
									</tr>
								</form>
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
					// if( $pageNum > 1) { //目前不是第一頁
					// 	echo "<a href='?pageNum=",$pageNum-1,"'>往前一頁</a>&nbsp;&nbsp;&nbsp;";
					// }
				
					// for($i=1; $i <= $pages; $i++){
					// 	if( $i == $pageNum) {
					// 	echo "<a href='?pageNum=$i' style='color:deeppink'>$i</a>&nbsp;&nbsp;&nbsp;"; 
					// 	}else {
					// 	echo "<a href='?pageNum=$i'>$i</a>&nbsp;&nbsp;&nbsp;";
					// 	}
						
					// }
					// if( $pageNum < $pages) { //目前不是最後一頁
					// 	echo "<a href='?pageNum=",$pageNum+1,"'>往後一頁</a>&nbsp;&nbsp;&nbsp;";
					// }
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>