<?php
      
include 'bdd.php';

$prs_id=htmlspecialchars($_GET['id']);
$fans=$db->prepare('SELECT * FROM fans WHERE id=?');
$fans->execute(array($prs_id));

$ticket_id=htmlspecialchars($_GET['id_t']);
$ticket=$db->prepare('SELECT * FROM ticket WHERE id=?');
$ticket->execute(array($ticket_id));
 while($t=$ticket->fetch()){ 
    
             $prix=$t['prix'];
                  
 } 
$mod=($prix*10)/100;
$totale=$mod+$prix;
 

// $contact=$db -> query('SELECT * FROM contact ORDER BY date_pub DESC');



      


           if(isset($_POST['submit'])){
   if(!empty($_POST['num_c']) AND !empty($_POST['date_ex']) AND !empty($_POST['code'])){
              $num_c=htmlspecialchars($_POST['num_c']);
              $date_ex=htmlspecialchars($_POST['date_ex']);
              $code=htmlspecialchars($_POST['code']);
              $options = [
                'cost' => 12,
            ];
              $hashpass = password_hash($code, PASSWORD_BCRYPT, $options);
           

        $ins= $db-> prepare('INSERT INTO cards (id_p,num_c,date_ex,code) VALUES(?,? , ? , ?)');
        $ins-> execute (array($prs_id,$num_c,$date_ex,$hashpass));
           
                    
        header("Location: files/$ticket_id.pdf");
        

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
     <title>admin</title>
   
</head>
<body>
         <a href="../index.php"><button>Acuille</button></a>

         <div class="messages">

<div class="title">
      <h1>vos information</h1>
  </div>

  <div class="txt">

            <?php while($m=$fans->fetch()){ ?>
                  <div class="ms">
                          <div class="info">
                                 <p><span> nom et prenom  : </span><?= $m['nom']?>  <?= $m['prenom']?> </p>
                                 <p><span>  date de naissance  : </span><?= $m['date_nais']?></p>
                               
                                
                                         <h4>          Veuillez bien vous assurer des info ci dessus ! </h4>   <br>
                                    
                                 <br>
                                
                           </div>

                         
                    </div>
              <?php } ?>

 </div>

</dive>  
<div>
    <h1>le montant a payer </h1>
        <h4>le prix du ticket : <?=$prix?>.00DZD</h4>
        <h4> Frais TVA (10%) :  <?=$mod?>.00 DZD</h4>
        <h4>le totale :   <?=$totale?>.00DZD</h4>
</div>

     <h1>Veuillez entrer les information de votre carte</h1>

    <form action=" " method="post">
    <div class="input-form">
        <input type="text" name="num_c" id="num_c"
            placeholder=" " />
        <label for="num_c">num de la carte de crédit</label>
    </div>
    <div class="input-form">
    <input type="date" name="date_ex" id="date_ex"
        placeholder=" " />
    <label for="date_ex">date d'expirimentation </label>
</div>

<div class="input-form">
    <input type="password" name="code" id="code"
        placeholder=" " />
    <label for="code">code CVC2/CVV2 </label>
</div>


<div class="submit-form">
    <button type="submit" name="submit">acheter </button>
</div>
</form>


         

</body>
</html>