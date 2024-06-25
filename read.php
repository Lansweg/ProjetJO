<?php
ob_start();
require_once "auth.php";

verifAdmin();

try {
    // Connexion à la base de données
    $pdo = getPDOConnexion();

    // Préparation et exécution de la requête SQL pour récupérer les données
    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();

    // Récupération de toutes les données et verification des doublon 
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $error = "Erreur : " . $e->getMessage();
}


if (isset($error)) {
    echo "<p>$error</p>";
} else {
    if (count($users) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Password</th><th>Téléphone</th><th>Action</th></tr>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($user['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['pwd']) . "</td>";
            echo "<td>" . htmlspecialchars($user['telephone']) . "</td>";
            echo "<td>";
            echo "<a href='update.php?id=" . $user['id'] . "'>Modifier</a> | ";
            echo "<a href='delete.php?id=" . $user['id'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet utilisateur ?\")'>Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Aucun utilisateur trouvé.</p>";
    }
}



$content =  ob_get_clean();
$titre = "Liste des utilisateurs";
require "template.php";
?>