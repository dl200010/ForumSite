<!DOCTYPE HTML>
<?php
	/*
	 *  Copyright 2018 DL200010 <DL200010@gmail.com>
	 *
	 *  Licensed under the Apache License, Version 2.0 (the "License");
	 *  you may not use this file except in compliance with the License.
	 *  You may obtain a copy of the License at
	 *
	 *      http://www.apache.org/licenses/LICENSE-2.0
	 *
	 *  Unless required by applicable law or agreed to in writing, software
	 *  distributed under the License is distributed on an "AS IS" BASIS,
	 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	 *  See the License for the specific language governing permissions and
	 *  limitations under the License.
	 */
?>
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
		<link rel="stylesheet" href="/assets/lobibox/1.2.7/css/Lobibox.min.css"/>
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
		<script src="assets/jquery/3.3.1/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
		<script src="/assets/lobibox/1.2.7/js/Lobibox.min.js"></script>
		<!-- If you do not need both (messageboxes and notifications) you can inclue only one of them -->
		<!-- <script src="/assets/lobibox/1.2.7/js/messageboxes.min.js"></script> -->
		<!-- <script src="/assets/lobibox/1.2.7/js/notifications.min.js"></script> -->
		<script src="/assets/jquery-validation/1.19.0/jquery.validate.min.js"></script>
		<script src="/assets/jquery-validation/1.19.0/additional-methods.min.js"></script>

		<?php
			if (isset($flexaction['page_js_files']) && $flexaction['page_js_files'] != "") {
				echo $flexaction['page_js_files'];
			}
			if (isset($flexaction['page_javascript']) && $flexaction['page_javascript'] != "") {
				echo "<script type='text/javascript'>$(document).ready(function() {" . $flexaction['page_javascript'] . "});</script>";
			}
		?>

	</body>
</html>