<!-- ============ CSS ============ -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- ============================== -->

<header>

    <nav>
        
        <div>
            <img src="assets/img/logo.jpg" alt="" style="max-width: 5rem;">
            
            <ul>
                <li><a href="?page=accueil">Accueil</a></li>
                <li><a href="?page=contact">Contact</a></li>

                <?php if (isset($_SESSION['LOGGED_USER']['auth'])) : ?>
                    <!-- si user auth alors add lien deconnexion -->
                    <li><a href="?page=poster">Poster</a></li>

                    <li><a href="?page=deconnexion">Déconnexion</a></li>

                    
                    <?php else : ?>

                    <li><a href="?page=inscription">Inscription</a></li>
                    <li><a href="?page=connexion">Connexion</a></li>
                    
                <?php endif; ?>
                
            </ul>
            
        </div>

    </nav>

</header>