<?php   
session_start();  
              
                    $_SESSION['user_id'] = "";   
                    $_SESSION['user_password'] = "";
if(session_destroy()) {
      header("Location: index1.html");
   }?>