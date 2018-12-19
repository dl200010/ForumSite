<?php
	$ErrorMessages = "";
	unset($flexaction['session']);
	if (isset($_POST["email"]) && $_POST["email"] != "" && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$GetUserData = $flexaction['dbconnection']->query("
				SELECT *
				FROM users
				WHERE email = '" . $flexaction['dbconnection']->real_escape_string($_POST["email"]) . "'
		");
		if ($GetUserData->num_rows != 1){
			$ErrorMessages .= "|Email or password not found";
		}
		else {
			$GetUserData = $GetUserData->fetch_assoc();
		}
	}
	else {
		$ErrorMessages .= "|Email is invalid";
	}

	if ($ErrorMessages == "") {
		$hash_password = hash('sha512',$_POST["password"].$GetUserData['salt1']);
		if ($hash_password == $GetUserData['password1']) {
			$flexaction['session']["User"]["PK"] = $GetUserData['Users_PK'];
			$flexaction['session']["User"]["email"] = $GetUserData['email'];
			$flexaction['session']["User"]["AdminType"] = $GetUserData['AdminType'];
			if (preg_replace("/^(.*?)\.(.*?)$/","$1",$_GET['action']) == 'login') {
				$login_redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]" . "?action=" . $flexaction['empty_action'];
				$flexaction['page_javascript'] .= "window.location.replace('" . $login_redirect . "');";
			}
			else {
				$flexaction['page_javascript'] .= "window.location.replace('" . $_SERVER["HTTP_REFERER"] . "');";
			}
		}
	}

	include $flexaction['root_path'].'/inc_error_messages.php';
?>