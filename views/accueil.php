<?php 
    require_once('lib/fonctions.php');

    $annonces = voirAnnonces();
    $utilisateurs = voirUsers();


?>


<!-- affichage des recettes  -->
<div id="page-container">
   
    <div id="content-wrap">
    
       <h1>Liste des recettes de cuisine</h1>
       
       <div class="cards">
        
       <?php foreach(getAnnonces($annonces) as $annonce) : ?>
            <div class="card">

                <img src="<?php echo $annonce['image'] 
                ?>" alt="">
                
                <div class="container">
                    <h3><?php echo $annonce['titre']; ?></h3>
                    <p><?php echo $annonce['presentation']; ?></p>
                    <i>auteur : <?php echo displayAuteurs($annonce['auteur_id'], $utilisateurs); ?></i>
                </div>
            </div>
        <?php endforeach ?>
        
        </div>
    </div>
</div>

