
<?php 

$email = null;
$message = null;

$email_error = null; 
$message_error = null; 
$files_error = null; 

$success = null;


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $message = $_POST['message'];

    if((isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
    {
        $email_error = 'nous vous prions de renseigner un email valide pour soumettre le formulaire s\'ils vous plaît ⛔️';
    }

    if(empty($_POST['message']))
    {
        $message_error = 'Merci de reseigner un message';
    }
    
    if(isset($_FILES['fichier_user']) && $_FILES['fichier_user']['error'] === 0)
    // rappel : $_FILES est une variable HTTP qui permet de recuperer les fichiers send par users 
    {
        $fileInfo = pathinfo($_FILES['fichier_user']['name']);
        $extension = $fileInfo['extension'];
        $extensionAcceptees = ['jpg','jpeg','gif','png'];

        if(in_array($extension , $extensionAcceptees))
        // rappel : avec la function in_array on verifie si une valeur apparait dans un tableau, la function prends 2 arguments.
        {
            if($_FILES['fichier_user']['size'] < 50000000)
            // 50 000 000 octest = 50 Mo
            {
                if($email_error === null &&
                    $message_error === null &&
                    $files_error === null 
                )
                // si les trois variables qui stock mes erreurs sont résté null alors :  
                {
                    $path = __DIR__ . '/uploads/';
        
                    // on utilise la function is_dir() pour verifier si le dossier uploads existe 
                    if(!is_dir($path))
                    {
                        $files_error =  '<div class = error_message> L\'envoi n\'a pas pu être éfféctué, le dossier uploads est manquant, veuillez reessayer plus tard svp </div>'; 
                    }else{
                        // la function move_uploaded_file() prends 2 arguments : le chemin du fichier & le fichier de destination 
                        // la function basename() nous permet de recup que le nom du fichier, on a mis la variable $path pour lui donner le chemin  
                        move_uploaded_file($_FILES['fichier_user']['tmp_name'], $path . basename($_FILES['fichier_user']['name'])); 

                        $success = "Le fichier a été uploader";
                    }
                }
            }else{
                $files_error = 'nous vous prions d\'uploader un fichier de moins de 50Mo pour soumettre le formulaire s\'ils vous plaît ⛔️';   
            }
        }else{
            $files_error = 'L\'extension ' . $extension . ' n\'est pas autorisée, merci de renseigner un fichier de type : jpg, jpeg, gif, ou png svp';
        }
    }else{
        $files_error = 'Votre fichier contient une erreur, veuillez re-soumettre le formulaire s\'ils vous plaît ⛔️';
    }
}