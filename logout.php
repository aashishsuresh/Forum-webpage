<?php
   session_start();

   if(session_destroy()) {
      header("Location: mainpage.php?msg=Successfully Logged out");
   }
?>
