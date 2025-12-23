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

<h2>Create Administrator Account</h2>
<form method="post" id="AdminCreateForm">
	<div class="row">
		<div class="col-md-6 col-xs-12 form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="email" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
		<div class="col-md-6 col-xs-12 form-group">
			<label for="newpassword">New Password</label>
			<input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="new password" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
		<div class="col-md-6 col-xs-12 form-group">
			<label for="confirmpassword">Confirm New Password</label>
			<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="confirm new password" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
		<div class="col-md-6 col-xs-12 text-center">
			<input type="submit" name="create" value="Create New Admin" class="btn btn-danger" />
		</div>
		<div class="col-md-6 col-xs-12"></div>
	</div>
</form>

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