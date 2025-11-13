<?php
require_once 'db.php';
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$stmt = $pdo->prepare('SELECT id, username, email, created_at FROM users WHERE id = ? LIMIT 1');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

include 'header.php';
?>
<h1>Mon compte</h1>

<?php if ($user): ?>
  <section class="account-info">
    <h2>Informations personnelles</h2>
    <p><strong>Nom d'utilisateur :</strong> <?=htmlspecialchars($user['username'])?></p>
    <p><strong>Email :</strong> <?=htmlspecialchars($user['email'])?></p>
    <p><strong>Membre depuis :</strong> <?=htmlspecialchars($user['created_at'])?></p>
  </section>

  <section class="account-settings">
    <h2>Modifier mes informations</h2>
    <form action="update_account.php" method="POST" class="form">
      <label for="new-email">Nouvel Email :</label>
      <input type="email" id="new-email" name="new-email" placeholder="nouveau-email@example.com">

      <label for="new-password">Nouveau mot de passe :</label>
      <input type="password" id="new-password" name="new-password" placeholder="Nouveau mot de passe">

      <button type="submit" class="button">Mettre à jour mes informations</button>
    </form>
  </section>

  <section class="account-actions">
    <h2>Actions</h2>
    <p><a href="paris.php">Voir mes paris effectués</a></p>
    <p><a href="resultat.php">Voir mes résultats de paris</a></p>
  </section>
<?php else: ?>
  <p>Utilisateur introuvable.</p>
<?php endif; ?>

<?php include 'footer.php'; ?>