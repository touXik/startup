<?php
      
include 'bdd.php';


$ticket_id=htmlspecialchars($_GET['id_t']);
$ticket=$db->prepare('SELECT * FROM ticket WHERE id=?');
$ticket->execute(array($ticket_id));

 while($m=$ticket->fetch()){ 
    $e1=$m['nom_c1'];
    $e2=$m['nom_c2']; } 
                 



      


           if(isset($_POST['submit'])){
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_nais']) ){
              $nom=htmlspecialchars($_POST['nom']);
             
              $prenom=htmlspecialchars($_POST['prenom']);
              $date_nais=nl2br(htmlspecialchars($_POST['date_nais']));
           
           

        $ins= $db-> prepare('INSERT INTO fans (nom,prenom,date_nais) VALUES(?  , ?,?)');
        $ins-> execute (array($nom,$prenom,$date_nais));
        $lastid = $db->lastInsertId();
           
                    
        header("Location:paiment.php?id_t=$ticket_id&id=$lastid ");
        

            // $_SESSION['status']= "message envoiyer";

         
        // echo' <h1>message envoiyer</h1>';
     

   }else{
       echo'<h1>vuiller completer tout les champs</h1>';

   }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cnx.css">
    <link rel="icon" type="images/png" href="../images/log.gif">
     <title>admin</title>
   
</head>
<body>
         <a href="../index.php"><button>Acuille</button></a>

     

     <h1>ACHETER TICKET  </h1>
              <h3>Matche : <?=$e1?> - <?=$e2?> </h3>

    <form action=" " method="post">
    <div class="input-form">
        <input type="text" name="nom" id="nom"
            placeholder=" " />
        <label for="nom">nom</label>
    </div>
    <div class="input-form">
    <input type="text" name="prenom" id="prenom"
        placeholder=" " />
    <label for="prenom">prénom </label>
</div>

<div class="input-form">
    <input type="date" name="date_nais" id="date_nais"
        placeholder=" " />
    <label for="date_nais">date de naissance </label>
</div>


<div class="submit-form">
    <button type="submit" name="submit">Continuer ver le paiment </button>
</div>
</form>


         

</body>
</html>