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
	include 'act_login.php';
?>

<h2>Login</h2>
<form method="post" id="LoginForm">
	<div class="row">
		<div class="col-md-6 col-xs-12 form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Email" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
		<div class="col-md-6 col-xs-12 form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="password" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
		<div class="col-md-6 col-xs-12 text-center">
			<input type="submit" name="Login" value="Login" class="btn btn-danger" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
	</div>
</form>

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