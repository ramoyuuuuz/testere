<?php
// Vérification de la redirection depuis le formulaire
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    switch ($error) {
        case 'missing_data':
            echo '<p class="error">Veuillez remplir tous les champs obligatoires (nom et email).</p>';
            break;
        case 'invalid_email':
            echo '<p class="error">L\'adresse email saisie est invalide.</p>';
            break;
        case 'mail_failed':
            echo '<p class="error">Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer.</p>';
            break;
    }
}
?>

<?php include '../header.php'; ?>

<link rel="stylesheet" type="text/css" href="../css/styles.css">

<div class="background-images">
    <img src="../images/amg.jpg" alt="Mercedes Background 1" class="background-image">
    <img src="../images/chassis.jpg" alt="Mercedes Background 2" class="background-image">
</div>

<section class="confirmation-page">
    <div class="confirmation-container">
        <h1 class="confirmation-heading">Votre demande a bien été envoyée !</h1>
        <p class="confirmation-paragraph">Merci de nous avoir contactés. Nous avons bien reçu votre demande et nous vous répondrons dans les plus brefs délais.</p>
        <p class="confirmation-paragraph">Un email de confirmation vous a été envoyé.</p>
        <a href="../contact.php" class="confirmation-button">Retour à la page de contact</a>
    </div>
</section>

<?php include '../footer.php'; ?>
