<?php 

include('lib/traitement_connexion.php');

if($email_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.email-error{display:block;}</style> <?php
}

if($password_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.password-error{display:block;}</style> <?php
}

?>


<div id="page-container">
   <div id="content-wrap">

   <h1>Connectez vous pour profitez de toutes nos offres</h1>

    <form action="" method="POST" class="form_connexion">
            <input type="text" name="identifiant" placeholder="votre identifiant">
            <p class="error email-error">
                <?php echo $email_error ?>
            </p>

            <input type="password" name="mdp" placeholder="votre mot de passe">
            <p class="error password-error">
                <?php echo $password_error ?>
            </p>

            <input class="button" type="submit" id="connexion" name="connexion" value="Connexion"/>

    </form>

    </div>
</div>