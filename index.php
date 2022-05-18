<?php
 session_start();
 if(! $_SESSION['email']  ) {
     header('Location:html/conx_club.html');
 }
include 'php/bdd.php';
$ticket=$db -> query('SELECT * FROM ticket ORDER BY date_m DESC');
?>

<!DOCTYPE html>
<html>
    <!-- head -->
    <head>
        <title>Ticket-en ligne </title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- lier la page html avec le css -->
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
         
        <link rel="stylesheet" href="css/for.css">

        <!-- lier un fichier ttf pour changer la police d'ecriture  -->
        <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash&display=swap" rel="stylesheet">

        
    </head>
    <!-- body -->
    <body>
             <!-- -------HORLOGE------ -->
             <div class="section-hors">
              <div class="clock">
                <div class="wrap">
                  <span class="heure"></span>
                  <span class="minute"></span>
                  <span class="seconde"></span>
                  <span class="dot"></span>
                </div>
              </div>
        </div>
        <!-- header haut de page -->
        <header>

          


            <img src="images/002.jpg">


            <h1>TICKET</h1>
              <div class="cont-span">
            <span>Reserve ta place avant que ca soit trop tard !!!!! </span>
               </div>

        </header>

        <!-- section details -->
        <section id="about">
            <div class="d01">
                <h3> en toute <br> securite</h3>
            </div>
            <div class="d02">
                <h3>Matche de <br>cette semaine </h3>
            </div>
            <div class="d03">
               <a href="html/aide.html"><h3> <span class="texte"></span></h3></a>
            </div>
        </section>

        <!-- section happy hour -->
        <section id="ticket">



 <?php while($m=$ticket->fetch()){ ?>
                <div class="card card0">
                  <button onclick="document.getElementById('forml').style.display='block'" >
<!--   
      <h2>JSK vs USMA</h2>
      <h2>stade 1er novembre tizi-ouzou </h2>
      <h2>300.00 DZD</h2> -->
     
                       <div class="border">
                             
                                     <h2>equipe : </span><?= $m['nom_c1']?> vs <?= $m['nom_c2']?></h2> 
                                     <h2>stade : </span><?= $m['stade']?></h2>
                                     <h2>prix : </span><?= $m['prix']?>.00 DZD</h2>
                                   
                                    
                             

                             
                       
               
     
    </div></button>
  </div>
     <?php } ?>
  <!-- <div class="card card0">
    <button onclick="document.getElementById('forml').style.display='block'" >
    <div class="border">
      <h2>JSK vs USMA</h2>
      <h2>stade 1er novembre tizi-ouzou </h2>
      <h2>300.00 DZD</h2>
     
    </div> </button>
  </div>
  <div class="card card0">
    <button onclick="document.getElementById('forml').style.display='block'" >
    <div class="border">
      <h2>JSK vs USMA</h2>
      <h2>stade 1er novembre tizi-ouzou </h2>
      <h2>300.00 DZD</h2>
     
    </div></button>
  </div> -->
           
            

        </section>

                   <!-- ------------------------------formulaire -------------------- -->
                   <div  id="forml" class="container">
                        <!-- <div class="container-mi"> -->
                    <button onclick="document.getElementById('forml').style.display='none'" >X</button>
                  <form action="php/info.php" method="post">
                    <p>Acheter ticket </p>
                   
                    <input type="text" name="nom" placeholder="Nom"><br>                     
                    <input type="text" name="prenom" placeholder="Prénom"><br> 
                    <input type="date" name="date_nais" placeholder="date de naissance " ><br>
                    <input type="email" name="email" placeholder="Email"><br>
                   
                    <input type="submit" name="submit" value="continue ver le paiement"><br>
                   
                  </form>
                
                  <div class="drop drop-1"></div>
                  <div class="drop drop-2"></div>
                  <div class="drop drop-3"></div>
                  <div class="drop drop-4"></div>
                  <div class="drop drop-5"></div>
                </div>
                       <!-- </div> -->



        <!-- pied de page -->
        <footer>
            <p>&copy; Copyright 2022 – Ticket</p>
        </footer>

           <!-- ------------------   scripte -------------------------------- -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
        <script src="https://kit.fontawesome.com/9f75563516.js" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>
              <!-- ---------------------------------------------------------------------- -->
    </body>
</html>