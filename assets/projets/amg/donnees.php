<?php
$pageTitle = "Histoire";
include 'header.php';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
<div class="background-images">

<!-- image en fond avec une opacité basse  -->
    <img src="images/galerie/cls.jpg" alt="Mercedes Background 1" class="background-image">
    <img src="images/galerie/s63.jpg" alt="Mercedes Background 2" class="background-image">
    <img src="images/galerie/g633.jpg" alt="Mercedes Background 3" class="background-image">
</div>


<div class="main-content">
<div id="background-models"></div>  
    <h1 class="h1data">Tableau AMG</h1>
  

    <!-- mise en place du tableau -->
    <table id="mercedes-table" class="display">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Année</th>
                <th>Puissance</th>
                <th>Vitesse Maximale</th>
                <th>Prix €</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // récupération des données et trie du tableau
            $data = json_decode(file_get_contents('datas/donnees.json'), true);
            foreach ($data as $model) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($model['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($model['type']) . "</td>";
                echo "<td>" . htmlspecialchars($model['annee']) . "</td>";
                echo "<td>" . htmlspecialchars($model['puissance']) . "</td>";
                echo "<td>" . htmlspecialchars($model['vitesse_maximale']) . "</td>";
                echo "<td>" . htmlspecialchars($model['prix']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<script src="js/scripts.js"></script>

<?php include 'footer.php'; ?>
