<?php
      
include 'bdd.php';


// $contact=$db -> query('SELECT * FROM contact ORDER BY date_pub DESC');

//  var_dump($_FILES);

      


           if(isset($_POST['submit'])){
   if(!empty($_POST['nom_c1']) AND !empty($_POST['nom_c2']) AND !empty($_POST['stade']) AND !empty($_POST['prix']) AND !empty($_POST['date_m']) AND !empty($_POST['num_c']) AND !empty($_FILES) ){
             $date_m=nl2br(htmlspecialchars($_POST['date_m']));  
             $nom_c1=htmlspecialchars($_POST['nom_c1']);
              $nom_c2=htmlspecialchars($_POST['nom_c2']);
              $stade=htmlspecialchars($_POST['stade']);
              $prix=htmlspecialchars($_POST['prix']);
             
              $num_c=htmlspecialchars($_POST['num_c']);

             
           

        $ins= $db-> prepare('INSERT INTO ticket(date_m,nom_c1,nom_c2,stade,prix,num_c) VALUES(? , ? ,?, ?,?,?)');
        $ins-> execute (array($date_m,$nom_c1,$nom_c2,$stade,$prix,$num_c));
  

        // if(isset($_FILES['files'])AND !empty($_FILES['files']['name'])){
        //     if(exif_imagetype($_FILES['files']['tmp_name'])==2){
        //         $chemin= 'files/'.$lastid.'.pdf';
        //         move_uploaded_file($_FILES['files']['tmp_name'],$chemin);
        //     } else{
        //         $message='Votre image doit etre au format jpg';
        //     }
        // }
            //  if(!empty($_FILES)){
                
    //   if(isset($_FILES['files'])AND !empty($_FILES['files']['name'])){
               
            // }  
            // if(!empty($_FILES)){
                $file_name = $_FILES['fichier']['name'];
                $file_extension = strrchr($file_name, ".");
  
                $file_tmp_name = $_FILES['fichier']['tmp_name'];
                $file_dest = 'files/'.$file_name;
  
                $extension_autorisees = array('.pdf' , 'PDF');
  
               if(in_array($file_extension, $extension_autorisees)){
                       if(move_uploaded_file($file_tmp_name,$file_dest)){
                           $req =$db ->prepare('INSERT INTO files(name,file_url) VALUES(?,?)');
                           $req->execute(array($file_name, $file_dest));
                        echo 'ticket ajouter avec succe ';
                        // header('Location: ../html/club.html');
                   } else{
                       echo 'une errreur est sur lor de lenvoi';
                   }
               } else{
                   echo 'seuls les files pdf autoris';
               }
    //   }
                    
        
        

            // $_SESSION['status']= "message envoiyer";

         
        // echo' <h1>message envoiyer</h1>';
     

   }else{
       echo'<h1>vuiller completer tout les champs</h1>';

   }
}


$ticket=$db -> query('SELECT * FROM ticket ORDER BY date_m DESC');

?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cnx.css">
    <title>espace-club</title>
</head>
<body>
   <a href="logout_club.php"> <button>Deconexion</button></a>
      <h1>espace clube</h1>
    <form action=" " method="post" enctype="multipart/form-data">

    <div class="input-form">
    <input type="datetime-local" name="date_m" id="date_m"
        placeholder=" " />
    <label for="date_m">date et heure du matche</label>
</div>

<div class="input-form">
    <input type="text" name="nom_c1" id="nom_c1"
        placeholder=" " />
    <label for="nom_c1">Nom equipe </label>
</div>
<div class="input-form">
    <input type="text" name="nom_c2" id="nom_c2"
        placeholder=" " />
    <label for="nom_c2">Nom equipe ext</label>
</div>

<div class="input-form">
    <input type="text" name="stade" id="stade"
        placeholder=" " />
    <label for="stade">nom du stade de la recontre </label>
</div>

<div class="input-form">
    <input type="number" name="prix" id="prix"
        placeholder=" " min="0.00" max="1000.00" step="0.01" />
    <label for="nom_c1">Prix du ticket /DZD </label>
</div>
<div class="input-form">
    <input type="text" name="num_c" id="num_c"
        placeholder=" " />
    <label for="num_c">numéro du comptes</label>
</div>
<div class="input-form">
    <input type="file" name="fichier" id="fichier"
        placeholder=" " />
    <label for="fichier">ajouter ticket en format pdf</label>
</div>



<div class="submit-form">
    <button type="submit" name="submit">Publier</button>
</div>
</form>


<div class="messages">

    <div class="title">
          <h1>clube ajouter</h1>
      </div>

      <div class="txt">

                <?php while($m=$ticket->fetch()){ ?>
                      <div class="ms">
                              <div class="info">
                                     <p><span> equipe : </span><?= $m['nom_c1']?> vs <?= $m['nom_c2']?></p>
                                     <p><span> stade : </span><?= $m['stade']?></p>
                                     <p><span> prix : </span><?= $m['prix']?></p>
                                    <p><span> date et heure du matche: </span><?= $m['date_m']?></p> <br>
                                    <div class="button">
                                                   <button class="s"><a href="supp_ticket.php?id=<?=$m['id']?>">suprimer</a> </button>
                                              </div>
                                     <br>
                                     <br>
                                     <br>
                               </div>

                             
                        </div>
                  <?php } ?>

     </div>

</dive>  






</body>
</html>


