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
<div class="inner">

	<!-- Search
	<section id="search" class="alt">
		<form method="post" action="#">
			<input type="text" name="query" id="query" placeholder="Search" />
		</form>
	</section>-->

	<!-- Menu -->
	<nav id="menu">
		<header class="major">
			<h2>Menu</h2>
		</header>
		<ul>
			<li><a href="?action=home.home">Homepage</a></li>
			<li>
				<span class="opener">Submenu</span>
				<ul>
					<li><a href="#">Lorem Dolor</a></li>
					<li><a href="#">Ipsum Adipiscing</a></li>
					<li><a href="#">Tempus Magna</a></li>
					<li><a href="#">Feugiat Veroeros</a></li>
				</ul>
			</li>
			<li><a href="?action=elements.elements">Elements</a></li>
			<?php
				if (isset($flexaction['session']) && isset($flexaction['session']["User"]["PK"])) {
					echo '<li><a href="?action=login.logout">Logout</a></li>';
				}		
			?>
		</ul>
	</nav>

	<!-- Section -->
	<section>
		<header class="major">
			<h2>Server</h2>
		</header>
		<p><a href="https://***REMOVED***/" target="***REMOVED***">https://***REMOVED***/</a></p>
	</section>

	<!-- Footer -->
	<footer id="footer">
		<p class="copyright">
			&copy; <?php echo date("Y"); ?> All rights reserved.<br />
			Design: <a href="https://html5up.net" target="net.html5up">HTML5 UP</a>, but modified.
		</p>
	</footer>
</div>