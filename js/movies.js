  //This means 'call all content within the braces after the document is loaded  
            $(function(){    
              
                //All your jquery goodness goes in here  
            	initBtnJson();
            	initBtnJson2();
              
            }); // all content will go inside the two {}  

            
            
function initBtnJson() {
	
	   $('#btnLoadAjax').click(function () {  
           
           //this function will only work if using firefox/firebug.  
           //It causes an error in Explorer, so use Alert instead  
           //Use F12 in Firefox to reveal the console, enable the console and look for the message output  
           console.log("Ajax button has been clicked");  
             
             
           //Write a Test message to the div  
             
           $('.ajaxContent').append("<p>Ajax button has been clicked</p>");  
           
           //Declare a variable to store the url you are calling  
           var  url = "http://webserver.localhost/webev/lecture11/api/index.php?action=api_movie_listing_get";  
             
           //Clear the div containing the message  
           $(".ajaxContent").empty();  
           $(".ajaxContent").empty();  
           var items1 = "";
           var items2 = "";
           var ulItems = "<ul>";
           
           $.getJSON(url, function(data){  
          	 
        	   

               
               /*  
                   Use the jquery $.each() function to iterate through 
                   item in the array  
                   In this case we wrap each item in a paragraph tag 
               */  
               $.each(data, function(i,jsonItem){  
            	   
            	 
                  items1 += "<p>" + jsonItem['title'] + " : " + jsonItem['rating'] +  " : " + jsonItem['runningtime'] +  "</p>";  
                  
                  items2 +="<p><strong>Title: </strong>" + jsonItem['title'] +  "</p>"; 
                  items2 += "<p><strong>Rating: </strong>" +  jsonItem['rating'] +  "</p>"; 
                  items2 += "<p><strong>Running Time: </strong>" + jsonItem['runningtime'] +  "</p>";  
                  items2+= "<hr />"
                	  
                	  
                	  
                ulItems += "<li>"	+ jsonItem['title'] + "</li>" ;
            	 
               
            });  
               ulItems += "</ul>";

               $('#ajaxContent1').append(items1);  
               $('#ajaxContent2').append(items2);  
               $('#ajaxContent3').append(ulItems);  
               
             
               /* 
                   Outside the $.each() function, we append the content to the div 
                    
               */  
             
             
            

           });  
           
             
           } );  
        
       
            
       
	
}



function initBtnJson2() {
	
	   $('#btnLoadAjax2').click(function () {  
        
        //this function will only work if using firefox/firebug.  
        //It causes an error in Explorer, so use Alert instead  
        //Use F12 in Firefox to reveal the console, enable the console and look for the message output  
        console.log("Ajax button has been clicked");  
          
          
        //Write a Test message to the div  
          
        $('.ajaxContent').append("<p>Ajax button has been clicked</p>");  
        
        //Grab the movie id from input field
        
        var movieid = parseInt($('#movieid').val());
        
        //Declare a variable to store the url you are calling  
        var  url = "http://webserver.localhost/webev/lecture11/api/index.php?action=api_movie_listing_get_byid&movieid=" + movieid;  
          
        //Clear the div containing the message  
        $(".ajaxContent").empty();  
     
        var items2 = "";
     
     
        
        $.getJSON(url, function(data){  
       	 
     	   

            
            /*  
                Use the jquery $.each() function to iterate through 
                item in the array  
                In this case we wrap each item in a paragraph tag 
            */  
            $.each(data, function(i,jsonItem){  
         	   
         	 
               
               items2 +="<p><strong>Title: </strong>" + jsonItem['title'] +  "</p>"; 
               items2 += "<p><strong>Rating: </strong>" +  jsonItem['rating'] +  "</p>"; 
               items2 += "<p><strong>Running Time: </strong>" + jsonItem['runningtime'] +  "</p>";  
               items2+= "<hr />"
             	  
             	  
             	  
            
            
         });  
           

             
            $('#ajaxContent4').append(items2);  
           
            
          
            /* 
                Outside the $.each() function, we append the content to the div 
                 
            */  
          
          
         

        });  
        
          
        } );  
     
    
         
    
	
}



