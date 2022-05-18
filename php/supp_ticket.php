<?php
  // session_start();
  // if(!$_SESSION['pseudo']) {
  //     header('Location: conexion.html');
  // }
  
  include 'bdd.php';

if(isset($_GET['id']) AND !empty($_GET['id'])){
    
      $suppr_id=htmlspecialchars($_GET['id']);
      $suppr=$db->prepare('DELETE FROM ticket WHERE id=?');
      $suppr->execute(array($suppr_id));
      header('Location: club.php');
     

  }




?>