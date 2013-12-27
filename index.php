<?php

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
*/
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

$activeHome = "active"; // defined active class for Bootstrap 
include (TEMPLATE_PATH . "/public/header.html");

?>


<div class="container">
    <div class="row">
	    <div class="span8 offset2 panel">
	    
		    <h1>Confectionary World</h1>
			<p>Come and see the wonderful treats we have.</p>
			<ol>
				<li>List all products in the database.</li>
				<li>Add products to the database.</li>
				<li>Remove products from the database.</li>
				<li>Add manufacturers to the database.</li>
				<li>Remove manufacturers from the database.</li>
				<li>Upload product images with each listing.</li>
				<li>Add a NEW field to products showing country of origin. This can be text field or a select list. If using a select list, no more than 6 countries are required. Ensure updates handle the new country field.</li>
			</ol>
			<p>The sql setup is contained in the sqlsetup folder.</p>
	     
	    </div>
    </div>
</div>



<?php include (TEMPLATE_PATH . "/public/footer.html"); ?>