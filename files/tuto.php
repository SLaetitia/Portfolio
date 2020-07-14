<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Tuto Menu déroulant</title>
</head>


<body>

<?php
include "navbar.php";
?>

<div class="container mt-5 pt-5">
    <div class="row" id="main">
        <div class="col" id="mainSecond">
            <h1 id="mainSecondTitle">Tuto choisie lES BASES DE GIT</h1>
            <p>
                Voici un tutoriel de Graven disponible sur sa <a
                        href="https://www.youtube.com/channel/UCIHVyohXw6j2T-83-uLngEg" target="_blank"> chaine
                    Youtube</a>.<br>
                J'ai choisie celui la car Git sera un outils important et utile chaque jours.<br>J'aimerai le comprendre
                d'avantage.
            </p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/gp_k0UVOYMw"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <p>Un lien trés utiles aussi c'est celui de Pierre Giraud.
                <br>Les explications y sont bien détaillée.
            </p>
            <p><a href="https://www.pierre-giraud.com/git-github-apprendre-cours/" target="_blank">Apprendre à utiliser
                    Git et GitHub</a></p>
        </div>
    </div>
</div>


<script src="Bootstrap/js/bootstrap.js"></script>
<script src="Bootstrap/js/jquery-3.5.0.js"></script>
</body>
</html>