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

include (TEMPLATE_PATH . "/public/header.html");


?>


<div class="container">

    <div class="row">
    <div class="span3">
    
    
      
   <button class="btn btn-info" id="btnLoadAjax">Load Json</button>
  

    
    </div>
    <div class="span3">
    
    <div id="ajaxContent1" class="ajaxContent">Json to load here</div>
        
    </div>
    
        <div class="span3">
    
    <div id="ajaxContent2" class="ajaxContent">Json to load here</div>
        
    </div>
    
    
       <div class="span3">
    
    <div id="ajaxContent3" class="ajaxContent">Json to load here</div>
        
    </div>
    
    
    
    
   
    
    
    </div>
    
    
       <div class="row">
         <div class="span4">
     <button class="btn btn-info" id="btnLoadAjax2">Load Json 2</button>
  
    </div>
    
    <div class="span2">
    <input type="text" id="movieid" style="width: 50px"/>
    </div>
    
    <div class="span6">
    <div id="ajaxContent4" class="ajaxContent">Json4 to load here</div>
        </div>
    </div>
    </div>
    
    

</div>



<?php include (TEMPLATE_PATH . "/public/footer.html"); ?>