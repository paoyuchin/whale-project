
		<div class="bg-img"></div>
		<div class="sidebar-section">
			<figure class="logo">
				<img src="../common/images/logo/logo.png" alt="logo">
			</figure>
			<div class="welcome">
				歡迎，<span><?php echo $_SESSION["managerName"]; ?></span>管理員
			</div>
			<ul>
				<li><a href="../back/member-back.php" class="sidebar-item">會員管理</a></li>
				<li><a href="achievement-back.php" class="sidebar-item">活動成果管理</a></li>
				<li><a href="activity-back.php" class="sidebar-item">活動管理</a></li>
				<li><a href="fundRaising.php" class="sidebar-item">募資管理</a></li>
				<li><a href="petition-back.php" class="sidebar-item">連署活動管理</a></li>				
				<li><a href="message-back.php" class="sidebar-item">留言管理</a></li>
				<li><a href="accuse-back.php" class="sidebar-item">檢舉管理</a></li>				
				<li><a href="manager.php" class="sidebar-item">後台管理</a></li>
				<li><a href="../back/managerLogout.php" class="sidebar-item">登出</a></li>
			</ul>
		</div>
