<?php
require_once 'db.php';
session_start();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$username) $errors[] = 'Nom d\'utilisateur requis.';
    if (!$email) $errors[] = 'Email invalide.';
    if (strlen($password) < 6) $errors[] = 'Mot de passe (>=6 caractères).';

    if (empty($errors)) {
        // vérifier si email ou username existe
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? OR username = ? LIMIT 1');
        $stmt->execute([$email, $username]);
        if ($stmt->fetch()) {
            $errors[] = 'Un compte existe déjà avec cet email ou nom d\'utilisateur.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $ins = $pdo->prepare('INSERT INTO users (username, password, email, created_at) VALUES (?, ?, ?, NOW())');
            $ins->execute([$username, $hash, $email]);
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['user_email'] = $email;
            header('Location: compte.php');
            exit;
        }
    }
}

include 'header.php';
?>
<h1>Inscription</h1>

<?php if ($errors): ?>
  <div class="errors"><ul><?php foreach ($errors as $e): ?><li><?=htmlspecialchars($e)?></li><?php endforeach; ?></ul></div>
<?php endif; ?>

<form action="inscription.php" method="post" class="form">
  <label for="username">Nom d'utilisateur :</label>
  <input type="text" id="username" name="username" required value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">

  <label for="email">Email :</label>
  <input type="email" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" required>

  <button type="submit" class="button">S'inscrire</button>
</form>

<?php include 'footer.php'; ?>