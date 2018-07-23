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
		<title>「關於我們」圖片及行程表 - 管理員 - 健一假期</title>
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
									<h2>「關於我們」圖片及行程表</h2>
									<p style="font-size: small; color: yellow"><span class="icon fa fa-exclamation-triangle"></span> 為了保障您帳戶的安全，請謹記對網站做完改動後儘快登出。</p>
									<p>您可透過此頁面新增或刪除顯示在主頁「關於我們」部分的圖片，圖片可附有文字和/或 PDF 檔案。</p>
									<hr />
									<p id="status">
										<!-- 新增/刪除圖片狀態 -->
									</p>
									<div class="table-wrapper">
										<form action="#" method="post">
											<table>
												<thead>
													<tr>
														<th>圖片</th>
														<th>PDF 檔案</th>
														<th>說明</th>
														<th>行動</th>
													</tr>
												</thead>
												<tbody id="current-items">
													<!-- 「關於我們」現有圖片資料 -->
												</tbody>
											</table>
										</form>
									</div>
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
			<script src="../assets/js/adminAboutImages.js"></script>

	</body>
</html>
