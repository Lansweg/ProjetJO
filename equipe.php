<?php
ob_start();
// require_once "dbConnect.php";

// Si la session n'est pas active, on la démarre
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>






<!-- // Récupérer le contenu de la page template -->
<?php
$content = ob_get_clean();
$titre = "Equipe";
$titre2 = "BacketJO - Equipe";
require_once "template.php";
?>