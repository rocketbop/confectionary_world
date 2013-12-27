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
		<div class="span12 center">
			<h1>Meet Our Makers</h1>
			<p>The manufacturers currently making our products</p>
		</div>
	</div>
	<div class="row">
		<div class="span12 clear">

<?php 

$sqlQuery = "SELECT * FROM `mfs`"; // Get everything from mfs db PB 26 12 2013
$result = mysql_query($sqlQuery);

if ($result) {
	$htmlString	= ""; // Cast as a string PB 26 12 2013
	$htmlString .= "<table class='table table-bordered table-condensed table-striped' border='1'>\n";
	$htmlString .= "<tr>";
	$htmlString .= "<th>Manufacturer ID</th>";
	$htmlString .= "<th>Manufacturer Name</th>";
	$htmlString .= "<th>Action</th>";
	$htmlString .= "</tr>";

	while ($manufacturers = mysql_fetch_assoc($result)) {
		$htmlString .=  "<tr>" ;
		$htmlString .=  "<td>";
		$htmlString .= $manufacturers["mf_id"];
		$htmlString .=  "</td>";
		$htmlString .=  "<td>";
		$htmlString .= $manufacturers["mf_title"];
		$htmlString .=  "</td>";
		$htmlString .=  "<td>";
		$htmlString .=  output_delete_link($manufacturers["mf_id"], 'mf_id', 'mfs');
		$htmlString .=  "</td>";
		$htmlString .=  "</tr>"; //Closed table row PB 27 12 2013
	}
	$htmlString .= "</table>"; //Close table PB 27 12 2013
}
echo $htmlString;

$manufacturer = array();
$manufacturer['mf_id'] = 0;
$manufacturer['mf_title']= "";

if (!empty($_POST)) {
	
	$manufacturer = array();
	$manufacturer['mf_title'] = htmlspecialchars(strip_tags($_POST["mf_title"]));          
    $manufacturer['mf_id'] = isset($_POST["mf_id"]) ? (int) $_POST["mf_id"] : 0;
        
	$flashMessage = "";
	if (validateManufacturer($manufacturer)) {
		if ($manufacturer['mf_id'] == 0) {         
			$mf_id = saveManufacturer($manufacturer);

			$flashMessage = "Record has been saved";
        }
	}
}//end post

?>
<?php 
$activeManufacturers = "active"; // Typo PB 27 12 2013
$buttonLabel = "Add Manufacturer";
//include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/manufacturer_form_insert.html");
include (TEMPLATE_PATH . "/footer.html");
?>