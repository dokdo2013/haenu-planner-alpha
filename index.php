<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	5F4B8B
-->
<html>
	<head>
		<title>현우야 대학가자</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>현우야 대학가자</h1>
				<p>윈도우 태블릿의 스티커 메모가 안 이뻐서 만든 웹사이트.<br>
				근데 애초에 이걸 만들었다는건 대학 가기 싫다는 뜻일텐데?<br>
			<a href="main.php?id=guest"><font style="color:#1cb495">방문자는 여기를 눌러주세요.</font></a></p>

			</header>

		<!-- Signup Form -->
		<?
		$res = mt_rand(1,15);
		$res2 = $res % 3;
		if($res2 == 0){
		?>
			<form id="signup-form" action="main.php" method="get">
				<input type="password" name="id" id="email" placeholder="비밀번호" />
				<input type="submit" value="접속" />
			</form>
		<? }else if($res2 == 1){?>
			<form id="signup-form" action="main2.php" method="get">
				<input type="password" name="id" id="email" placeholder="비밀번호" />
				<input type="submit" value="접속" />
			</form>
		<? }else if($res2 == 2){?>
			<form id="signup-form" action="main3.php" method="get">
				<input type="password" name="id" id="email" placeholder="비밀번호" />
				<input type="submit" value="접속" />
			</form>
		<? }?>
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="http://instagram.com/haenuuuu" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; 2018 JoHyeonwoo</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/main.js"></script>

	</body>
</html>
