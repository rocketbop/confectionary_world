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
	    
		    <h1 class="center">Confectionary World</h1>
			<p>Come and see the wonderful treats we have. Once you log in you will be able to:</p>
			<ul>
				<li>View all our products, and manufacturers</li>
				<li>Add and delete products, including an image for each product</li>
				<li>Add new manufacturers, and delete obsolete ones</li>
			</ul>
			<p class="center">Have a great time!</p>
	     
	    </div>
    </div>
</div>

<?php include (TEMPLATE_PATH . "/public/footer.html"); ?>