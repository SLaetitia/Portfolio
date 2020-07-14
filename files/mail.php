<?php

session_start();
if (!isset($_SESSION["idsession"]) || $_SESSION["idsession"] !== session_id()) {
    header("location:./?p=connexion");
}

if (!$connect) {
    die("erreur de connexion: " . mysqli_connect_error());
}
$sql = "SELECT * FROM email ORDER BY id DESC ";
$querysql = mysqli_query($connect, $sql) or die(mysqli_error($connect));

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
    <title> Session </title>
</head>

<body>

<!-- Barre de navigation -->

<?php
include "navbar.php";
?>

<!-- Body -->
<main class="container">
    <h1 class="text-center mt-4">Admin - Liste des contacts</h1>
    <p class="lead">Bienvenue dans cette section qui permet de gérer la liste des contacts. Les données ont été encodées
        par les visiteurs du site via le formulaire de contact.</p>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telephone</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($contenu = mysqli_fetch_assoc($querysql)) {
            ?>
            <tr>
                <td><?= $contenu["nom"] ?></td>
                <td><?= $contenu["prenom"] ?></td>
                <td><?= $contenu["email"] ?></td>
                <td><?= $contenu["telephone"] ?></td>
                <td><?= $contenu["message"] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <div class="container-md">
        <a href="?p=crud">
            <button type="button" class="btn btn-dark btn-lg btn-block m-5">Retour</button>
        </a>
    </div>
</main>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>