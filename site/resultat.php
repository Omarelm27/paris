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
    <title>Parisnsif - Résultats</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Parisnsif" class="logo">
        <nav>
            <ul>
                <li><a href="siteparis.html">Accueil</a></li>
                <li><a href="resultat.html">Résultats</a></li>
                <li><a href="paris.html">Mes Paris</a></li>
                <li><a href="inscription.html">Inscription</a></li>
                <li><a href="compte.html">Mon Compte</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Résultats des Paris</h1>

        <section class="match-result">
            <h2>Paris SG vs Marseille</h2>
            <p>Date : 2025-12-05 | 21:00</p>
            <p>Score final : Paris SG 3 - 1 Marseille</p>
            <p>Le Paris SG gagne !</p>
        </section>

        <section class="match-result">
            <h2>Lyon vs Bordeaux</h2>
            <p>Date : 2025-12-06 | 18:30</p>
            <p>Score final : Lyon 2 - 2 Bordeaux</p>
            <p>Match nul !</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Parisnsif - Tous droits réservés</p>
    </footer>
</body>
</html>