<?php
require "../assets/php/locale.php";
require "../assets/php/admin_verify_session.php";
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
									<p style="font-size: small; color: yellow"><span class="icon fa fa-exclamation-triangle"></span> 為了保障您帳戶的安全，請謹記對網站做完改動後儘快登出。</p>
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
