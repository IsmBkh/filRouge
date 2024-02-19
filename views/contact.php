<?php 

include('lib/traitement_message.php');

// ==========GESTION DE L'AFFICHAGE DES ERREURS========== 
if($email_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.email-error{display:block;}</style> <?php
}

if($message_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.message-error{display:block;}</style> <?php
}

if($files_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.file-error{display:block;}</style> <?php
}

if($success != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.success{display:block;}</style> <?php
}
// =======================================================
 
?>

<div id="page-container">
   <div id="content-wrap">

        <section class="contact">

            <h1>Contactez nous</h1>

            <form action="" method="POST" enctype="multipart/form-data">   
            <!-- NB: on choisit la method POST qui permet d'envoyer plus de donnée  -->
            <!-- enctype="multipart/form-data" permet l'envoi de fichier  -->

            <div class="form-group">
                <input type="mail" name="email" placeholder="email" value="<?php echo $email; ?>">
                <!-- On met des echo dans les value pour garder les valeurs des champs rempli -->
                <!-- permet d'afficher les messages derreur, voir fichier traitement_message.php  -->
                <p class="error email-error">
                    <?php echo $email_error ?>
                </p>
            </div>
            <div class="form-group">
                <textarea type="text" name="message" placeholder="votre message" value="<?php echo $message; ?>"></textarea>
                <p class="error message-error">
                    <?php echo $message_error ?>
                </p>
            </div>
            <div class="form-group">
                <input type="file" name="fichier_user">
                <p class="error file-error">
                    <?php echo $files_error ?>
                </p>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" placeholder="envoyer">
                <p class="success">
                    <?php echo $success ?>
                </p>
            </div>
            </form>
        </section>  
    </div>
</div>


