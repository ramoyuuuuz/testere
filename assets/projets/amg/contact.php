<?php
session_start(); // Nécessaire pour utiliser les sessions

// Génération du code CAPTCHA (4 chiffres aléatoires)
$captcha_code = rand(1000, 9999);
$_SESSION['captcha'] = $captcha_code; // Stockage dans la session

$pageTitle = "Contact";
include 'header.php';
?>


<link rel="stylesheet" type="text/css" href="css/styles.css">
<div class="background-images">

<!-- image en fond avec une opacité basse  -->
    <img src="images/amg.jpg" alt="Fond Mercedes 1" class="background-image">
    <img src="images/chassis.jpg" alt="Fond Mercedes 2" class="background-image">
</div>

<section class="contact-page">
    <div class="contact-container">
        <h1 class="contact-heading">Contactez-Nous</h1>
        <p class="contact-paragraph">Vous avez des questions sur Mercedes-Benz, AMG ou nos services ? N'hésitez pas à nous contacter. Nous sommes là pour vous aider !</p>

        <form action="traitements/envoi_mail.php" method="POST" id="contact-form">
        <div class="form-group name-container">
    <div class="name-half">
        <label for="lastname" class="form-label small-label"><span class="colored-span">* </span>Nom</label>
        <input type="text" id="lastname" name="lastname" class="form-input small-input" required>
    </div>
    <div class="name-half">
        <label for="firstname" class="form-label small-label"><span class="colored-span">* </span>Prénom</label>
        <input type="text" id="firstname" name="firstname" class="form-input small-input" required>
    </div>
</div>

    <div class="form-group">
        <label for="email" class="form-label"><span class="colored-span">* </span>Email :</label>
        <input type="email" id="email" name="email" class="form-input" placeholder="contact@mercedesamg.fr" required>
    </div>

    <div class="form-group">
        <label for="phone" class="form-label"><span class="colored-span">* </span>Téléphone :</label>
        <input type="tel" id="phone" name="phone" class="form-input" placeholder="06 12 34 56 78" required>
    </div>

    <div class="form-group">
        <label for="reason" class="form-label">Motif de votre demande :</label>
        <select id="reason" name="reason" class="form-input" required>
            <option value="" disabled selected>Choisissez une option</option>
            <option value="devis">Demande de devis</option>
            <option value="rdv">Prendre un rendez-vous</option>
            <option value="info">Demande d'informations</option>
            <option value="assistance">Assistance technique</option>
            <option value="autre">Autre</option>
        </select>
    </div>

    <div class="form-group">
        <label for="message" class="form-label">Message :</label>
        <textarea id="message" name="message" class="form-textarea" rows="5" placeholder="Décrivez votre demande en détail..." required></textarea>
    </div>

    <div class="form-group">
    <label for="captcha" class="form-label"><span class="colored-span">* </span>Code de vérification :</label>
    <div>
        <img src="captcha.php" alt="Captcha" class="captcha-image">
    </div>
    <input type="text" id="captcha" name="captcha" class="form-input" placeholder="Entrez le code ici" required>
        <button type="submit" class="form-button">Envoyer</button>
    </div>
</form>
    </div>
</section>
<script>
    document.getElementById('reason').addEventListener('change', function () {
        const messageField = document.getElementById('message');
        const placeholders = {
            devis: "Indiquez les détails pour le devis souhaité.",
            rdv: "Proposez une date et une heure pour le rendez-vous.",
            info: "Précisez les informations que vous cherchez.",
            assistance: "Décrivez le problème rencontré.",
            autre: "Expliquez votre demande."
        };
        messageField.placeholder = placeholders[this.value] || "Décrivez votre demande en détail...";
    });
</script>
<?php include 'footer.php'; ?>
