<?php 

session_start();

include_once('lib/data.php');
include_once('lib/fonctions.php');

include('lib/navigation.php');
include('views/header.php'); 


if(!isset($_GET['page'])){
    include('views/accueil.php');
}else{
    $page = $_GET['page'];
    echo '<div>' . getPageContent($page); '</div>'; 
}



include('views/footer.php'); ?>
    
</body>

<!-- import le module pour touch slider  -->
<script type="module">
import swiper from 'https://cdn.jsdelivr.net/npm/swiper@11.0.6/+esm'
</script>

<!-- javascript -->
<script>

</script>


</html>