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
define ( "UPLOAD_PATH",  realpath(dirname(__FILE__)) . "/uploads");

/* Prevent unauthorised access */
include_once(APPLICATION_PATH . "/inc/session.inc.php");

/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");

$product = array();
$product['title'] = "";
$product['description'] = "";
$product['price'] = ""; // Corrected typo PB 22 12 2013
$product['taste'] = "G";
$product['country_id'] = 0; // Added new index (int) PB 27 12 2013
$product['mf_id'] = 0;
$product['movie_id']= 0;

if (!empty($_POST)) {
	// echo "<p> Not empty </p>"; //Check that the above condition satisfied. PB 23 12 2013
	$product = array();
	$product['title'] = htmlspecialchars(strip_tags($_POST["title"]));
	$product['description'] = htmlspecialchars(strip_tags($_POST["description"]));
	$product['price'] = (int) htmlspecialchars(strip_tags($_POST["price"])); // fixed typo in index PB 22 12 2013 included the int function 23 12 2013 PB
	$product['taste'] = htmlspecialchars(strip_tags($_POST["taste"])); // fixed typo in taste PB 22 12 2013
	$product['country_id'] = (int) htmlspecialchars(strip_tags($_POST["country_id"])); //Added new line PB 27 12 2013
	$product['mf_id'] = (int) htmlspecialchars(strip_tags($_POST["mf_id"]));            
    $product['product_id'] = isset($_POST["product_id"]) ? (int) $_POST["product_id"] : 0;
    

	$flashMessage = "";
	if (validateProduct($product)) {
		if ($product['product_id'] == 0) {  
			$product_id = saveProduct($product); //Fixed function name PB 23 12 2013

			/*Used a different condition as $_FILES array will never be empty resulting in 
			uploadFiles being called every time PB 26 12 2013*/
			if ($_FILES['uploadedfile']['error'] == 0) {
				uploadFiles($product_id); //Uncommented as we want to upload file at the same time PB 26 12 2013
			}
			$flashMessage = "Record has been saved";
        }
        // Commented out else statement as will never be called - user can not choose product_id PB 26 12 2013
/*    	else {   
    	 echo "<p>Hello</p>";
            updateMovie($product);
			header("Location: admin.php");
        }*/
	}
	else {
		echo "<p>Please enter all required fields.</p>"; // Added an else statement if posted data fails validation PB 26 12 2013
	}

}//end post
// echo constant("UPLOAD_PATH"); Test PB 26 12 2013 


?>
<?php 
$activeInsert = "active";
$buttonLabel = "Add Confectionary"; // Updated label PB 26 12 2013
include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/form_insert.html");
include (TEMPLATE_PATH . "/footer.html");
?>