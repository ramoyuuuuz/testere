<?php
// Activer le mode erreur
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrer la session
session_start();

// Vérifier si un fichier a été envoyé
if (!empty($_FILES['image']['name'])) {
    $dossier = "../images/galerie/";
    $image_nom = basename($_FILES['image']['name']);
    $image_temporaire = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $image_taille = $_FILES['image']['size'];
    $image_error = $_FILES['image']['error'];

    // Vérifications
    $erreurs = "";
    if ($image_error !== 0) {
        $erreurs .= "Erreur lors du téléchargement du fichier.<br>";
    }
    if ($image_type !== 'image/jpeg') {
        $erreurs .= "Le fichier doit être un JPEG.<br>";
    }
    if ($image_taille > 200000) { 
        $erreurs .= "Le fichier est trop volumineux (max 200 Ko).<br>";
    }

    // Si aucune erreur, enregistrer l'image
    if ($erreurs === "") {
        $destination = $dossier . time() . "_" . $image_nom; // Renommage avec timestamp

        if (move_uploaded_file($image_temporaire, $destination)) {
            $_SESSION['upload_message'] = "Image téléchargée avec succès.";
        } else {
            $_SESSION['upload_message'] = "Erreur lors de l'enregistrement du fichier.";
        }
    } else {
        $_SESSION['upload_message'] = $erreurs;
    }
} else {
    $_SESSION['upload_message'] = "Aucun fichier sélectionné.";
}

// Rediriger vers la galerie
header("Location: ../galerie.php");
exit();
?>
