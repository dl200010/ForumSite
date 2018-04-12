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

	/*
	 *  use this file to add settings
	 *  this file should be where session stuff is done for the entire site
	 *  it can be left out as well
	 */

	session_start();
	$flexaction['keylength'] = 128;
	$flexaction['cryptostrong'] = true;
	$flexaction['SessionID'] = 'LID';
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		$flexaction['HTTPS'] = false;
	}
	else {
		$flexaction['HTTPS'] = true;
	}
	// unset($_SESSION[$flexaction['SessionID']]);

	if(!isset($_SESSION[$flexaction['SessionID']]) && !isset($_COOKIE[$flexaction['SessionID']])) {
		$_SESSION[$flexaction['SessionID']] = bin2hex(openssl_random_pseudo_bytes($flexaction['keylength'], $flexaction['cryptostrong']));
		setcookie($flexaction['SessionID'], $_SESSION[$flexaction['SessionID']], time()+(86400 * 30), "/", $_SERVER['HTTP_HOST'], $flexaction['HTTPS'], true);
	}
	else if(!isset($_SESSION[$flexaction['SessionID']]) && isset($_COOKIE[$flexaction['SessionID']])) {
		$_SESSION[$flexaction['SessionID']] = $_COOKIE[$flexaction['SessionID']];
	}
	else if(isset($_SESSION[$flexaction['SessionID']]) && !isset($_COOKIE[$flexaction['SessionID']])) {
		setcookie($flexaction['SessionID'], $_SESSION[$flexaction['SessionID']], time()+(86400 * 30), "/", $_SERVER['HTTP_HOST'], $flexaction['HTTPS'], true);
	}
	else if(isset($_SESSION[$flexaction['SessionID']]) && isset($_COOKIE[$flexaction['SessionID']]) && $_SESSION[$flexaction['SessionID']] != $_COOKIE[$flexaction['SessionID']]) {
		$_SESSION[$flexaction['SessionID']] = $_COOKIE[$flexaction['SessionID']];
	}

	//Pull Data into $flexaction['session'] from database
	//hash("sha512",)
	//use the following line for saving and restoring data from database
	//json_decode(json_encode($flexaction),true)
?>