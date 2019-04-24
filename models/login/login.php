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
	if (isset($_POST["Login"])) {
		if (
				$_SERVER['REMOTE_ADDR'] == '127.0.0.1' &&
				isset($_POST["email"]) && $_POST["email"] == "admin@admin.com" &&
				isset($_POST["password"]) && $_POST["password"] == "admin"
			) {
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";
			header("Location: " . $actual_link . "?action=admin.createadmin");
			die();
		}

		unset($flexaction['session']);
		if (isset($_POST["email"]) && $_POST["email"] != "" && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$GetUserData = $flexaction['dbconnection']->query("
					SELECT email, password1, salt1, Users_PK, AdminType
					FROM users
					WHERE email = '{$flexaction['dbconnection']->real_escape_string($_POST["email"])}'
			");
			if ($GetUserData->num_rows != 1){
				$flexaction['LobiboxErrorMessages'] .= "|Email or password not found";
			}
			else {
				$GetUserData = $GetUserData->fetch_assoc();
			}
		}
		else {
			$flexaction['LobiboxErrorMessages'] .= "|Email is invalid";
		}

		if ($flexaction['LobiboxErrorMessages'] == "") {
			$hash_password = $flexaction['PasswordHash']($_POST["password"],$GetUserData['salt1']);
			if ($hash_password == $GetUserData['password1']) {
				$flexaction['session']["User"]["PK"] = $GetUserData['Users_PK'];
				$flexaction['session']["User"]["email"] = $GetUserData['email'];
				$flexaction['session']["User"]["AdminType"] = $GetUserData['AdminType'];
				if (preg_replace("/^(.*?)\.(.*?)$/","$1",$_GET['action']) == 'login') {
					$login_redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]" . "?action=" . $flexaction['empty_action'];
					$flexaction['page_javascript'] .= "window.location.replace('" . $login_redirect . "');";
					$flexaction['action_view'] = "none";
				}
				else {
					$flexaction['page_javascript'] .= "window.location.replace('" . $_SERVER["HTTP_REFERER"] . "');";
				}
			}
			else {
				$flexaction['LobiboxErrorMessages'] .= "|Email or password not found";
			}
		}
	}
?>