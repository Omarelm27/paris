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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parisnsif - Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Parisnsif" class="logo">
        <nav>
            <ul>
                <li><a href="siteparis.html".html">Accueil</a></li>
                <li><a href="resultat.html">Résultats</a></li>
                <li><a href="paris.html">Mes Paris</a></li>
                <li><a href="inscription.html">Inscription</a></li>
                <li><a href="compte.html">Mon Compte</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Inscription</h1>
        <form action="register.php" method="POST">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">S'inscrire</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 Parisnsif - Tous droits réservés</p>
    </footer>
</body>
</html>