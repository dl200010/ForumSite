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

	/*
	 *  use this file to add middleware code
	 *  this file loads just after the session creation
	 *  it can be left out as well
	 */

	// password hashing function
	$flexaction['PasswordHash'] = function ($Password,$Salt) {
		return hash('sha512',$Password.$Salt);
	};

	// salt generation function
	$flexaction['NewSalt'] = function(){
		global $flexaction;
		return hash('sha512',bin2hex(openssl_random_pseudo_bytes($flexaction['SessionID_length'], $flexaction['cryptostrong'])));
	};

	// forced password length depending on user type
	if (isset($flexaction['session']["User"]["AdminType"]) && $flexaction['session']["User"]["AdminType"] == "Admin") {
		$flexaction['PasswordLength'] = 15;
	}
	else {
		$flexaction['PasswordLength'] = 8;
	}

	$flexaction['AllowedUserProfileFieldTypes'] = "Text|Date";
?>