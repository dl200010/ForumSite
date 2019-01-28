<!DOCTYPE HTML>
<?php
	/*
	 *  Copyright 2019 Christopher Dangerfield <DL200010@gmail.com>
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
<html>
	<head>
		<title>The Forums</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="/assets/vendor/lobibox/1.2.7/css/Lobibox.min.css"/>
	</head>
	<body>
		<div id="wrapper">
			<?php echo $flexaction['page_display']; ?>

			<?php include 'menu.php'; ?>
		</div>

		<script src="/assets/vendor/jquery/3.3.1/js/jquery.min.js"></script>

		<script src="/assets/vendor/lobibox/1.2.7/js/Lobibox.min.js"></script>
		<!-- If you do not need both (messageboxes and notifications) you can inclue only one of them -->
		<!-- <script src="/assets/vendor/lobibox/1.2.7/js/messageboxes.min.js"></script> -->
		<!-- <script src="/assets/vendor/lobibox/1.2.7/js/notifications.min.js"></script> -->
		<script src="/assets/vendor/jquery-validation/1.19.0/js/jquery.validate.min.js"></script>
		<script src="/assets/vendor/jquery-validation/1.19.0/js/additional-methods.min.js"></script>

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