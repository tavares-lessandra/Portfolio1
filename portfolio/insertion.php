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
var_dump($_POST);
// envoyer les donnees a la BDD
if(isset($_POST['submit'])) {

    if(isset($_POST['lastName']) && isset($_POST['firstName'])  && isset($_POST['email']) && isset($_POST['subject'])){// savoir si les variables sont declarées
        $nom = $_POST['lastName'];
        $prenom = $_POST['firstName'];
        $email = $_POST['email'];
        $message = $_POST['subject'];
        if($nom!="" && $prenom!="" && $email!="" && $message!=""){ // verifier si les champs sont remplis
            // if($mdp==$mdp2){// verifier le mdp identiques
                echo "salut";
                $query = $bdd->prepare( "INSERT INTO contact (nom,prenom,email,message) VALUES (?, ?, ?, ?)");//requette sql
                $query->execute(array($nom, $prenom, $email, $message));
            } 
            
            
        
    }
    else {
        echo "error";
    }
}
?>