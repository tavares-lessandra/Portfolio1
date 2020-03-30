<?php

//test de connexion
try
{
$bdd = new PDO('mysql:host=localhost;dbname=portfoliocontact', 'lessandra','step24'); // en cas de succes => c'est ok
}
    catch (Exception $e) // ici en cas d'erreur
  
{
die('Erreur : ' . $e->getMessage());
}
?>

<?php
// envoyer les donnees a la BDD
if(isset($_POST['submit'])) {
    $nom = $_POST['lastname'];
    $prenom = $_POST['fistname'];
    $email = $_POST['email'];
    $message = $_POST['subject'];

    if(isset($nom) && isset($prenom)  && isset($email) && isset($message)){// savoir si les variables sont declarées
        if($nom!="" && $prenom!="" && $email!="" && $message!=""){ // verifier si les champs sont remplis
            // if($mdp==$mdp2){// verifier le mdp identiques
                $query = $bdd->prepare( "INSERT INTO contact (nom,prenom,email,message) VALUES(?, ?, ?,?)");//requette sql
                $query->execute(array($nom,$prenom, $email, $message));
            } 
            
            
        
    }
    else {
        echo "error";
    }
}
?>