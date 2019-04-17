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
	if (isset($_POST["create"])) {
		$ErrorMessages = "";

		$GetUserData = $flexaction['dbconnection']->query("SELECT Users_PK FROM users");

		if ($GetUserData->num_rows == 0){
			if (isset($_POST["email"]) && $_POST["email"] != "" && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				if ($_POST["newpassword"] == $_POST["confirmpassword"]) {
					if (strlen($_POST["newpassword"]) >= 15) {
						if (preg_match("/[A-Z]+/",$_POST["newpassword"]) && preg_match("/[a-z]+/",$_POST["newpassword"]) && preg_match("/[0-9]+/",$_POST["newpassword"])) {
							$NewSalt = $flexaction['NewSalt']();
							$NewPasswordHash = $flexaction['PasswordHash']($_POST["newpassword"],$NewSalt);

							$InsertPassword = $flexaction['dbconnection']->query("
									INSERT INTO users
									(email,password1,salt1,AdminType)
									VALUES
									(
										'{$_POST["email"]}',
										'{$NewPasswordHash}',
										'{$NewSalt}',
										'Admin'
									)
								");

							if ($flexaction['dbconnection']->affected_rows == 0) {
								$ErrorMessages .= "|Account creation failed";
							}
							else {
								$flexaction['gotoEmptyAction']();
							}
						}
						else {
							$ErrorMessages .= "|The new password must have at least one upper case letter, one lower case letter, and one number, " .
												"but it is suggested to use special characters as well.";
						}
					}
					else {
						$ErrorMessages .= "|The new password must be at least 15 characters long";
					}
				}
				else {
					$ErrorMessages .= "|New password and confirmation password do not match";
				}
			}
			else {
				$ErrorMessages .= "|Email is invalid";
			}
		}
		else {
			$flexaction['gotoEmptyAction']();
		}
		include $flexaction['root_path'].'/inc_error_messages.php';
	}

	include 'createadmin_v.php';
?>