<?php
ob_start();
require_once "auth.php";

verifAdmin();

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    try {
        // Connexion à la base de données
        $pdo = getPDOConnexion();

        // Préparation et exécution de la requête SQL pour récupérer les données
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$userId]);

        // Récupération des données de l'utilisateur
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = "Erreur : " . $e->getMessage();
    }
} else {
    $error = "Aucun ID d'utilisateur fourni.";
}

// Vérifie si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // recupere les données utilisateur du formulaire
    $userId = $_POST['id'];
    $userName = $_POST['nom'];
    $userPrenom = $_POST['prenom'];
    $userTelephone = $_POST['telephone'];
    $userRole = $_POST['role'];

    // Vérifie si un nouveau mot de passe est soumis
    if (!empty($_POST['pwd'])) {
        $userpassword = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        // Effectue la mise à jour avec le nouveau mot de passe hashé
        try {
            $stmt = $pdo->prepare('UPDATE users SET nom = ?, prenom = ?, pwd = ?, telephone = ? WHERE id = ?');
            $stmt->execute([
                $userName,
                $userPrenom,
                $userpassword,
                $userTelephone,
                $userId
            ]);

            $stmt = $pdo->prepare('UPDATE userroles SET role = ? WHERE user_id = ?');
            $stmt->execute([
                $userRole,
                $userId
            ]);

            // Redirection après la mise à jour
            header('Location: read.php');
            exit();

        } catch (PDOException $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    } else {
        // Si aucun nouveau mot de passe n'est soumis, met à jour sans changer le mot de passe
        try {
            $stmt = $pdo->prepare('UPDATE users SET nom = ?, prenom = ?, telephone = ? WHERE id = ?');
            $stmt->execute([
                $userName,
                $userPrenom,
                $userTelephone,
                $userId
            ]);

            $stmt = $pdo->prepare('UPDATE userroles SET role = ? WHERE user_id = ?');
            $stmt->execute([
                $userRole,
                $userId
            ]);

            // Redirection après la mise à jour
            header('Location: read.php');
            exit();

        } catch (PDOException $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Utilisateur</title>
</head>
<body>
    <?php if (isset($error)) : ?>
        <p><?= $error; ?></p>
    <?php elseif (isset($user)) : ?>
        <div class="form-container">
            <form action="update.php?id=<?= htmlspecialchars($user['id']); ?>" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']); ?>" required><br>

                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']); ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required><br>

                <label for="pwd">Nouveau Password:</label>
                <input type="password" name="pwd" id="pwd"><br>

                <label for="telephone">Téléphone:</label>
                <input type="text" name="telephone" value="<?= htmlspecialchars($user['telephone']); ?>" required><br>

                <label for="role">Rôle:</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="non-admin">Non-Admin</option>
                </select><br>

                <input type="submit" value="Mettre à jour">
            </form>
        </div>
    <?php endif; ?>
</body>
</html>

<?php
$content = ob_get_clean();
$titre = "Modifier Utilisateur";
require "template.php";
?>
