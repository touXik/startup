<?php  

session_start();

 if(isset($_POST['submit'])){
       if (!empty($_POST['pseudo']) and !empty($_POST['password'])){
           $pseudo_pd='admin';
           $password_pd='admin';

           $pseudo_s=htmlspecialchars($_POST['pseudo']);
           $password_s=htmlspecialchars($_POST['password']);

               if ( ($pseudo_pd == $pseudo_s) and ($password_s == $password_pd)){
                      $_SESSION['pseudo']= $pseudo_s;
                      header('location:admin.php');
                    
      }else{
                echo "<h1>MOT de passe ou pseudo incorrecte</h1>";
      }
       

       }else {
        echo " <h2> veuiller complete l'ensemble des champs </h2> ";
       }

 }

?>