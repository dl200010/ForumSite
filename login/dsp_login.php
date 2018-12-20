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
	
	if (isset($_POST["Login"])) {
		include 'act_login.php';
	}
?>

<header id="header">
	<h2>Login</h2>
</header>
<section>
	<div class="6u$ 12u$(medium)">
		<form method="post">
			<div class="row uniform">
				<div class="6u$ 12u$(xsmall)">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="Email" />
				</div>
			</div>
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="password" />
				</div>
			</div>
			<div class="row uniform align-center">
				<div class="6u 12u$(xsmall)">
					<ul class="actions">
						<li><input type="submit" name="Login" value="Login" class="special" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>