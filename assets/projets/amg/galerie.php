<?php
$pageTitle = "Galerie";
include 'header.php';

// Démarrer la session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="css/styles.css">

<main class="annonce-page">
    <h1 class="annonce-title">Galerie Mercedes-AMG</h1>

    <?php
    // Afficher le message de téléchargement
    if (isset($_SESSION['upload_message'])) {
        $messageClass = strpos($_SESSION['upload_message'], 'succès') !== false ? 'success' : 'error';
        echo '<div id="upload-message" class="upload-message ' . $messageClass . '">' 
             . $_SESSION['upload_message'] . '</div>';
        unset($_SESSION['upload_message']);
    }
    ?>

    <!-- Formulaire d'upload en haut de la page -->
    <form action="traitements/upload_image.php" method="POST" enctype="multipart/form-data" class="upload-form">
        <label for="image">Choisir une image :</label>
        <input type="file" name="image" id="image" accept="image/jpeg,image/png" class="file-input">
        <button type="submit">Télécharger</button>
    </form>

    <div class="annonce-wrapper">
        <?php
        $dossier = "images/galerie/";
        $fichiers = array_diff(scandir($dossier), array('.', '..'));
 
        foreach ($fichiers as $fichier) {
            echo '<div class="annonce-item">';
            echo '<div class="image-container">';
            echo '<img src="' . $dossier . $fichier . '" alt="Mercedes AMG" class="annonce-image">';
            echo '<form action="traitements/delete_image.php" method="POST" class="delete-form">';
            echo '<input type="hidden" name="image" value="' . $fichier . '">';
            echo '<button type="submit" class="delete-btn"></button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    var message = document.getElementById('upload-message');
    if (message) {
        // Disparition après 5 secondes
        setTimeout(function() {
            message.classList.add('slide-out');
            
            // Suppression du DOM après l'animation
            setTimeout(function() {
                message.remove();
            }, 500);
        }, 5000);
    }
});

    </script>
</main>

<?php include 'footer.php'; ?>
