<?php
ob_start();
require_once './Auth/Auth.class.php';
require_once './Auth/User.class.php';

Auth::verifyAdmin();

$users = User::getAllUsersWithRoles();
?>







<h2>Bienvenue sur le panel admin</h2>




<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['id_user']); ?></td>
        <td><?php echo htmlspecialchars($user['nom']); ?></td>
        <td><?php echo htmlspecialchars($user['prenom']); ?></td>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
        <td><?php echo htmlspecialchars($user['role']); ?></td>

        <td><a href="./Update.class.php?id=<?php echo $user['id_user']; ?>">Modifier</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
$titre = "Gestion des Utilisateur";
require "template.php";
?>
