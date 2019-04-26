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
	$flexaction['Authorized']();

	switch ($flexaction['action']) {
		case 'changepassword':
			$flexaction['action_model'] = "changepassword";
			$flexaction['action_view'] = "changepassword";
			break;
		case 'manageaccount':
			$flexaction['action_view'] = "manageaccount";
			break;
		default:
			//default return "404" to throw a HTTP 404 error
			$flexaction['action_view'] = "404";
			break;
	}
?>