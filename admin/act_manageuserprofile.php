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
	$SuccessMessages = "";

	if (isset($_POST["Save"])) {
		if (isset($_POST["delete"]) && preg_match('/^([0-9][0-9,]*?[0-9]|[0-9])$/',$_POST["delete"])) {
			$DeleteAnswers = $flexaction['dbconnection']->query("
				DELETE FROM user_profile_answers
				WHERE profile_fields_PK IN ({$flexaction['dbconnection']->real_escape_string($_POST["delete"])})
			");
			$DeleteRows = $flexaction['dbconnection']->query("
				DELETE FROM profile_fields
				WHERE profile_fields_PK IN ({$flexaction['dbconnection']->real_escape_string($_POST["delete"])})
			");
		}

		if (isset($_POST["fieldid"]) && preg_match('/^([0-9][0-9,]*?[0-9]|[0-9])$/',$_POST["fieldid"])) {
		}

		if (isset($_POST["newfieldname"]) && $_POST["newfieldname"] != "" && isset($_POST["newfieldtype"]) && $_POST["newfieldtype"] != "") {
		}
	}

	$ProfileFormFields = $flexaction['dbconnection']->query("SELECT * FROM profile_fields");

	include $flexaction['root_path'].'/inc_error_messages.php';
	include $flexaction['root_path'].'/inc_success_messages.php';
?>