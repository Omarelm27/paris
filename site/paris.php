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
    <title>Parisnsif - Mes Paris</title>
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
        <h1>Mes Paris Effectués</h1>
        <section class="bet">
            <h2>Paris SG vs Marseille</h2>
            <p>Date : 2025-12-05 | Cote Paris SG : 1.85</p>
            <p>Montant du pari : 50€</p>
            <p>Pari effectué sur : <strong>Paris SG gagne</strong></p>
        </section>

        <section class="bet">
            <h2>Lyon vs Bordeaux</h2>
            <p>Date : 2025-12-06 | Cote Lyon : 2.00</p>
            <p>Montant du pari : 30€</p>
            <p>Pari effectué sur : <strong>Lyon gagne</strong></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Parisnsif - Tous droits réservés</p>
    </footer>
</body>
</html>