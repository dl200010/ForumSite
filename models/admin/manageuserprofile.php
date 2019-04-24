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

	if (isset($_POST["Save"])) {
		if (isset($_POST["delete"])) {
			foreach($_POST["delete"] as $item) {
				if (is_numeric($item)) {
					$DeleteAnswers = $flexaction['dbconnection']->query("
						DELETE FROM user_profile_answers
						WHERE profile_fields_PK = {$item}
					");
					$DeleteRows = $flexaction['dbconnection']->query("
						DELETE FROM profile_fields
						WHERE profile_fields_PK = {$item}
					");
				}
			}
		}

		if (isset($_POST["fieldid"])) {
			foreach($_POST["fieldid"] as $item) {
				if (is_numeric($item)) {
					if (
							isset($_POST["fieldname_".$item]) && $_POST["fieldname_".$item] != "" &&
							preg_match("/[']/",$_POST["fieldname_".$item]) !== true &&
							isset($_POST["fieldtype_".$item]) &&
							strpos("|".$flexaction['AllowedUserProfileFieldTypes']."|","|".$_POST["fieldtype_".$item]."|") !== false
						) {
						$UpdateRow = $flexaction['dbconnection']->query("
							UPDATE profile_fields
							SET
								name = '{$flexaction['dbconnection']->real_escape_string($_POST["fieldname_".$item])}',
								type = '{$flexaction['dbconnection']->real_escape_string($_POST["fieldtype_".$item])}'
							WHERE profile_fields_PK = {$item}
						");
					}
				}
			}
		}

		if (
				isset($_POST["newfieldname"]) && $_POST["newfieldname"] != "" &&
				preg_match("/[']/",$_POST["newfieldname"]) !== true &&
				isset($_POST["newfieldtype"]) &&
				strpos("|".$flexaction['AllowedUserProfileFieldTypes']."|","|".$_POST["newfieldtype"]."|") !== false
			) {
			$NewRow = $flexaction['dbconnection']->query("
				INSERT INTO profile_fields
				(name,type)
				VALUES
				(
					'{$flexaction['dbconnection']->real_escape_string($_POST["newfieldname"])}',
					'{$flexaction['dbconnection']->real_escape_string($_POST["newfieldtype"])}'
				)
			");
		}
	}

	$flexaction['model']['ProfileFormFields'] = $flexaction['dbconnection']->query("SELECT * FROM profile_fields");
?>