<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');

/*
 * Declare a number of constants that you can change depending on your application
 */
define("DB_HOST","localhost");
define("DB_USER","movietutorial");
define("DB_PASSWORD","6tLdk6npdvZYeRTmZHXRHAhNymHXAb");
define("DB_DATABASE","movietutorial");

//live details
/*define("DB_HOST","localhost");
define("DB_USER","Thorn9_confect");
define("DB_PASSWORD","6tLdk6npdvZY");
define("DB_DATABASE","Thorn9_movietutorial");*/

/*
 * Declare a number of constants that you can change depending on your application
*/

define("VERSION_NUMBER","1.0");

define("COMPANY_NAME","Digital Hub");

define("APPLICATION_NAME","WebElevate Confectionary Products");

/*define("UPLOAD_PATH",  realpath(dirname(__FILE__)) . "../../uploads/");*/

define("DOCUMENT_ROOT", "../application/");
//define("UPLOAD_PATH", DOCUMENT_ROOT . "uploads/");
