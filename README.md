PHP Forum site. Requires PHP 7.3.0


   Copyright 2019 DL200010 <DL200010@gmail.com>

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.

------------------------------------------------------------------------------------

The layout (modified) of the website is released under The Creative Commons Attribution 3.0 License.
(design.LICENSE.txt)

Editorial by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)


Say hello to Editorial, a blog/magazine-ish template built around a toggleable "locking"
sidebar (scroll down to see what I mean) and an accordion-style menu. Not the usual landing
page/portfolio affair you'd expect to see at HTML5 UP, but I figured for my 41st (!!!)
template I'd change it up a little. Enjoy :)

Demo images* courtesy of Unsplash, a radtastic collection of CC0 (public domain) images
you can use for pretty much whatever.

(* = not included)

AJ
aj@lkn.io | @ajlkn


Credits:

   Demo Images:
      Unsplash (unsplash.com)

   Icons:
      Font Awesome (fontawesome.io)

   Other:
      jQuery (jquery.com)
      Responsive Tools (github.com/ajlkn/responsive-tools)


----------------------------------------------------------------------------
Install
----------------------------------------------------------------------------

Have PHP 7.3.0 installed.
Have MySQL installed and database set up.
Have 'index.php' a default document on the website
Copy all files into root of website.
Open /inc_mysql_settings.php and create the ini file listed there and modify
      inc file to point to the right folder outside of the website root
      directly. (currently at 'c:\inetpub\')
Go to login in a browser ON the server that is running the PHP.
This is needed because to create an admin user, you need to come from 127.0.0.1
Log in as "admin@admin.com" using password "admin"
You will be redirected to an admin creation page.
This page will no longer work once any accounts exist in the database.
It does not validate that the email you are entering is a real email,
      just that it follows the standard.
Now log in as the just create admin.