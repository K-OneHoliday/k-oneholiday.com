<?php
require "../assets/php/locale.php";
session_start();
if (!isset($_SESSION["username"])) {
  // 未設置會話用戶名 - 管理員肯定未登錄
  // 毀滅會話並把用戶重新導向至 login.php
  session_destroy();
  header("Location: login.php");
} else {
  // 確認會話用戶名稱實屬管理員（防止黑客使用假管理員名稱隨意改動網站內容）
  require "../assets/php/credentials.php";
  try {
    $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
    if ($k_one->query("SELECT COUNT(*) FROM admins WHERE username = " . $k_one->quote($_SESSION["username"]))->fetchColumn() !== "1") {
      // 會話用戶名稱並非屬實 - 把虛假管理員登出並重新導向至 login.php
      session_destroy();
      header("Location: login.php");
    }
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
		<title>主頁 - 管理員 - 健一假期</title>
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
					<?php require "../assets/php/admin_menu.php"; ?>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>歡迎，管理員！</h1>
									</header>
									<p>您可透過此介面更改此網站的某些內容，請按以下右上角的目錄標誌以觀看所有選項。</p>
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

	</body>
</html>
