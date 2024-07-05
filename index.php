<?php
require_once "./Auth/Auth.class.php";
require_once './Auth/Match.class.php';
ob_start();
Auth::startSession();

$rencontres = Rencontre::getAllMatchPlayed();
?>





<div class="MatchStart">
    <div class="Equipe1">
        <img src="./assets/img/bcm.svg" alt="">
    <h3><?php echo htmlspecialchars($rencontreStart['equipe1']); ?></h3>
    </div>
    <div class="timing"></div>
    <div class="Equipe2"></div>
</div>

<br><br>

<div class="welcome-text">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Lieu</th>
            <th>Equipe 1</th>
            <th>Equipe 2</th>
            <th>Data de Rencontre</th>
        </tr>
        <?php foreach ($rencontres as $rencontre) : ?>
            <tr>
                <td><?php echo htmlspecialchars($rencontre['id_rencontre']); ?></td>
                <td><?php echo htmlspecialchars($rencontre['lieu']); ?></td>
                <td><?php echo htmlspecialchars($rencontre['equipe1']); ?></td>
                <td><?php echo htmlspecialchars($rencontre['equipe2']); ?></td>
                <td><?php echo htmlspecialchars($rencontre['date_rencontre']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php
$content = ob_get_clean();
$titre = "Accueil";
require "template.php";
?>