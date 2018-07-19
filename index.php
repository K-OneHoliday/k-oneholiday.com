<?php require "assets/php/locale.php"; ?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>健一假期旅行社 - 為您提供不一樣的旅遊體驗</title>
		<meta charset="gb2312" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src="assets/libs/skel-3.0.1/dist/skel.min.js"></script>
		<script src="assets/libs/skel-3.0.1/dist/skel-layout.min.js"></script>
		<script type="text/javascript">
			skel.breakpoints({
				xlarge: "(max-width: 1680px)",
				large:  "(max-width: 1280px)",
				medium: "(max-width: 980px)",
				small:  "(max-width: 736px)",
				xsmall: "(max-width: 480px)"
			});
			skel.layout({
				reset: "normalize",
				grid: true,
				containers: true
			});
		</script>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<?php require "assets/php/header.php"; ?>

				<!-- Menu -->
					<?php require "assets/php/menu.php"; ?>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>健一假期</h1>
							</header>
							<div class="content">
								<p>為您提供不一樣的旅遊體驗<br />旅行社代理商牌照號 No: 354016</p>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<!-- <section id="one" class="tiles">
								<article>
									<span class="image">
										<img src="images/pic01.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="landing.html" class="link">Aliquam</a></h3>
										<p>Ipsum dolor sit amet</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic02.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="landing.html" class="link">Tempus</a></h3>
										<p>feugiat amet tempus</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic03.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="landing.html" class="link">Magna</a></h3>
										<p>Lorem etiam nullam</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic04.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="landing.html" class="link">Ipsum</a></h3>
										<p>Nisl sed aliquam</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="landing.html" class="link">Consequat</a></h3>
										<p>Ipsum dolor sit amet</p>
									</header>
								</article>
								<article>
									<span class="image">
										<img src="images/pic06.jpg" alt="" />
									</span>
									<header class="major">
										<h3><a href="landing.html" class="link">Etiam</a></h3>
										<p>Feugiat amet tempus</p>
									</header>
								</article>
							</section> -->

						<!-- Two -->
							<section id="about">
								<div class="inner">
									<p style="font-size: small; font-style: italic">此網站現在尚處於設計階段，因此可能欠缺一些重要功能，請多多見諒！</p>
									<header class="major">
										<h2>關於我們</h2>
									</header>
									<p>我們是一所另類的旅行社，能夠為您度身設計適合您的行程。無論您想去哪裡度假和有多少人同行，我們都可以讓您成團 <span title="必須有二人或以上">*</span>。</p>
									<?php
									require "assets/php/credentials.php";
									try {
										$k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
										echo "<div class=\"row\" style=\"text-align: center\">";
										$i = 0;
										foreach ($k_one->query("SELECT * FROM images") as $row) {
											if ($i % 3 === 0 && $i !== 0)
												echo "</div><div class=\"row\" style=\"text-align: center\">";
											echo "<div class=\"4u 12u$(small)\"><p>";
											echo is_null($row["pdf"]) ?
												"<img src=\"images/uploads/" . htmlspecialchars(rawurlencode($row["img"])) . "\" alt=\"" . htmlspecialchars($row["img"]) . "\" style=\"width: 100%\" />" :
												"<a href=\"pdf/uploads/" . htmlspecialchars(rawurlencode($row["pdf"])) . "\" target=\"_blank\"><img src=\"images/uploads/" . htmlspecialchars(rawurlencode($row["img"])) . "\" alt=\"" . htmlspecialchars($row["img"]) . "\" style=\"width: 100%\" /></a>";
											echo "</p>";
											if (!is_null($row["description"]))
												echo "<p style=\"font-size: small; font-style: italic\">" . htmlspecialchars($row["description"]) . "</p>";
											echo "</div>";
											$i++;
										}
										echo "</div>";
										$k_one = NULL;
									} catch (PDOException $e) {
										echo "<span style=\"color: red\"><p><span class=\"icon fa fa-exclamation-circle\"></span> 嘗試連接資料庫時發生了以下錯誤，因此無法顯示有關圖片：</p><p><pre><code>" .
											htmlspecialchars($e->getMessage()) .
											"</code></pre></p></span>";
									}
									?>
									<p style="font-size: small; font-style: italic">以上圖片只供參考</p>
								</div>
							</section>

					</div>

				<!-- Contact -->
					<?php require "assets/php/contact.php"; ?>

				<!-- Footer -->
					<?php require "assets/php/footer.php"; ?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
