<?php
session_start();

// Générer un code CAPTCHA (4 chiffres aléatoires)
$captcha_code = rand(1000, 9999);

// Stocker le code dans la session
$_SESSION['captcha'] = $captcha_code;

// Créer une image
header('Content-Type: image/png');
$image = imagecreate(120, 40);

// Couleurs
$background_color = imagecolorallocate($image, 255, 255, 255); // Blanc
$text_color = imagecolorallocate($image, 0, 0, 0); // Noir

// Ajouter le texte
imagestring($image, 5, 35, 10, $captcha_code, $text_color);

// Générer et afficher l'image
imagepng($image);
imagedestroy($image);