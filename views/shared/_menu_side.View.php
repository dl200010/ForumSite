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

<nav id="sidebar">
	<div class="sidebar-header">
		<h3>Menu</h3>
	</div>

	<ul class="list-unstyled components">
		<li><a href="?action=home.home">Homepage</a></li>
		<?php if (isset($flexaction['session']) && isset($flexaction['session']["User"]["PK"])) { ?>
			<li>
				<a href="#MyAccountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My Account</a>
				<ul class="collapse list-unstyled" id="MyAccountSubmenu">
					<li><a href="?action=account.changepassword">Change Password</a></li>
					<li><a href="?action=account.manageaccount">Manage Account</a></li>
				</ul>
			</li>
			<?php if ($flexaction['session']["User"]["AdminType"] == "Admin") { ?>
				<li>
					<a href="#AdministrationSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administration</a>
					<ul class="collapse list-unstyled" id="AdministrationSubmenu">
							<li><a href="?action=admin.manageusers">Manage Users</a></li>
							<li><a href="?action=admin.manageuserprofile">User Profile Fields</a></li>
							<li><a href="?action=layout.examples">Template Examples</a></li>
					</ul>
				</li>
			<?php } ?>
			<li><a href="?action=login.logout">Logout</a></li>
		<?php } else { ?>
			<li><a href="?action=login.login">Login</a></li>
		<?php } ?>
	</ul>
</nav>