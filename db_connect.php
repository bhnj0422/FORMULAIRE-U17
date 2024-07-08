<?php
$servername = "localhost";
$username = "root"; // Par défaut dans XAMPP
$password = ""; // Par défaut dans XAMPP
$dbname = "bd_formulaire_d_inscription";

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
?>
