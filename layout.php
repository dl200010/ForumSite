<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>The Forums</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="/assets/lobibox/css/Lobibox.min.css"/>
	</head>
	<body>
		<div id="wrapper">
			<div id="main">
				<div class="inner">
					<?php echo $flexaction['page_display']; ?>
				</div>
			</div>

			<!-- Sidebar -->
			<div id="sidebar">
				<?php echo $flexaction['menu_display']; ?>
			</div>

		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
		<script src="/assets/lobibox/js/Lobibox.min.js"></script>
		<!-- If you do not need both (messageboxes and notifications) you can inclue only one of them -->
		<!-- <script src="/assets/lobibox/js/messageboxes.min.js"></script> -->
		<!-- <script src="/assets/lobibox/js/notifications.min.js"></script> -->

		<?php
			if (isset($flexaction['page_js_files']) && $flexaction['page_js_files'] != "") {
				echo $flexaction['page_js_files'] . "\n";
			}
			if (isset($flexaction['page_javascript']) && $flexaction['page_javascript'] != "") {
				echo "<script type='text/javascript'>$(document).ready(function() {" . $flexaction['page_javascript'] . "});</script>\n";
			}
		?>
	</body>
</html>