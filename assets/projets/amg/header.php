<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercedes-Benz et AMG - <?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/AMG-Logo.png" alt="logo mercedes benz"> 
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Accueil</a></li>
                <li><a href="donnees.php" class="<?= basename($_SERVER['PHP_SELF']) == 'donnees.php' ? 'active' : '' ?>">Données</a></li>
                <li><a href="galerie.php" class="<?= basename($_SERVER['PHP_SELF']) == 'galerie.php' ? 'active' : '' ?>">Galerie</a></li>
                <li><a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Contact</a></li>
                <li><a href="partenaires.php" class="<?= basename($_SERVER['PHP_SELF']) == 'partenaires.php' ? 'active' : '' ?>">Partenaires</a></li>
            </ul>
        </nav>
    </header>
