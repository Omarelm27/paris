<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Parisnsif</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
  <div class="header-inner">
    <a class="brand" href="siteparis.php"><img src="images/logo.png" alt="Parisnsif logo" class="logo">Parisnsif</a>
    <nav class="main-nav">
      <a href="siteparis.php">Accueil</a>
      <a href="resultat.php">Résultats</a>
      <a href="paris.php">Mes Paris</a>
      <?php if (!empty($_SESSION['user_id'])): ?>
        <a href="compte.php">Mon compte</a>
        <a href="logout.php">Se déconnecter</a>
      <?php else: ?>
        <a href="login.php">Connexion</a>
        <a href="inscription.php">Inscription</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
<main class="site-main">