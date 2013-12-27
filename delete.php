<?php
session_start();
/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
 */
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

/* Prevent unauthorised access */
include_once(APPLICATION_PATH . "/inc/session.inc.php");


/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");

/*if (!empty($_GET) && isset($_GET['id'])) {
   // echo "<p> id is set</p>"; // Check that above conddition fulfilled. PB 23 12 2013
    $product_ID = (int) $_GET['id'];
    deleteRow($product_ID); //renamed function for clarity's sake. PB 23 12 2013
    						
   
}*/

//Rewrote original if statement to be compatible with new DRY function PB 27 12 2013
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['idName']) && isset($_GET['tableName']) ) {
	$id = (int) $_GET['id'];
	$idName = $_GET['idName'];
	$tableName = $_GET['tableName'];
	deleteRow($id, $idName, $tableName);
}
 header("Location: admin.php");
    