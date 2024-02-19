<?php 

include('lib/traitement_poster.php');


// ==========GESTION DE L'AFFICHAGE DES ERREURS========== 
if($files_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.file-error{display:block;}</style> <?php
}

if($titre_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.titre-error{display:block;}</style> <?php
}

if($description_error != null)
// si il a une erreur changer la propriété display de none à block pour afficher l'erreur
{
?> <style>.decsription-error{display:block;}</style> <?php
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

   <section class="">

    <h1>Poster votre annonce</h1>

        <form action="" method="POST" enctype="multipart/form-data" class="post_form">   
            <!-- NB: on choisit la method POST qui permet d'envoyer plus de donnée  -->
            <!-- enctype="multipart/form-data" permet l'envoi de fichier  -->
            <div class="form-group">

                <img id="preview" src="#" alt="Image preview" style="display: none; max-width: 300px;">
                <input type="file" name="fichier_user" id="imageInput" accept="image/*" onchange="previewImage()">
                    
                <p class="error file-error">
                    <?php echo $files_error ?>
                </p>
            </div>

            <div class="form-group">
                <input type="titre" name="titre" placeholder="titre" value="">

                <p class="error titre-error">
                    <?php echo $titre_error ?>
                </p>
            </div>

            <div class="form-group">
                <input type="text" name="description" placeholder="décrivez votre annonce" value="<?php echo $description; ?>"></input>

                <p class="error description-error">
                    <?php echo $description_error ?>
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


<script>
function previewImage() {
    var preview = document.getElementById('preview');
    var file = document.getElementById('imageInput').files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
    }

    reader.readAsDataURL(file);
}
</script>