<?php
	unset($flexaction['session']);
	$login_redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]" . "?action=" . $flexaction['empty_action'];
	$flexaction['page_javascript'] .= "window.location.replace('" . $login_redirect . "');";
?>