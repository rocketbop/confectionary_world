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
$movie = array();
$movie['title'] = "";
$movie['description'] = "";
$movie['runningtime'] ="";
$movie['rating'] ="G";
$movie['cinema_id'] =0;
$movie['movie_id']=0;



if (!empty($_POST)) {
	
	
	$movie = array();
	$movie['title'] = htmlspecialchars(strip_tags($_POST["title"]));
	$movie['description'] = htmlspecialchars(strip_tags($_POST["description"]));
	$movie['runningtime'] = htmlspecialchars(strip_tags($_POST["runningtime"]));
	$movie['rating'] = htmlspecialchars(strip_tags($_POST["rating"]));
	$movie['cinema_id'] = (int) htmlspecialchars(strip_tags($_POST["cinema_id"]));
        
        
        $movie['movie_id'] = isset($_POST["movie_id"]) ? (int) $_POST["movie_id"] : 0;
        
	$flashMessage = "";
	if (validateMovie($movie)) {
		if ($movie['movie_id'] == 0) {
         //New! Save Movie returns the id of the record inserted         
		$movie_id = saveMovie($movie);
		uploadFiles($movie_id);
		
		
		$flashMessage = "Record has been saved";
                } else {
                    
                    updateMovie($movie);
		
                        header("Location: admin.php");
                }
		
		
	}
	
	

	
	
	}//end post
	

?>
<?php 
$activeInsert = "active";
$buttonLabel = "Insert Movie Record";
include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/form_insert.html");
include (TEMPLATE_PATH . "/footer.html");
?>