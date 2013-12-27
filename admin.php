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
define ( "UPLOAD_PATH",  '../' . basename(dirname(__FILE__)) . "/uploads"); //Path for uploads PB 26 12 2013
//define ( "UPLOAD_PATH",  $_SERVER["DOCUMENT_ROOT"] . "/uploads");
include_once(APPLICATION_PATH . "/inc/session.inc.php");


/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");

//Set up variable so 'active' class set on navbar link
$activeHome = "active";

include (TEMPLATE_PATH . "/header.html");
//echo UPLOAD_PATH;
?>

<div class="container">
<div class="row">
<div class="span12 center">
<h1>Our Cakes and Treats</h1>
<p>Here are our current items.</p>
</div>
</div>
<div clas="row">
<div class="span12"> <!--Set as full width PB 26 12 2013-->

<?php 

$sqlQuery = "SELECT * FROM `products`";
$result = mysql_query($sqlQuery);

// Query the db and get countries info as need for the table. PB 27 12 2013
$countriesSQLQuery = "SELECT * FROM `countries`";
$countriesResult = mysql_query($countriesSQLQuery);

// Created an array for the countries PB 27 12 2013
$num = mysql_num_rows($countriesResult);
for ($i = 0; $i < $num; $i++) {
	$countriesArray[] = mysql_fetch_assoc($countriesResult);
}
//var_dump($countriesArray);

if ($result) {
	$htmlString = "";
	$htmlString .=  "<table class='table table-bordered table-condensed table-striped' border='1'>\n";
	
	$htmlString .= "<tr>";
	$htmlString .= "<th>ID</th>";
	$htmlString .= "<th>Image</th>"; //Added a column for a thumbnail PB 26 12 2013
	$htmlString .= "<th>Confectionary Item</th>";
	$htmlString .= "<th>Description</th>";
	$htmlString .= "<th>Price (Euro)</th>"; //Amended to euro, and changed column to decimal type in mysql PB 27 12 2013
	$htmlString .= "<th>Taste</th>";
	$htmlString .= "<th>Country of origin</th>";
	$htmlString .= "<th colspan='2'>Actions</th>";

	$htmlString .= "</tr>";
	
	while ($product = mysql_fetch_assoc($result)) //for every row in the $result resource
	{
		$htmlString .=  "<tr>" ;
		$htmlString .=  "<td>";
		$htmlString .=  $product["product_id"];
		$htmlString .=  "</td>";
		$htmlString .=  "<td>";

		$htmlString .=	"<img width='100px' src='";
		$htmlString .=	UPLOAD_PATH . "/" . $product["imagefile"] . "'>"; //Added image data PB 26 12 2013
		$htmlString .=  "</td>";

		$htmlString .=  "<td>";
		$htmlString .=  $product["title"];
		$htmlString .=  "</td>";

		$htmlString .=  "<td>";
		$htmlString .=  $product["description"];
		$htmlString .=  "</td>";

		$htmlString .=  "<td>";
		$htmlString .=  $product["price"];
		$htmlString .=  "</td>";

		$htmlString .=  "<td>";
		$htmlString .=  $product["taste"];
		$htmlString .=  "</td>";

		$htmlString .=  "<td>";
		// Get the country name from the countries db PB 27 12 2013
		$htmlString .=	$countriesArray[($product["country_id"]) -1]['country_name'];
		$htmlString .=  "</td>";
		
		//Deleted as editing not requested by the client. PB 27 12 2013
/*		$htmlString .=  "<td>";
		$htmlString .=  output_edit_link($product["product_id"]);
		$htmlString .=  "</td>";*/
		
		$htmlString .=  "<td>";
		$htmlString .=  output_delete_link($product["product_id"], 'product_id', 'products');
		$htmlString .=  "</td>";
		
		
		
		$htmlString .=  "</tr>\n";
		
	}
	$htmlString .=  "</table>\n";
	
	echo $htmlString ;
	
	
	
} else {
	
	die("Failure: " . mysql_error($link_id));
}
?>
</div>
<div class="span3"></div>

</div>


</div> <!-- /container -->
<?php 
include (TEMPLATE_PATH . "/footer.html");
?>
