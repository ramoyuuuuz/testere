<?php
session_start(); // Utiliser la session

// Vérification de l'appel via le formulaire
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || count($_POST) === 0) {
    header('Location: ../contact.php');
    exit;
}

// Vérification CAPTCHA
if (!isset($_POST['captcha']) || $_POST['captcha'] != $_SESSION['captcha']) {
    header('Location: ../contact.php?error=captcha_invalide');
    exit;
}

unset($_SESSION['captcha']);

$affichage_retour = '';
$erreurs = 0;

if (!empty($_POST['lastname'])) {
    $nom = trim($_POST['lastname']);
    $nom = ucfirst(strtolower($nom));
} else {
    $affichage_retour .= 'Le champ NOM est obligatoire<br>';
    $erreurs++;
}

if (!empty($_POST['firstname'])) {
    $prenom = trim($_POST['firstname']);
    $prenom = ucfirst(strtolower($prenom));
} else {
    $affichage_retour .= 'Le champ PRÉNOM est obligatoire<br>';
    $erreurs++;
}

if (!empty($_POST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = trim($_POST['email']);
    } else {
        $affichage_retour .= 'Adresse mail incorrecte<br>';
        $erreurs++;
    }
} else {
    $affichage_retour .= 'Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}

$telephone = !empty($_POST['phone']) ? trim($_POST['phone']) : null;
$motif = !empty($_POST['reason']) ? trim($_POST['reason']) : null;
if (!empty($_POST['message'])) {
    $message = htmlspecialchars(trim($_POST['message']));
} else {
    $affichage_retour .= 'Le champ MESSAGE est obligatoire<br>';
    $erreurs++;
}

if ($erreurs > 0) {
    header('Location: ../contact.php?error=validation&message=' . urlencode($affichage_retour));
    exit;
}

$emailAdmin = 'mmi24h08@mmi-troyes.fr';
$sujetAdmin = "Nouvelle demande de contact - $motif";
$entetesAdmin = "From: $emailAdmin\r\n";
$entetesAdmin .= "Reply-To: $emailAdmin\r\n";
$entetesAdmin .= "C ontent-Type: text/html; charset=UTF-8\r\n";

$messageAdmin = "<html><body>";
$messageAdmin .= "<h2>Nouvelle demande de contact</h2>";
$messageAdmin .= "<p><strong>Nom :</strong> $nom</p>";
$messageAdmin .= "<p><strong>Prénom :</strong> $prenom</p>";
$messageAdmin .= "<p><strong>Email :</strong> $email</p>";
if (!empty($telephone)) {
    $messageAdmin .= "<p><strong>Téléphone :</strong> $telephone</p>";
}
$messageAdmin .= "<p><strong>Motif :</strong> $motif</p>";
$messageAdmin .= "<p><strong>Message :</strong><br>$message</p>";
$messageAdmin .= "</body></html>";

$sujetUtilisateur = "Confirmation de votre demande de contact";
$entetesUtilisateur = "From: no-reply@mmi-troyes.fr\r\n";
$entetesUtilisateur .= "Reply-To: no-reply@mmi-troyes.fr\r\n";
$entetesUtilisateur .= "Content-Type: text/html; charset=UTF-8\r\n";

$messageUtilisateur = "<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border: 2px solid #000;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            padding: 20px;
        }
        .logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 50px;
            height: auto;
        }
        .content {
            padding-top: 60px;
        }
        .content h2 {
            color: #000;
        }
        .content p {
            color: #333;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #c0c0c0;
            font-size: 14px;
            color: #666;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            background-color: #000;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class='container'>
        <img class='logo' src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/1024px-Mercedes-Logo.svg.png' alt='Mercedes-Benz Logo'>
        <div class='content'>
            <h2>Merci pour votre message, $prenom $nom !</h2>
            <p>Nous avons bien reçu votre demande concernant <strong>$motif</strong>.</p>
            <p><strong>Votre message :</strong><br>$message</p>
            <p>Nous vous répondrons dès que possible.</p>
            <a href='http://mmi24h08.sae105.ovh' class='button'>Découvrir AMG</a>
        </div>
        <div class='footer'>
            <p>&copy; 2025 Mercedes-Benz. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>";


$mailAdmin = mail($emailAdmin, $sujetAdmin, $messageAdmin, $entetesAdmin);
$mailUtilisateur = mail($email, $sujetUtilisateur, $messageUtilisateur, $entetesUtilisateur);

if ($mailAdmin && $mailUtilisateur) {
    $affichage_retour = 'Votre demande a bien été envoyée';
} else {
    $affichage_retour = 'Échec de l\'envoi du message';
    $erreurs++;
}

if ($erreurs == 0) {
    header('Location: ../traitements/confirmation.php');
} else {
    header('Location: ../contact.php?error=envoi_echoue&message=' . urlencode($affichage_retour));
}
exit;
