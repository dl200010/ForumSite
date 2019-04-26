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

	// This is a controller for MVC
	// This is also where variables for this controller can be added, before the switch
	if ($flexaction['action'] != "createadmin") {
		$flexaction['Authorized']("Admin");
	}

	switch ($flexaction['action']) {
		case 'createadmin':
			if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
				$flexaction['gotoEmptyAction']();
			}
			$flexaction['page_javascript'] .= "
				$('#sidebar').hide();
				$('#sidebarCollapse').hide();
			";
			$flexaction['action_model'] = "createadmin";
			$flexaction['action_view'] = "createadmin";
			break;
		case 'edituser':
			$flexaction['action_view'] = "edituser";
			break;
		case 'manageuserprofile':
			$flexaction['action_model'] = "manageuserprofile";
			$flexaction['action_view'] = "manageuserprofile";
			break;
		case 'manageusers':
			$flexaction['action_model'] = "manageusers";
			$flexaction['action_view'] = "manageusers";
			break;
		default:
			//default return "404" to throw a HTTP 404 error
			$flexaction['action_view'] = "404";
			break;
	}
?>