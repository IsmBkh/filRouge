<?php 

function getPageContent($page){
    switch($page){
        case 'accueil':
            include('views/accueil.php');
            break;
        
        case 'contact':
            include('views/contact.php');
            break;
        
        case 'connexion':
            include('views/connexion.php');
            break;
        
        case 'deconnexion':
            include('views/deconnexion.php');
            break;
        case 'poster':
            include('views/poster.php');
            break;

        default:
        echo '<h1>Page non trouvée</h1><p>Désolé, la page demandée est introuvable.</p>';
        break;
    }
}