<?php
      
include 'bdd.php';


// $contact=$db -> query('SELECT * FROM contact ORDER BY date_pub DESC');

//  var_dump($_FILES);

      


           if(isset($_POST['submit'])){
   if(!empty($_POST['nom_c1']) AND !empty($_POST['nom_c2']) AND !empty($_POST['prix']) AND !empty($_POST['date_m']) AND !empty($_POST['num_c']) AND !empty($_FILES) ){
             $date_m=nl2br(htmlspecialchars($_POST['date_m']));  
             $nom_c1=htmlspecialchars($_POST['nom_c1']);
              $nom_c2=htmlspecialchars($_POST['nom_c2']);
              $prix=htmlspecialchars($_POST['prix']);
             
              $num_c=htmlspecialchars($_POST['num_c']);

             
           

        $ins= $db-> prepare('INSERT INTO ticket(date_m,nom_c1,nom_c2,prix,num_c) VALUES(? , ? , ?,?,?)');
        $ins-> execute (array($date_m,$nom_c1,$nom_c2,$prix,$num_c));
  

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
                        echo 'files envoiyer avec succee';
                        header('Location: ../html/club.html');
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




?>