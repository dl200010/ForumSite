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

	if (isset($_POST["ChangePassword"])) {
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
								$flexaction['LobiboxErrorMessages'] .= "|Cannot use the current or prior passwords";
								$i = 50;
							}
						}
					}

					if ($flexaction['LobiboxErrorMessages'] == "") {
						if (strlen($_POST["newpassword"]) >= $flexaction['PasswordLength']) {
							if (preg_match("/[A-Z]+/",$_POST["newpassword"]) && preg_match("/[a-z]+/",$_POST["newpassword"]) && preg_match("/[0-9]+/",$_POST["newpassword"])) {
								$NewSalt = $flexaction['NewSalt']();
								$NewPasswordHash = $flexaction['PasswordHash']($_POST["newpassword"],$NewSalt);

								$UpdatePassword = $flexaction['dbconnection']->query("
										UPDATE users
										SET
											password5 = password4,
											salt5 = salt4,
											password4 = password3,
											salt4 = salt3,
											password3 = password2,
											salt3 = salt2,
											password2 = password1,
											salt2 = salt1,
											password1 = '{$NewPasswordHash}',
											salt1 = '{$NewSalt}',
											LastPassChgDate = Now()
										WHERE Users_PK = {$flexaction['session']["User"]["PK"]}
									");

								if ($flexaction['dbconnection']->affected_rows == 0) {
									$flexaction['LobiboxErrorMessages'] .= "|Password failed to update";
								}
								else {
									$flexaction['LobiboxSuccessMessages'] .= "|Password updated successfully";
								}
							}
							else {
								$flexaction['LobiboxErrorMessages'] .= "|The new password must have at least one upper case letter, one lower case letter, and one number, " .
													"but it is suggested to use special characters as well.";
							}
						}
						else {
							$flexaction['LobiboxErrorMessages'] .= "|The new password must be at least ".$flexaction['PasswordLength']." characters long";
						}
					}
				}
				else {
					$flexaction['LobiboxErrorMessages'] .= "|New password and confirmation password do not match";
				}
			}
			else {
				$flexaction['LobiboxErrorMessages'] .= "|Current password is invalid";
			}
		}
		else {
			$flexaction['LobiboxErrorMessages'] .= "|User not found";
		}
	}
?>