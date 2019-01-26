<?php
	/*
	 *  Copyright 2019 DL200010 <DL200010@gmail.com>
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

	//get the path that this file is in because everything else will deal off of this path.
	$flexaction['root_path'] = dirname(__FILE__).'/';

	if(file_exists($flexaction['root_path'].'/flx_config.php')) {
		//include variables that are needed for flexaction
		include $flexaction['root_path'].'/flx_config.php';
	}
	else {
		echo "Error Processing Request, config file not found.";
		die();
	}

	$flexaction['gotoEmptyAction'] = function () {
		//get link to redirect to with the url parameter of 'action' and redirect back to self with
		global $flexaction;
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";
		header("Location: " . $actual_link . "?action=" . $flexaction['empty_action']);
		die();
	};

	//check to see if the action exists and that it contains a period
	if(isset($_GET['action']) && strpos($_GET['action'],".") !== false)
	{
		//grab the function and action
		$flexaction['function'] = preg_replace("/^(.*?)\.(.*?)$/","$1",$_GET['action']);
		$flexaction['action'] = preg_replace("/^(.*?)\.(.*?)$/","$2",$_GET['action']);
	}
	else {
		$flexaction['gotoEmptyAction']();
	}

	//file used to setup session if it exists
	if(file_exists($flexaction['root_path']."/flx_session.php")) {
		include $flexaction['root_path']."/flx_session.php";
	}

	//include the root settings if it exists
	if(file_exists($flexaction['root_path'].'/flx_settings.php')) {
		include $flexaction['root_path'].'/flx_settings.php';
	}

	//include root functions throw error when it does not exist
	$flexaction['function_folder'] = "/" . $flexaction['function'] . "/" ;
	if(file_exists($flexaction['root_path'].'/flx_functions.php')) {
		include $flexaction['root_path'].'/flx_functions.php';
	}

	//throw exception if the function being requested does not exist
	if	(
			$flexaction['function_folder'] !== '/' &&
			(!file_exists($flexaction['root_path'].$flexaction['function_folder']))
		) {
		echo "Error Processing Request, function not found.";
		die();
	}

	//get the actions variable
	$flexaction['action_file'] = "dsp_" . $flexaction['action'] . ".php" ;
	if(file_exists($flexaction['root_path'].$flexaction['function_folder']."flx_actions.php")) {
		include $flexaction['root_path'].$flexaction['function_folder']."flx_actions.php";
	}

	//throw exception if the function being requested does not exist
	if	(!file_exists($flexaction['root_path'].$flexaction['function_folder'].$flexaction['action_file'])) {
		echo "Error Processing Request, action not found.";
		die();
	}

	//include the function settings if it exists
	if(file_exists($flexaction['root_path'].$flexaction['function_folder'].'flx_settings.php')) {
		include $flexaction['root_path'].$flexaction['function_folder'].'flx_settings.php';
	}

	$flexaction['menu_display'] = "";
	//include root functions throw error when it does not exist
	if(file_exists($flexaction['root_path'].$flexaction['menu_file'])) {
		ob_start();
		include $flexaction['root_path'].$flexaction['menu_file'];
		$flexaction['menu_display'] = ob_get_clean();
	}

	//go out and get content and save it to a variable
	ob_start();
	include $flexaction['root_path'].$flexaction['function_folder'].$flexaction['action_file'];
	$flexaction['page_display'] = ob_get_clean();

	//last file to run before displaying and finishing used to save variables before finishing
	if(file_exists($flexaction['root_path']."/flx_complete.php")) {
		include $flexaction['root_path']."/flx_complete.php";
	}

	//go out and get content and save it to a variable
	if(file_exists($flexaction['root_path'].$flexaction['layout_file'])) {
		ob_start();
		include $flexaction['root_path'].$flexaction['layout_file'];
		echo ob_get_clean();
	}
	else {
		echo "Error Processing Request, layout file not found.";
		die();
	}
?>