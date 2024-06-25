<?php
ob_start();
require_once "dbConnect.php";
?>


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $pdo = getPDOConnexion();


    $stmt = $pdo->prepare('DELETE FROM Userroles WHERE user_id = ?');
    $stmt->execute([$id]);


    $stmt = $pdo->prepare('DELETE FROM Users WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: read.php');
    exit;
} else {
    echo "ID utilisateur non spécifié.";
}
?>


<?php
$content = ob_get_clean();
$titre = "Supprimer des données";
require "template.php";
?>