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
	 *  Need an INI file located anywhere outside the wwwroot.
	 *  Change the path below if need be.
	 *  File name below shows using the host name just before the domain
	 *  as part of the file name.
	 *  "this.domain.com" becomes "this_mysql.ini"
	 *  "this.is.a.host.domain.com" becomes "this.is.a.host_mysql.ini"
	 *  Using the same format as php.ini. Example:
	 *  	serverport = "localhost:3306"
	 *  	username = "username"
	 *  	pass = "password"
	 *  	dbname = "databasename"
	 */

	// Change this to the folder that holds the INI file with the database credentials.
	$FolderToINI = "c:/inetpub/";


	$URL_HostName = preg_replace ('/^([a-z0-9\.]+?)\.[^\.]*?\.[^\.]+$/', "$1", strtolower($_SERVER["HTTP_HOST"]));
	$mysql = parse_ini_file($FolderToINI.$URL_HostName."_mysql.ini");
?>