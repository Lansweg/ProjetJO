<?php
ob_start();
require_once './Auth/Auth.class.php';
require_once './Auth/MyDbConnection.php';
require_once './Auth/User.class.php';

// Si la session n'est pas active, on la démarre
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Si le formulaire est soumis, on récupère l'email
// if (isset($_POST['email'])) {
//     $email = $_POST['email'];
//     $pdo = getPDOConnexion();
//     $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
//     $stmt->execute([$email]);
//     $user = $stmt->fetch();


// Si l'utilisateur existe, on créé une session et on redirige vers la page d'accueil
//     if ($user) {
//         $_SESSION['user_id'] = $user['id'];
//         header("Location: index.php");
//         exit();
//     } else {
//         $error = "Utilisateur non trouvé";
//     }
// }
?>

<div class="login-container">
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form class="form" action="" method="post">
        <p class="form-title">Page d'Inscription</p>
        <div class="input-container">
            <input type="text" name="nom" id="nom" placeholder="Doe" required>
        </div>
        <div class="input-container">
            <input type="text" name="prenom" id="prenom" placeholder="John" required>
        </div>

        <div class="input-container">
            <input type="email" name="email" id="email" placeholder="John.Doe@doe.com" required>
        </div>
        <div class="input-container">
            <input type="password" name="password" id="password" placeholder="***************" required>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="cdg" id="cdg" required>
            <label for="cdg">Conditions Générales</label>
        </div>
        <input class="btnsin" type="submit" value="Login">
        <p class="signup-link">
            Tu a déja un compte ?
            <a href="./login.php">Connection</a>
        </p>
    </form>
</div>






<!-- // Récupérer le contenu de la page template -->
<?php
$content = ob_get_clean();
$titre = "Inscription";
$titre2 = "BascketJO - Inscription";
require_once "template.php";
?>