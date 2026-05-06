<?php
// Informations de connexion InfinityFree
$host = 'xxxxxxxx';
$dbname = 'xxxxxxxx';
$username = 'xxxxxxxx'; // mon nom d'utilisateur de compte
$password = 'xxxxxxxx'; // mon mot de passe de compte

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // On active les exceptions pour voir les erreurs si elles arrivent
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion au serveur distant : " . $e->getMessage());
}
?>