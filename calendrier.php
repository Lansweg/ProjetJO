<?php
require_once "./Auth/Auth.class.php";
require_once './Auth/Match.class.php';
ob_start();
Auth::startSession();

$rencontres = Rencontre::getAllMatchPlayed();
// $logo = Rencontre::getAllColor();

?>


<br><br>

<section class="matchlist">
    <?php foreach ($rencontres as $rencontre) : ?>
        <div class="calendrier">


            <article class="calendriergrid">

                <div class="datematch">
                    <?php echo htmlspecialchars($rencontre['date_rencontre']); ?>
                </div>




                <div class="matchstats">
                    <div class="matchteam1">
                        <img class="matchimg" src="./assets/img/logoequipe/<?php echo $rencontre['equipe1']; ?>.png" alt="Logo <?php echo $rencontre['equipe1']; ?>">
                        <p><?php echo htmlspecialchars($rencontre['equipe1']); ?></p>
                    </div>
                    <div class="matchscore">
                        <a href="" class="matchscores"><?php echo htmlspecialchars($rencontre['score1']); ?> - <?php echo htmlspecialchars($rencontre['score2']); ?></a>
                    </div>
                    <div class="matchteam2">
                        <img class="matchimg" src="./assets/img/logoequipe/<?php echo $rencontre['equipe2']; ?>.png" alt="Logo <?php echo $rencontre['equipe2']; ?>">
                        <p><?php echo htmlspecialchars($rencontre['equipe2']); ?></p>
                    </div>
                </div>



                <div class="matchinfos">
                    <div class="typematch">
                        <p>Jeux Olympique</p>
                    </div>
                    <div class="plusinfos">
                        <p><i class="fas fa-map-marker-alt"></i>
                            <?php echo htmlspecialchars($rencontre['lieu']); ?>
                        </p>
                        <p><i class="far fa-clock"></i>
                            <?php echo htmlspecialchars($rencontre['heure_rencontre']); ?>
                        </p>
                        <p><i class="fas fa-display"></i>
                            <?php echo htmlspecialchars($rencontre['matchwatch']); ?>
                        </p>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>

</section>

<?php
$content = ob_get_clean();
$titre = "CALENDRIER";
require "template.php";
?>