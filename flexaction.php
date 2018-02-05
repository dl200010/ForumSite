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

	//get the path that this file is in because everything else will deal off of this path.
	$flexaction['flx_root_path'] = dirname(__FILE__);
	if(file_exists('flx_config.php')) {
		//include variables that are needed for flexaction
		include 'flx_config.php';
	}
	else {
		echo "Error Processing Request, config file not found.";
		die();
	}

	//check to see if the action exists and that it contains a period
	if(isset($_GET['action']) && strpos($_GET['action'],".") !== false)
	{
		//grab the function and action
		$flexaction['function'] = preg_replace("/^(.*?)\.(.*?)$/","$1",$_GET['action']);
		$flexaction['action'] = preg_replace("/^(.*?)\.(.*?)$/","$2",$_GET['action']);
	}
	else {
		//get link to redirect to with the url parameter of 'action' and redirect back to self with
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";
		header("Location: " . $actual_link . "?action=" . $flexaction['flx_action_empty']);
		die();
	}

	//include root functions throw error when it does not exist
	if(file_exists('flx_functions.php')) {
		include 'flx_functions.php';
	}
	else {
		echo "Error Processing Request, functions file not found.";
		die();
	}

	//include the root settings if it exists
	if(file_exists('flx_settings.php')) {
		include 'flx_settings.php';
	}

	//throw exception if the function being requested does not exist
	if	(
			(!isset($flexaction['functions'][$flexaction['function']])) ||
			(
				$flexaction['functions'][$flexaction['function']] !== '/' &&
				(!file_exists($flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']]))
			)
		) {
		echo "Error Processing Request, function not found.";
		die();
	}

	//get the actions variable
	if(file_exists($flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']]."flx_actions.php")) {
		include $flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']]."flx_actions.php";
	}
	else {
		echo "Error Processing Request, actions file not found.";
		die();
	}

	//throw exception if the function being requested does not exist
	if	(
			(!isset($flexaction['actions'][$flexaction['action']])) ||
			(!file_exists($flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']].$flexaction['actions'][$flexaction['action']]))
		) {
		echo "Error Processing Request, action not found.";
		die();
	}

	//include root functions throw error when it does not exist
	if(file_exists('flx_menu.php')) {
		ob_start();
		include 'flx_menu.php';
		$flexaction['menu'] = ob_get_clean();
	}
	else {
		echo "Error Processing Request, menu file not found.";
		die();
	}

	//include the function settings if it exists
	if(file_exists($flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']].'flx_settings.php')) {
		include $flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']].'flx_settings.php';
	}

	//go out and get content and save it to a variable
	if(file_exists($flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']].$flexaction['actions'][$flexaction['action']])) {
		ob_start();
		include $flexaction['flx_root_path'].$flexaction['functions'][$flexaction['function']].$flexaction['actions'][$flexaction['action']];
		$flexaction['layout'] = ob_get_clean();
	}
	else {
		echo "Error Processing Request, action file not found.";
		die();
	}

	//go out and get content and save it to a variable
	if(file_exists('flx_layout.php')) {
		ob_start();
		include 'flx_layout.php';
		$totalpage = ob_get_clean();
	}
	else {
		echo "Error Processing Request, layout file not found.";
		die();
	}

	//display already built page
	echo $totalpage;
?>