<?php   

function checkSessionCRLT(){


    session_start();  
     if(isset($_SESSION["username"]))  
     {  
    
     }  
     else  
     {  
          header("location:log.php");  
     }  
}
function logControllersCRLT(){


    checklog();
    require('views/log.php');


}
function logoutCRTL(){

    session_start();  
    session_destroy();  
    header("location:index.php");  
}
?>