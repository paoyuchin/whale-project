<?php 
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		try {
			require_once("connectback.php");
			$sql = "select * from manager where managerId=:managerId and psw =:psw";
			$managers = $pdo -> prepare($sql);
			$managers -> bindValue(':managerId',$_REQUEST["id"]);
			$managers -> bindValue(':psw',$_REQUEST["psw"]);
			$managers->execute();
			if ($managers->rowCount() == 0) {
				echo "<script>
						alert('查無此帳密，請重新登入');
						window.location = 'login-back.html';
					  </script>";
			} else {
				// 抓取managerName
				$managerName = $managers->fetchColumn(3);
				$_SESSION["managerName"] = $managerName;
				header("location:member-back.php");
			}
		} catch (PDOExpection $e) {
			echo "錯誤行號 : ", $e->getLine(), "<br>";
  			echo "錯誤訊息 : ", $e->getMessage(), "<br>";
		}
	?>
</body>
</html>