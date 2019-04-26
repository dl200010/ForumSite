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

	// get the path that this file is in because everything else will deal off of this path.
	$flexaction['root_path'] = dirname(__FILE__).'/';

	// setting the layout to the default. change this inside flx_global_vars or the controller
	$flexaction['layout'] = '_layout';

	// setting for empty action default
	$flexaction['empty_action'] = "home.home";

	// now this is not required, but can be changed by adding this file to change the empty action
	if(file_exists($flexaction['root_path'].'/flx_config.php')) {
		// include variables that are needed for flexaction
		include $flexaction['root_path'].'/flx_config.php';
	}

	// Indicator if the session was started
	$flexaction['SessionStartedUp'] = false;

	$flexaction['GotoEmptyAction'] = function () {
		// get link to redirect to with the url parameter of 'action' and redirect back to self with
		global $flexaction;
		$flexaction['SessionEnd']();
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		header("Location: " . $actual_link . "?action=" . $flexaction['empty_action']);
		die();
	};

	$flexaction['SessionStart'] = function () {
		global $flexaction;
		// file used to setup session if it exists
		if(!$flexaction['SessionStartedUp'] && file_exists($flexaction['root_path']."/flx_session_start.php")) {
			include $flexaction['root_path']."/flx_session_start.php";
			$flexaction['SessionStartedUp'] = true;
		}
	};

	$flexaction['SessionEnd'] = function () {
		global $flexaction;
		// last file to run before displaying and finishing used to save variables before finishing
		if($flexaction['SessionStartedUp'] && file_exists($flexaction['root_path']."/flx_session_end.php")) {
			include $flexaction['root_path']."/flx_session_end.php";
			$flexaction['SessionStartedUp'] = false;
		}
	};

	// check to see if the action exists and that it contains a period
	if(isset($_GET['action']) && strpos($_GET['action'],".") !== false)
	{
		// grab the controller and action
		$flexaction['controller'] = preg_replace("/^(.*?)\.(.*?)$/","$1",$_GET['action']);
		$flexaction['action'] = preg_replace("/^(.*?)\.(.*?)$/","$2",$_GET['action']);
	}
	else {
		$flexaction['GotoEmptyAction']();
	}

	// Defaulting model and view to nothing
	$flexaction['action_model'] = "";
	$flexaction['action_view'] = "";

	// Start Session
	$flexaction['SessionStart']();

	// include the flx_middleware, if it exists
	if(file_exists($flexaction['root_path'].'/flx_middleware.php')) {
		include $flexaction['root_path'].'/flx_middleware.php';
	}

	// grab the controller and error out if it does not exist
	if(file_exists($flexaction['root_path'].'/controllers/'.$flexaction['controller'].'.Controller.php')) {
		include $flexaction['root_path'].'/controllers/'.$flexaction['controller'].'.Controller.php';
	}
	else {
		// throw a 404 when controller is not found
		$flexaction['SessionEnd']();
		http_response_code(404);
		die();
	}

	if	(file_exists($flexaction['root_path'].'/models/'.$flexaction['controller'].'/'.$flexaction['action_model'].'.php')) {
		// Including the model set in Controller
		include $flexaction['root_path'].'/models/'.$flexaction['controller'].'/'.$flexaction['action_model'].'.php';
	}

	$flexaction['page_display'] = "";
	if	(file_exists($flexaction['root_path'].'/views/'.$flexaction['controller'].'/'.$flexaction['action_view'].'.HTML.php')) {
		// go out and get content of the view and save it to a variable
		ob_start();
		include $flexaction['root_path'].'/views/'.$flexaction['controller'].'/'.$flexaction['action_view'].'.HTML.php';
		$flexaction['page_display'] = ob_get_clean();
	}
	else if ($flexaction['action_view'] == "404")
	{
		// throw a 404 when the action_view is 404
		$flexaction['SessionEnd']();
		http_response_code(404);
		die();
	}

	// End Session
	$flexaction['SessionEnd']();

	if ($flexaction['layout'] == "none")
	{
		// dump display data if there is no layout file
		echo $flexaction['page_display'];
	}
	else if(file_exists($flexaction['root_path'].'/views/shared/'.$flexaction['layout'].'.HTML.php')) {
		// go out and get content and save it to a variable
		ob_start();
		include $flexaction['root_path'].'/views/shared/'.$flexaction['layout'].'.HTML.php';
		echo ob_get_clean();
	}
	else if(file_exists($flexaction['root_path'].$flexaction['layout'])) {
		// go out and get content and save it to a variable
		// allow full patth layout
		ob_start();
		include $flexaction['root_path'].$flexaction['layout'];
		echo ob_get_clean();
	}
	else {
		//throw a 404 when layout file is not found
		$flexaction['SessionEnd']();
		http_response_code(404);
		die();
	}
?>