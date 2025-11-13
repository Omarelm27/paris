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
    <title>Parisnsif - Mon Compte</title>
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
        <h1>Mon Compte</h1>
        <section class="account-info">
            <h2>Informations personnelles</h2>
            <p><strong>Nom d'utilisateur :</strong> john_doe</p>
            <p><strong>Email :</strong> john.doe@example.com</p>
            <p><strong>Solde du compte :</strong> 100€</p>
        </section>

        <section class="account-settings">
            <h2>Modifier mes informations</h2>
            <form action="update_account.php" method="POST">
                <label for="new-email">Nouvel Email :</label>
                <input type="email" id="new-email" name="new-email" placeholder="nouveau-email@example.com">

                <label for="new-password">Nouveau mot de passe :</label>
                <input type="password" id="new-password" name="new-password" placeholder="Nouveau mot de passe">

                <button type="submit">Mettre à jour mes informations</button>
            </form>
        </section>

        <section class="account-actions">
            <h2>Actions</h2>
            <p><a href="paris.html">Voir mes paris effectués</a></p>
            <p><a href="resultat.html">Voir mes résultats de paris</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Parisnsif - Tous droits réservés</p>
    </footer>
</body>
</html>