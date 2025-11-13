<?php
require_once 'db.php';
session_start();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$email) $errors[] = 'Email invalide.';
    if (!$password) $errors[] = 'Mot de passe requis.';

    if (empty($errors)) {
        $stmt = $pdo->prepare('SELECT id, email, password FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: compte.php');
            exit;
        } else {
            $errors[] = 'Email ou mot de passe incorrect.';
        }
    }
}

include 'header.php';
?>
<h1>Connexion</h1>

<?php if ($errors): ?>
  <div class="errors"><ul><?php foreach ($errors as $e): ?><li><?=htmlspecialchars($e)?></li><?php endforeach; ?></ul></div>
<?php endif; ?>

<form action="login.php" method="post" class="form">
  <label for="email">Email :</label>
  <input type="email" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" required>

  <button type="submit" class="button">Se connecter</button>
</form>
<p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>

<?php include 'footer.php'; ?>