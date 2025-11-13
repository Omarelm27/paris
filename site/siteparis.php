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
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parisnsif - Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Parisnsif" class="logo">
        <nav>
            <ul>
                <li><a href="siteparis.php">Accueil</a></li>
                <li><a href="resultat.php">Résultats</a></li>
                <li><a href="paris.php">Mes Paris</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="compte.php">Mon Compte</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Bienvenue sur Parisnsif !</h1>
        <p>Découvrez les meilleurs paris sur vos matchs préférés. Placez vos paris et tentez votre chance !</p>

        <section class="featured-matches">
            <h2>Matchs à venir</h2>
            <div class="match">
                <h3>Paris SG vs Marseille</h3>
                <p>Date : 2025-12-05 | 21:00</p>
                <p>Cote Paris SG : 1.85 | Cote Marseille : 3.20</p>
                <a href="paris.php">Parier maintenant</a>
            </div>
            <div class="match">
                <h3>Lyon vs Bordeaux</h3>
                <p>Date : 2025-12-06 | 18:30</p>
                <p>Cote Lyon : 2.00 | Cote Bordeaux : 3.00</p>
                <a href="paris.php">Parier maintenant</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Parisnsif - Tous droits réservés</p>
    </footer>
</body>
</html>
