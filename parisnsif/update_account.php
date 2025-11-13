<?php
require_once 'db.php';
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$uid = $_SESSION['user_id'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_email = filter_var($_POST['new-email'] ?? '', FILTER_VALIDATE_EMAIL);
    $new_pass = $_POST['new-password'] ?? '';

    if ($new_email) {
        $stmt = $pdo->prepare('UPDATE users SET email = ? WHERE id = ?');
        $stmt->execute([$new_email, $uid]);
    }
    if ($new_pass && strlen($new_pass) >= 6) {
        $hash = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
        $stmt->execute([$hash, $uid]);
    }
}

header('Location: compte.php');
exit;