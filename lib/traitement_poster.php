<?php 

// initialisation de toutes les variables à null pour bien gerer les erreurs 

$fichier_user = null; 
$titre = null; 
$description = null; 
$files_error  = null; 
$titre_error = null; 
$description_error = null; 
$success = null; 


if(isset($_POST['submit'])){

    
    if(strlen($_POST['titre']) <= 2 || strlen($_POST['titre']) >= 20){
        $titre_error = 'veuillez rensiegner un titre de 2 à 20 carractère maximum';
    }

    if(strlen($_POST['description']) <= 2 || strlen($_POST['description']) >= 100){
        $description_error = 'veuillez rensiegner un description de 2 à 100 carractère maximum';
    }

    if(!empty($_POST['titre']) || !empty($_POST['description']) || !empty($_FILES['files'])){
        // si tous les champs ne sont pas vide  
        
        if(isset($_FILES['fichier_user']) && $_FILES['fichier_user']['error'] === 0)
        // si le fichier user est renseigné et qu'il ne compote pas d'erreur 
        {
            // recup les infos chemin + extension 
            $fileInfo = pathinfo($_FILES['fichier_user']['name']);
            $extension = $fileInfo['extension'];
            $extensionAcceptees = ['jpg','jpeg','gif','png'];

            if(in_array($extension, $extensionAcceptees))
            // si lextension figure parmis celle que l'on a autorisé : 
            {
    
                if($_FILES['fichier_user']['size'] < 50000000)
                // 50 000 000 octets = 50 Mo
                {
                    if($fichier_user === null && 
                    $titre_error === null &&
                    $description_error === null
                    )
                    // si les 3 variables qui stock mes erreurs sont nul alors : 
                    {
                        // recupere le chemin du fichier upload 
                        $path = __DIR__ . '/../images/';
    
                        if(is_dir($path))
                        // si $path contient le chemin d'un directory :
                        {
                            // recup infos + secu : 
                            $titre_annonce = htmlspecialchars($_POST['titre']);
                            $description_annonce = htmlspecialchars($_POST['description']);
                            $file_name = $_FILES['fichier_user']['name'];

                            $auteurId = $_SESSION['LOGGED_USER']['id'];

                            include('data.php');

                            // use function move_uploaded_file pour enregistré le fichier dans upload
                            move_uploaded_file($_FILES['fichier_user']['tmp_name'], $path . basename($_FILES['fichier_user']['name'])); 

                            $insertAnnonce = $bdd->prepare('INSERT INTO annonces (titre , presentation , image , auteur_id) VALUES (?, ?, ?, ?)');
    
                            $insertAnnonce->execute(array($titre_annonce, $description_annonce, 'images/' . $file_name , $auteurId));
                            // afficher message de succès
                            $success = "Le fichier a été uploader";
                        }else{
                            $files_error = 'L\'envoi n\'a pas pu être éfféctué, le dossier uploads est manquant, veuillez reessayer plus tard svp';
                        }
                    }else{
                        $files_error = 'L\'envoi n\'a pas pu être effectué votre formulaire contient des erreurs';
                    }
                }else{
                    $files_error = "veuillez uploader un fichier de moins de 50 Mo svp";
                }
            }else{
                $files_error = 'L\'extension ' . $extension . ' n\'est pas autorisée, merci de renseigner un fichier de type : jpg, jpeg, gif, ou png svp';
            }
        }else{
            $files_error = 'veuillez uploader une image pour publier une annonnce';
        }
    }else{
        $description_error = 'merci de remplir tous les champs svp';
    }
    



}
