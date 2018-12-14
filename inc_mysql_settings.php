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
	 *	Need an INI file located anywhere outside the wwwroot.
	 *  Change the path below if need be.
	 *  Using the same format as php.ini. Example:
	 *		serverport = "localhost:3306"
	 *		username = "username"
	 *		pass = "password"
	 *		dbname = "databasename"
	 */

	$mysql = parse_ini_file("C:\inetpub\forumsite_mysql.ini");
?>