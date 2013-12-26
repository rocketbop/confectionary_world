<?php
session_start();

//If already logged in redirect to admin.php (PB - 30 Nov 2013 15:36)
/*$_SESSION['loggedIn'] = 1;*/
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {

header("Location: admin.php");

}

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
 */
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

/*
 * Include the config.inc.php file
 */

include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");

//


function login($username, $password) {
    
    return authenticate($username, $password);
}

if (!empty($_POST)) {
    
    $s_username = htmlspecialchars($_POST['username']);
    $s_password = $_POST['password'];
    if (login($s_username, $s_password)) {
        
        $_SESSION["loggedIn"] = 1;
        header("Location: admin.php");
    }   
}

include (TEMPLATE_PATH . "/public/header.html");
?>

<div class="container">
  <div class="row login offset3 span6 ">

    <form class="form-horizontal " action="login.php" method="POST">
        
      <div class="control-group">
        <label class="control-label"  for="username">Username:</label> 
        <div class="controls">
          <input type ="text" id="username" name="username" /> 
     	  </div>
      </div>
        
      <div class="control-group">
         <label  class="control-label"   for="password">Password</label> 
        <div class="controls">
         <input type="password" id="password" name="password" />
        </div>
      </div>
        
      <div class="control-group">
        <div class="controls">
          <input type="submit" value="Login" />
        </div>
      </div>
                
    </form>
   </div> 
   
</div><!--  end container -->
