<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_equipe = isset($_POST['nom_equipe']) ? trim($_POST['nom_equipe']) : '';
    $nom_responsable = isset($_POST['nom_responsable']) ? trim($_POST['nom_responsable']) : '';
    $numero_contact = isset($_POST['numero_contact']) ? trim($_POST['numero_contact']) : '';
    $adresse_mail = isset($_POST['adresse_mail']) ? trim($_POST['adresse_mail']) : '';

    if (!empty($nom_equipe) && !empty($nom_responsable) && !empty($numero_contact) && !empty($adresse_mail)) {
        $stmt = $conn->prepare("INSERT INTO inscriptions (nom_equipe, nom_responsable, numero_contact, adresse_mail) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssss", $nom_equipe, $nom_responsable, $numero_contact, $adresse_mail);

            if ($stmt->execute()) {
                echo "Nouvelle inscription ajoutée avec succès";
            } else {
                echo "Erreur: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête: " . $conn->error;
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }

    $conn->close();
}
?>
