<?php
	/*
	 *  Copyright 2019 DL200010 <DL200010@gmail.com>
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
	include 'act_login.php';
?>

<header id="header">
	<h2>Login</h2>
</header>
<section>
	<form method="post" id="LoginForm">
		<div class="row gtr-uniform">
			<div class="col-6 col-12-xsmall">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Email" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
			<div class="col-6 col-12-xsmall">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="password" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
			<div class="col-6 col-12-xsmall align-center">
				<input type="submit" name="Login" value="Login" class="primary" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
		</div>
	</form>
</section>

<?php
	$flexaction['page_javascript'] .= "
		$('#LoginForm').validate({
			rules: {
				email: 'required',
				password: 'required'
			},
			messages: {
				email: 'Please enter your email',
				password: 'Please enter your password'
			}
		});
	";
?>