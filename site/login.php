<?php
$host = 'localhost';  // Hôte de la base de données, en local c'est généralement 'localhost'
$dbname = 'parisnsif'; // Le nom de la base de données
$username = 'root';    // Ton nom d'utilisateur MySQL (par défaut 'root' en local)
$password = '';        // Le mot de passe MySQL (vide par défaut en local)

try {
    // Crée une nouvelle connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configurer PDO pour générer des erreurs en cas de problème
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la connexion échoue, afficher un message d'erreur
    die("Erreur de connexion : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - SportBet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <a href="siteparis.html">Accueil</a>
    <a href="login.html">Connexion</a>
    <a href="inscription.html">Inscription</a>
    <a href="compte.html">Mon compte</a>
    <a href="paris.html">Paris</a>
    <a href="resultat.html">Résultats</a>
</nav>
<hr>

<h1>Connexion</h1>

<form action="login.php" method="POST">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Se connecter</button>
</form>

<p>Pas encore de compte ? <a href="inscription.html">S'inscrire</a></p>

</body>
</html>