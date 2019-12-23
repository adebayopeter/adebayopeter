<?php
	define ("DB_DSN", "mysql:dbname=adebayopeterdb");
	define("DB_USERNAME", "adebayoUser");
	define("DB_PASSWORD", ",vKue^Vo=2@h");
	define("PAGE_SIZE", 5);
	define("TBL_SITES", "sitesprofile");
	define("TBL_USERS", "users");
	define("TBL_CATEGORY", "category");

	//For root relative URLs/web addresses (linking to other pages, images)
	define("BASE_URL","/"); // BASE URL when we need links that the browser would access

	//For absolute paths on the server (including code from other PHP files)
	define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/"); // use ROOT PATH to include code from other php files on the server

	// Define the application constants - Blog Page
	define('DOC_UPLOADPATH_ORIGINAL', 'images/blog_img/img_original/');
	define('DOC_UPLOADPATH_840_451', 'images/blog_img/img_840_451/');
	define('DOC_UPLOADPATH_150_150', 'images/blog_img/img_150_150/');

	// Define the application constants for site_profile/apps image folder - App Page
	define('DOC_UPLOADPATH_SITE_PROFILE_ORIGINAL', 'img/site_img/img_original/');
	define('DOC_UPLOADPATH_SITE_PROFILE_1200_900', 'img/site_img/img_1200_900/');
	define('DOC_UPLOADPATH_SITE_PROFILE_380_250', 'img/site_img/img_380_250/');


	define('DOC_MAXFILESIZE', 527680); 		// 32 KB
	
	ini_set('display_errors', '0');     # don't show any errors...
	error_reporting(E_ALL | E_STRICT);  # ...but do log them