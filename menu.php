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
<!-- Search
<section id="search" class="alt">
	<form method="post" action="#">
		<input type="text" name="query" id="query" placeholder="Search" />
	</form>
</section>-->

<!-- Menu -->
<nav id="menu">
	<ul>
		<li><a href="?action=home.home">Homepage</a></li>
		<?php if (isset($flexaction['session']) && isset($flexaction['session']["User"]["PK"])) { ?>
			<li>
				<span class="opener">My Account</span>
				<ul>
					<li><a href="?action=account.changepassword">Change Password</a></li>
					<li><a href="?action=account.manageaccount">Manage Account</a></li>
				</ul>
			</li>
			<?php if ($flexaction['session']["User"]["AdminType"] == "Admin") { ?>
				<li>
					<span class="opener">Administration</span>
					<ul>
						<li><a href="?action=admin.manageusers">Manage Users</a></li>
						<li><a href="?action=admin.manageuserprofile">User Profile Fields</a></li>
						<li><a href="?action=elements.elements">Elements</a></li>
					</ul>
				</li>
			<?php } ?>
			<li><a href="?action=login.logout">Logout</a></li>
		<?php } else { ?>
			<li><a href="?action=login.login">Login</a></li>
		<?php } ?>
	</ul>
</nav>

<!-- Footer -->
<footer id="footer">
	<p class="copyright">
		&copy; <?php echo date("Y"); ?> All rights reserved.<br />
		Design: <a href="https://html5up.net" target="net.html5up">HTML5 UP</a>, but modified.
	</p>
</footer>
