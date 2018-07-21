<?php
require "../assets/php/locale.php";
session_start();
if (isset($_SESSION["username"])) {
	require "../assets/php/credentials.php";
	try {
		$k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
		if ($k_one->query("SELECT COUNT(*) FROM admins WHERE username = " . $k_one->quote($_SESSION["username"]))->fetchColumn() === "1")
			// 管理員已登入 - 重新導向至 index.php
			header("Location: index.php");
		$k_one = NULL;
	} catch (PDOException $e) {
		echo "<span style=\"color: red\"><p><span class=\"icon fa fa-exclamation-circle\"></span> 嘗試連接資料庫時發生了以下錯誤，因此無法顯示此頁面：</p><p><pre><code>" .
      htmlspecialchars($e->getMessage()) .
      "</code></pre></p></span>";
    exit(0);
	}
}
?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>登入 - 管理員 - 健一假期</title>
		<meta charset="gb2312" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<?php require "../assets/php/header.php"; ?>

				<!-- Menu -->
					<nav id="menu">
						<ul class="actions stacked">
							<li><a href="login.php" class="button primary fit">登入</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>登入</h1>
									</header>
									<p>請輸入您的管理員帳戶名稱及密碼並按「登入」。</p>
                  <form action="#" method="post">
										<p>
											<label>帳戶名稱</label>
											<input type="text" name="username" id="username" placeholder="帳戶名稱" />
										</p>
										<p>
											<label>密碼</label>
											<input type="password" name="password" id="password" placeholder="密碼" />
										</p>
										<p>
											<input type="submit" class="special" id="login" value="登入" />
										</p>
                  </form>
									<p id="status">
										<!-- 登入狀態 -->
									</p>
								</div>
							</section>

					</div>

				<!-- Footer -->
					<?php require "../assets/php/footer.php"; ?>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
			<script src="../assets/js/adminLoginAuthentication.js"></script>

	</body>
</html>
