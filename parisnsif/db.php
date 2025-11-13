<?php
// db.php - centralise la connexion PDO
$host = 'localhost';
$dbname = 'parisnsif';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En production, ne pas afficher l'erreur complète
    die("Erreur de connexion à la base de données.");
}
?>