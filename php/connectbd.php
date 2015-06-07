
<?php 
try
{
    // On se connecte à MySQL
    
    $bdd = new PDO('mysql:host=localhost;dbname=ecrowd; charset=utf-8', 'root','');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    echo 'Nous avons un petit probléme sur le site veuiller réessayer plus tard<br/>';
        die('Erreur : '.$e->getMessage());
}


// Permet de faire le message d'erreur.


/* Verifie si le formulaire est rempli */
//if((!empty($_POST'pseudo'])) AND (!empty($_POST'mail'])) AND (!empty($_POST'mp1'])) AND (!empty($_POST'nom'])) AND (!empty($_POST'prenom'])) AND (!empty($_POST'ville']) AND (!empty($_POST'profil']))) )
   // {


        /*Verifie si le pseudo est deja inscrit */
       // $reponse = $bdd->ecrowd('SELECT pseudo FROM user WHERE pseudo = :pseudo'); 
      //  $reponse->execute(array('pseudo' => $_POST['pseudo']));
     //   $count = $query->rowCount(); 
    //    if($count == 1) 
     //       { 
                // Pseudo déjà utilisé 
    //            echo 'Ce pseudo est déjà utilisé'; 
       //     } 


       // else
            { 
                 // Sinon on procede a l'inscription
                  // Ajoute l'inscrit
                  $ajou = $bdd->ecrowd('INSERT INTO user(nom, prenom, email, mot_de_passe, ville, telephone profil) VALUES(:nom, prenom, email, mot_de_passe, ville, telephone profil, CURDATE())');
                  $ajou->execute(array(
                  'nom' => $_POST['nom'],
                  'prenom' => $_POST['prenom'],
                  'email' => $_POST['email'],
				  'mot_de_passe' => $_POST['mp1'],
                  'ville' => $_POST['ville'],
                  'telephone' => $_POST['telephone'],
				  'profil' => $_POST['profil'],
				  
				  
				  
				  
				  
				  ));
                  echo 'Inscription fini';
            }


   // }

?>
