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
	 *  this file should be where session start up stuff is done
	 *  it can be left out as well
	 */

	session_start();
	$flexaction['page_javascript'] = "";
	$flexaction['page_js_files'] = "";
	$flexaction['SessionID_length'] = 128;
	$flexaction['cryptostrong'] = true;
// echo '<pre>';
// $password = 'thisisabadpassword';
// var_dump($password);
// $salt = hash('sha512',bin2hex(openssl_random_pseudo_bytes($flexaction['SessionID_length'], $flexaction['cryptostrong'])));
// var_dump($salt);
// $hash_password = hash('sha512',$password.$salt);
// var_dump($hash_password);
// die();
	$flexaction['SessionID'] = 'LID';
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		$flexaction['HTTPS'] = false;
	}
	else {
		$flexaction['HTTPS'] = true;
	}
	// unset($_SESSION[$flexaction['SessionID']]);

	//figuring out the proper session ID
	if(!isset($_SESSION[$flexaction['SessionID']]) && !isset($_COOKIE[$flexaction['SessionID']])) {
		$_SESSION[$flexaction['SessionID']] = bin2hex(openssl_random_pseudo_bytes($flexaction['SessionID_length'], $flexaction['cryptostrong']));
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

	// Create connection
	include 'inc_mysql_settings.php';
	$flexaction['dbconnection'] = new mysqli($mysql['serverport'], $mysql['username'], $mysql['pass'], $mysql['dbname']);

	// Check connection
	if ($flexaction['dbconnection']->connect_error) {die("Datbase connection failed.");}

	// Get Session Cache
	$SessionCacheGet = $flexaction['dbconnection']->query("
			SELECT Session_Data, Hashed_Session_ID, Users_PK
			FROM Session_Cache
			WHERE Hashed_Session_ID = '" . hash('sha512',$_SESSION[$flexaction['SessionID']]) . "'
		");

	if ($SessionCacheGet->num_rows == 1){
		$flexaction['session'] = json_decode($SessionCacheGet->fetch_assoc()['Session_Data'],true);
	}

	if (!isset($flexaction['session']) || !isset($flexaction['session']["User"]["PK"])) {
		if($flexaction['function'] != "elements") {
			$flexaction['function'] = "login";
			$flexaction['action'] = "login";
		}
	}
?>