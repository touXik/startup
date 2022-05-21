
<?php
 session_start();
 if(!$_SESSION['pseudo']) {
     header('Location: ../html/conx_admin.html');
 }
  
  include 'bdd.php';
 

 



if (isset($_POST['submit'])){
    extract($_POST);
  


     if (!empty($nom) && !empty($email) && !empty($password) && !empty($cpassword)){


        if($password == $cpassword){

        $options = [
            'cost' => 12,
        ];
        $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

        // include 'bdd.php';
        global $db;


        $c = $db->prepare("SELECT email FROM club WHERE email = :email");
        $c->execute(['email' => $email]);

        $result= $c->rowCount();

        if($result ==0){

             $q = $db->prepare("INSERT INTO club(nom,email,password) VALUES(:nom,:email,:password)");
        $q->execute([
            'nom'=>$nom,
            
            'email'=>$email,
            'password'=>$hashpass
        ]);
           
          
        // header('Location: ../html/admin.html');
             echo "le profile du clube est bien ajouter ";
        } else{
              echo "ladress mail existe dejja ";
            
          
        
        }




       

    } else {
      
          echo "le mots de passe est incorrecte";
       
    }
      


        
          
                

            }
             else {
            echo " <h3> Veuillez Completer tout les champs ! <b> Merci </b> </h3> ";
     
                  }



        } 
        
        
        $club=$db -> query('SELECT * FROM club ORDER BY date_aj DESC');
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
         <a href=""><button>Deconexion</button></a>
     <h1>espace admin</h1>

    <form action=" " method="post">
    <div class="input-form">
        <input type="text" name="nom" id="nom"
            placeholder=" " />
        <label for="nom">Nom du clube</label>
    </div>
    <div class="input-form">
    <input type="email" name="email" id="email"
        placeholder=" " />
    <label for="email">Adresse email du clube</label>
</div>

<div class="input-form">
    <input type="password" name="password" id="password"
        placeholder=" " />
    <label for="password">Mot de passe du compt</label>
</div>
<div class="input-form">
    <input type="password" name="cpassword" id="cpassword"
        placeholder=" " />
    <label for="cpassword">confirmer le mot de passe </label>
</div>

<div class="submit-form">
    <button type="submit" name="submit">Ajouter</button>
</div>
</form>

  <div class="messages">

                  <div class="title">
                        <h1>clube ajouter</h1>
                    </div>

                    <div class="txt">
          
                              <?php while($m=$club->fetch()){ ?>
                                    <div class="ms">
                                            <div class="info">
                                                   <p><span> NOM : </span><?= $m['nom']?></a></p>
                                                   <p><span>  Email : </span><?= $m['email']?></p>
                                                 
                                                   <p><span> date ajout: </span><?= $m['date_aj']?></p> <br>
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









          

     
