<?php
// Informations de connexion à la base de données
$host = 'localhost';
$username = 'root'; // Remplacez par le nom d'utilisateur de votre base de données
$password = ""; // Remplacez par le mot de passe de votre base de données
$dbname = "compte2"; // Remplacez par le nom de votre base de données

try {
    // Création d'une connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration de PDO pour rapporter les erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie à la base de données.";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>


