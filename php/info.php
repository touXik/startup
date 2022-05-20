<?php
      
include 'bdd.php';






      


           if(isset($_POST['submit'])){
   if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['prenom']) AND !empty($_POST['date_nais']) ){
              $nom=htmlspecialchars($_POST['nom']);
              $email=htmlspecialchars($_POST['email']);
              $prenom=htmlspecialchars($_POST['prenom']);
              $date_nais=nl2br(htmlspecialchars($_POST['date_nais']));
           
           

        $ins= $db-> prepare('INSERT INTO fans (nom,email,prenom,date_nais) VALUES(? , ? , ?,?)');
        $ins-> execute (array($nom,$email,$prenom,$date_nais));
        $lastid = $db->lastInsertId();
           
                    
        header('Location: ../index.html');
        

            // $_SESSION['status']= "message envoiyer";

         
        // echo' <h1>message envoiyer</h1>';
     

   }else{
       echo'<h1>vuiller completer tout les champs</h1>';

   }
}




?>