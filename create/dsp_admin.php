<?php
	/*
	 *  Copyright 2019 Christopher Dangerfield (DL200010 <DL200010@gmail.com>)
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
	include 'act_admin.php';
?>
<header id="header">
	<h2>Create Administrator Account</h2>
</header>
<section>
	<form method="post" id="AdminCreateForm">
		<div class="row gtr-uniform">
			<div class="col-6 col-12-xsmall">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="email" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
			<div class="col-6 col-12-xsmall">
				<label for="newpassword">New Password</label>
				<input type="password" name="newpassword" id="newpassword" placeholder="new password" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
			<div class="col-6 col-12-xsmall">
				<label for="confirmpassword">Confirm New Password</label>
				<input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm new password" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
			<div class="col-6 col-12-xsmall align-center">
				<input type="submit" name="create" value="Create New Admin" class="primary" />
			</div>
			<div class="col-6 col-12-xsmall"></div>
		</div>
	</form>
</section>

<?php
	$flexaction['page_javascript'] .= "
		$('#AdminCreateForm').validate({
			rules: {
				email: 'required',
				newpassword: {
					required: true,
					minlength: 15,
					notEqualTo: '#email'
				},
				confirmpassword: {
					required: true,
					minlength: 15,
					equalTo: '#newpassword'
				}
			},
			messages: {
				currentpassword: 'Please enter your email',
				newpassword: {
					required: 'Please provide a new password',
					minlength: 'The new password must be at least 15 characters long',
					notEqualTo: 'The new password cannot be the same as the current password'
				},
				confirmpassword: {
					required: 'Please confirm the new password',
					equalTo: 'Please enter the same password as above'
				}
			}
		});
	";
?>