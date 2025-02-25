<?php
session_start();

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Vérifier si une image a été sélectionnée pour suppression
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['image'])) {
    $image = basename($_POST['image']); // Sécuriser le nom du fichier
    $dossier = "../images/galerie/"; // Chemin relatif corrigé
    $cheminFichier = $dossier . $image;

    // Vérifier si le fichier existe
    if (file_exists($cheminFichier)) {
        // Tenter de supprimer le fichier
        if (unlink($cheminFichier)) {
            $_SESSION['upload_message'] = "L'image a été supprimée avec succès.";
        } else {
            $_SESSION['upload_message'] = "Erreur lors de la suppression de l'image : " . error_get_last()['message'];
        }
    } else {
        $_SESSION['upload_message'] = "L'image n'existe pas : " . $cheminFichier;
    }
} else {
    $_SESSION['upload_message'] = "Aucune image sélectionnée pour la suppression.";
}

// Rediriger vers la galerie
header("Location: ../galerie.php");
exit();
?>
