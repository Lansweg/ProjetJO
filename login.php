<?php

ob_start();
require_once "dbConnect.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['pwd'], $_POST['email'])) {
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    $pdo = getPDOConnexion();
    // Préparation de la requête SQL
    $stmt = $pdo->prepare('SELECT id, pwd FROM Users WHERE email = ?');
    // Exécution de la requête
    $stmt->execute([$email]);
    // Récupération du résultat
    $user = $stmt->fetch();

    // Vérification du mot de passe
    if ($user) {
        $passwordhash = $user["pwd"];


        if (password_verify($password, $passwordhash)) {
            $_SESSION["user_id"] = $user['id']; // Définition de l'ID utilisateur dans la session
            header('Location: index.php'); // Redirection vers la page d'accueil après connexion
            exit(); // Arrêt du script après la redirection
        } else {
            $error = "Mot de passe ou mail  incorrect.";
        }
    } else {
        $error = "Utilisateur non trouvé.";
    }
}

?>

<div class="login-container">
    <?php if (isset($error)) : ?>
        <p class="error"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="pwd">Password :</label>
        <input type="password" name="pwd" id="pwd" required>
        <input type="submit" value="Connexion">
    </form>
</div>

<?php
$content = ob_get_clean();
$titre = "Identification Espace Admin";
require "template.php";
?>
