<?php

require_once('lib/data.php');

include_once('lib/const.php');

$email_error = null;

$password_error = null; 


if(isset($_POST['connexion']))
{
    if(empty($_POST['identifiant']) || empty($_POST['mdp']))
    {
        $password_error = "veuillez remplir tous les champs";

    }elseif(!filter_var($_POST['identifiant'], FILTER_VALIDATE_EMAIL)) 
    {
        $email_error = "Merci de renseigner un email valide";
    }

    if(!empty($_POST['identifiant']) AND !empty($_POST['mdp']))
    {

        // Recup id + mdp et securise avc fonction htmlspecialchars
        $id_connexion = $_POST['identifiant'];
        $mdp_connexion = $_POST['mdp'];

        include('data.php');
        // ===========verification si user existe:===========================
        $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE mail= ?');
        // utilisation de la methode PDO ->prepare() pour preparer notre requete pr + de securité 
        $checkIfUserExist->execute(array($id_connexion));
        // utilisation de la methode PDO ->execute() pour executer notre requete avec l'id traiter avec htmlspecialchars
        // ==================================================================

        if($checkIfUserExist->rowCount() > 0)
        // si la variable $checkIfUserExist contient au moins une valeur 
        {
            $userInfos = $checkIfUserExist->fetch();
            // recup de tte les donnée du user dans la variable $userInfos

            // si les deux mots de passe sont identique 
                // NB : la function password_verify decrypte les mdp hashé ou crypté  
                // je n'utilise pas mtn la fct password_verify pcq il faut que les deux mots de passe soient hashé par php 
            if($mdp_connexion == $userInfos['mdp'])
            {
                // authentification du user en recuperant ses données dans la superglobal $_SESSION 

                $_SESSION['LOGGED_USER'] = [
                'auth' => true,
                'id' => $userInfos['idUser'],
                'nom' => $userInfos['nom'],
                'prenom' => $userInfos['prenom'],
                'mail' => $userInfos['mail'],
                ];

                header('Location: '.WWW.'?page=accueil');

                exit();
            }else{
                $password_error = "votre mot de passe est incorrect";
            }
        }else{
            $email_error = "vous n'êtes pas inscrit";
        }
    }else{
        $password_error = "veuillez remplir tous les champs";
    }
}












?>