

<?php session_start(); 

?>

<?php





if (isset($_POST['submit'])){
    extract($_POST);
  



     if ( !empty($email) && !empty($password)){


        include 'bdd.php';
        global $db;
        $q = $db->prepare("SELECT * FROM club WHERE email = :email");
        $q->execute(['email'=> $email]);
        $result = $q-> fetch();

        if($result == true)
        {
            if(password_verify($password, $result['password'])){
                $_SESSION['email']= $email;
             header('Location:../php/club.php');

      ?>

<?php


                

            }else {
             
                echo "mot de passe incorrect";

            }

        }else {
           
           echo "ladress mail nexiste pas ";


        }
      


        
            
        } else { echo " <h2> veuiller complete l'ensemble des champs </h2> ";
                ?>


<?php

    }

 }

?>