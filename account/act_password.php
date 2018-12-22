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

	$ErrorMessages = "";
	$GetUserData = $flexaction['dbconnection']->query("
			SELECT Users_PK, password1, salt1, password2, salt2, password3, salt3, password4, salt4, password5, salt5
			FROM users
			WHERE Users_PK = {$flexaction['session']["User"]["PK"]}
	");

	if ($GetUserData->num_rows == 1){
		$GetUserData = $GetUserData->fetch_assoc();
		$CurrentPasswordHash = $flexaction['PasswordHash']($_POST["currentpassword"],$GetUserData['salt1']);
		if ($CurrentPasswordHash == $GetUserData['password1']) {
			if ($_POST["newpassword"] == $_POST["confirmpassword"]) {
				for ($i = 1; $i <= 5; $i++) {
					if($GetUserData['password'.$i] != ""){
						$CheckOldPasswordHash = $flexaction['PasswordHash']($_POST["newpassword"],$GetUserData['salt'.$i]);
						if($CheckOldPasswordHash == $GetUserData['password'.$i]){
							$ErrorMessages .= "|Cannot use the current or the prior 5 passwords";
							$i = 50;
						}
					}
				}

				if ($ErrorMessages == "") {
					if (strlen($_POST["newpassword"]) >= 8) {
						if (preg_match("/[A-Z]+/",$_POST["newpassword"]) && preg_match("/[a-z]+/",$_POST["newpassword"]) && preg_match("/[0-9]+/",$_POST["newpassword"])) {
							$NewSalt = $flexaction['NewSalt']();
							$NewPasswordHash = $flexaction['PasswordHash']($_POST["newpassword"],$NewSalt);

							// $SessionCacheSave = $flexaction['dbconnection']->query("
							// 		UPDATE users
							// 		SET Users_PK, password1, salt1, password2, salt2, password3, salt3, password4, salt4, password5, salt5
							// 		WHERE Users_PK = '{$flexaction['session']["User"]["PK"]}'
							// 	");

							// if ($flexaction['dbconnection']->affected_rows == 0) {
							// 	$ErrorMessages .= "|Password failed to update";
							// }
							// else {}
						}
						else {
							$ErrorMessages .= "|The new password must have at least one upper case letter, one lower case letter, and one number, " .
												"but it is suggested to use special characters as well.";
						}
					}
					else {
						$ErrorMessages .= "|The new password must be at least 8 characters long";
					}
				}
			}
			else {
				$ErrorMessages .= "|New password and confirmation password do not match";
			}
		}
		else {
			$ErrorMessages .= "|Current password is invalid";
		}
	}
	else {
		$ErrorMessages .= "|User not found";
	}
	include $flexaction['root_path'].'/inc_error_messages.php';
?>