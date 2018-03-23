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
    <!-- common -->
	<link src="../common/images/background"></link>
	<link rel="stylesheet" href="../common/css/menu-back.css">    
	<!-- custom -->
	<link rel="stylesheet" href="css/achievement-back.css">
	<script src="js/plugin/jquery-3.3.1.min.js"></script>	
	<script src="js/achievement-back.js"></script>
</head>
<body>
	<div class="wrapper">

		<?php  require_once "../common/menu-back.php" ?>
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
							try{
							require_once("../common/connectDB.php"); 
							$sql = "SELECT activityNo , activityName ,date_add(startDate, interval 1 day) as endDay, achievementStatus
								FROM activity
								where startDate < now()
								ORDER by startDate
								";
								$count =$pdo->prepare($sql);
								$count->execute();
								$total = $count->rowCount(); //所有的比數
								$perPage = 5;
								$pages = ceil($total/$perPage);//算出有幾頁 已無條件進位
								if(!isset($_GET["page"])){
									$page = 1;
								}else{
									$page = intval($_GET["page"]);
								};
								$start = ($page-1)*$perPage;

							}catch (PDOExpection $e) {
								echo "錯誤原因: ", $e->getMessage(), "<br>";
								echo "錯誤行號: ", $e->getLine(), "<br>";
							}

							////////page
							try {
								require_once("../common/connectDB.php"); 
								$sql = "SELECT activityNo , activityName ,date_add(startDate, interval 1 day) as endDay, achievementStatus
								FROM activity
								where startDate < now()
								ORDER by startDate LIMIT $start,$perPage 
								"; //頁數
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
													<input type='radio' class='radioBtn' name='status$activityNo' value='0'>下架
												</label>";
											}else{
												echo "
												<label>
													<input type='radio' class='radioBtn' name='status$activityNo' value='1'>上架
												</label>
												<label>											
													<input type='radio' class='radioBtn' name='status$activityNo' value='0' checked>下架
												</label>";
											}
											
											?>											
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
						<tr>
							<td colspan="5">
							<?php 
							for ($i=1; $i<=$pages; $i++){
								echo "<a href=?page=".$i.">".$i."</a>";
							}
							?>
							<td>
						<tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>