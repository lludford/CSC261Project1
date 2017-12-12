<?php
    session_start();

    $_SESSION['login_user'] = NULL;
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>