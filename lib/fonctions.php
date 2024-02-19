<?php 

require_once('lib/data.php');

// ========return toutes les annonces dans un tableau======== 
function voirAnnonces()
{
    global $bdd;
    $reqAnnonces = $bdd->prepare('SELECT * FROM annonces');
    $reqAnnonces->execute();

    $lesAnnonces = $reqAnnonces->fetchAll(PDO::FETCH_ASSOC);

    return $lesAnnonces;
}
// ============================================================

// ==========return tous les users dans un tableau==========
function voirUsers()
{
    global $bdd;
    $voirUtilisateurs = $bdd->prepare('SELECT * FROM users');
    $voirUtilisateurs->execute();

    $lesUtilisateurs = $voirUtilisateurs->fetchAll(PDO::FETCH_ASSOC);

    return $lesUtilisateurs;
}
// ============================================================


// ============verifier si tableau est valid===================
function isvalid(array $annonce) : bool
{
    $is_enabled = false; 

    if($annonce['is_enabled'] == true)
    {
        $is_enabled = true;
    };

    // Comparer la valeur de is_enabled avec true
    return $is_enabled; 
}
// ============================================================


// =========verifie si mail associé a une publication===========
// prend deux parametres : 
    // l'id de l'auteur de l'annonce dans la variable $auteur
        // => qu'on recup grace a getAnnonces()
    // un tableau avec tous nos users 
        // => recup grace a la function voirUsers ==> on pourra la mettre directement en parametre

function displayAuteurs(int $auteur_id, array $users): string 
{

    foreach($users as $user)
    {
        if($auteur_id === $user['idUser'])
        {
            // Retourner les informations de l'utilisateur
            return $user['nom'] . ' ' . $user['prenom'];
        }
    }

}
// ============================================================



// ============permet d'afficher les recettes valid============
function getAnnonces(array $annonces) : array 
{
    $annonces_valid = [];

    foreach($annonces as $uneAnnonce) 
    {
        if (isvalid($uneAnnonce) === true)
        {
            // Si l'annonce est valide et qu'elle est activée (is_enabled == true)
            // Ajoute-la au tableau des annonces valides
            $annonces_valid[] = $uneAnnonce;
        }
    }

    return $annonces_valid; 
}

// ============================================================


?>

