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
include (APPLICATION_PATH . "/inc/queries.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");

$activeManuacturers = "active";
include (TEMPLATE_PATH . "/header.html");

?>

<div class="container">
<div class="row">
<div class="span12">
<h1>Meet Our Makers</h1>
<p>The manufacturers currently making our products</p>
</div>
</div>
<div clas="row">
<div class="span9">

<?php 

$sqlQuery = "SELECT * FROM `mfs`"; // Get everything from mfs db PB 26 12 2013
$result = mysql_query($sqlQuery);



if ($result) {
	$htmlString	= ""; // Cast as a string PB 26 12 2013
	$htmlString .=  "<table class='table table-bordered table-condensed table-striped' border='1'>\n";
	$htmlString .= "<tr>";
	$htmlString .= "<th>Manufacturer ID</th>";
	$htmlString .= "<th>Manufacturer Name</th>";
	$htmlString .= "<th colspan='2'>Actions</th>";
	$htmlString .= "</tr>";

	while ($manufacturers = mysql_fetch_assoc($result)) {
		$htmlString .=  "<tr>" ;
		$htmlString .=  "<td>";
		$htmlString .= $manufacturers["mf_id"];
		$htmlString .=  "</td>";
		$htmlString .=  "<td>";
		$htmlString .= $manufacturers["mf_title"];
		$htmlString .=  "</td>";


	}

}
echo $htmlString;










$product = array();
$product['mf_id'] = 0;
$product['movie_id']= 0;

if (!empty($_POST)) {
	
	// echo "<p> Not empty </p>"; //Check that the above condition satisfied. PB 23 12 2013
	$product = array();
	$product['title'] = htmlspecialchars(strip_tags($_POST["title"]));
	$product['description'] = htmlspecialchars(strip_tags($_POST["description"]));
	$product['price'] = (int) htmlspecialchars(strip_tags($_POST["price"])); // fixed typo in index PB 22 12 2013 included the int function 23 12 2013 PB
	$product['taste'] = htmlspecialchars(strip_tags($_POST["taste"])); // fixed typo in taste PB 22 12 2013
	$product['mf_id'] = (int) htmlspecialchars(strip_tags($_POST["mf_id"]));            
    $product['product_id'] = isset($_POST["product_id"]) ? (int) $_POST["product_id"] : 0;
        
	$flashMessage = "";
	if (validateProduct($product)) {
		if ($product['product_id'] == 0) {
	        // New! Save Movie returns the id of the record inserted         
			$product_id = saveProduct($product); //Fixed function name PB 23 12 2013

			if (!empty($_FILES['uploadedfile'])) {
				uploadFiles($product_id); //Uncommented as we want to upload file at the same time PB 26 12 2013
			}

			$flashMessage = "Record has been saved";
        }
    	else {    
            updateMovie($product);
			header("Location: admin.php");
        }
	}

}//end post
// echo constant("UPLOAD_PATH"); Test PB 26 12 2013 


?>
<?php 
$activeManuacturers = "active";
$buttonLabel = "Insert Movie Record";
include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/form_insert.html");
include (TEMPLATE_PATH . "/footer.html");
?>