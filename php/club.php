<?php
       session_start();
       if(! $_SESSION['email']  ) {
           header('Location:../html/conx_club.html');
       }

include 'bdd.php';

$club = $db->query('SELECT * FROM club');
while($c = $club->fetch()) {
 
       $id_club=$c['id'];
 }



 


$ticket = $db->prepare('SELECT * FROM ticket WHERE id_c = ? ORDER BY date_m DESC');
$ticket->execute(array($id_club));


?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cnx.css">
    <link rel="icon" type="images/png" href="../images/log.gif">
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
        placeholder=" " min="0.00" max="10000.00" step="0.01" />
    <label for="nom_c1">Prix du ticket /DZD </label>
</div>
<div class="input-form">
    <input type="number" name="nb_t" id="nb_t"
        placeholder=" "  />
    <label for="nb_t">Nombre de ticket disponible </label>
</div>
<div class="input-form">
    <input type="text" name="num_c" id="num_c"
        placeholder=" " />
    <label for="num_c">num??ro du comptes</label>
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


