<?php
session_start();
if (!isset($_SESSION["idsession"]) || $_SESSION["idsession"] !== session_id()) {
    header("location:./?p=connexion");
}
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Accueil crud</title>
</head>
<body>
<?php
include "navbar.php";
?>

<!--Bouton d'acces crud -->
<div class="container-md">
    <a href="?p=mail">
        <button type="button" class="btn btn-secondary btn-lg btn-block m-5">Mails reçus</button>
    </a>
    <a href="?p=crudliens">
        <button type="button" class="btn btn-secondary btn-lg btn-block m-5">Liens</button>
    </a>
    <a href="?p=crudgalerie">
        <button type="button" class="btn btn-secondary btn-lg btn-block m-5">Galerie</button>
    </a>
    <a href="?p=deconnexion">
        <button type="button" class="btn btn-dark btn-lg btn-block m-5">Déconnexion</button>
    </a>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</html>
