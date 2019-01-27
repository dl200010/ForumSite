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
	 *  this file should be where session clean up and/or value caching should be done
	 *  it can be left out as well
	 */
	// Save Session Cache
	if (isset($flexaction['session']) && is_array($flexaction['session'])) {
		$SessionJSON = json_encode($flexaction['session']);
		$SessionCacheSave = $flexaction['dbconnection']->query("
				UPDATE Session_Cache
				SET Session_Data = '{$SessionJSON}'
				WHERE Hashed_Session_ID = '{$flexaction['SessionIDHash']}'
			");

		if ($flexaction['dbconnection']->affected_rows == 0) {
			$SessionCacheSave = $flexaction['dbconnection']->query("
					INSERT INTO Session_Cache
					(Session_Data, Hashed_Session_ID, Users_PK)
					VALUES
					(
						'{$SessionJSON}',
						'{$flexaction['SessionIDHash']}',
						'{$flexaction["session"]["User"]["PK"]}'
					)
				");
		}
	}
	else {
		$SessionCacheDelete = $flexaction['dbconnection']->query("
				DELETE FROM Session_Cache
				WHERE Hashed_Session_ID = '{$flexaction['SessionIDHash']}'
			");
	}
	$flexaction['dbconnection']->close();
?>