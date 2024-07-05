<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/95e699004e.js" crossorigin="anonymous"></script>
    <title><?= $titre2 ?></title>
</head>

<body>

    <header class="navDiv">
        <a href="./index.php">
        <img class="logoSVG" src="./assets/img/jo2024.svg" alt="">
        </a>
        <div class="nav">
            <div class="navLeft">
                <a href="./index.php">Accueil</a>
                <a href="./admin.php">Admin</a>
                <a href="./calendrier.php">Calendrier</a>
            </div>
            <div class="navRight">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="logout.php">Déconnexion</a> <!-- Lié à logout.php pour gérer la déconnexion-->
                <?php else : ?>
                    <a href="login.php">Connexion</a> <!-- Lié à login.php pour gérer la connexion -->
                    <a href="singin.php">Inscription</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <h1 class="titleh1"><?= $titre ?></h1>
    <?= $content ?>


    <footer>
        <div class="footer">

        </div>
    </footer>

</body>

</html>