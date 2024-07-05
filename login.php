<?php
ob_start();
require_once './Auth/Auth.class.php';
require_once './Auth/MyDbConnection.php';

Auth::startSession();

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = MyDbConnection::getInstance(); 
    $stmt = $pdo->prepare('SELECT id_user, password FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id_user'];
        header('Location: index.php');
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<div class="login-container">
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form class="form" action="" method="post">
        <div class="input-container">
            <input type="email" name="email" id="email" placeholder="John.Doe@doe.com" required>
        </div>
        <div class="input-container">
            <input type="password" name="password" id="password" placeholder="***************" required>
        </div>
        <input class="btnsin" type="submit" value="Connexion">
        <p class="login-link">
            <a href="">Mot de passe oublié ?</a>
        </p>
        <p class="login-link">
            Ici pour
            <a href="./singin.php">s'inscrire</a>
        </p>
    </form>
</div>






<!-- // Récupérer le contenu de la page template -->
<?php
$content = ob_get_clean();
$titre = "Connexion";
$titre2 = "BacketJO - Connexion";
require_once "template.php";
?>