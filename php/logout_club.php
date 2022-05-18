<?php
 session_start();
 $_SESSION= array();
 session_destroy();
 header('Location:../html/conx_club.html'); 
?>