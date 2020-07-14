<?php
if (isset($_POST['envoyercreateliens'])) {
    $nomSite = trim($_POST['nomSite']);
    $nomSitetraitement1 = strip_tags($nomSite);
    $nomSitetraitement2 = htmlspecialchars($nomSitetraitement1);

    $urlSite = trim($_POST['urlSite']);
    $urlSitetraitement1 = strip_tags($urlSite);
    $urlSitetraitement2 = htmlspecialchars($urlSitetraitement1);

    $description = trim($_POST['description']);
    $descriptiontraitement1 = strip_tags($description);
    $descriptiontraitement2 = htmlspecialchars($descriptiontraitement1);

    if ( !(empty($nomSitetraitement2) && empty($urlSitetraitement2) && empty($descriptiontraitement2)) ) {
       mysqli_query($connect, "INSERT INTO `liens`(`nom`, `url`, `description`) VALUES ('$nomSitetraitement2','$urlSitetraitement2','$descriptiontraitement2')");
       header("Location: ?p=crudliens");
    }

}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Accueil</title>
</head>

<body>
<!-- Barre de navigation -->
<?php
include "navbar.php";
?>


<main class="container">
    <h1 class="text-center mt-4">Admin - Ajouter un lien</h1>
    <p class="lead text-center">Ce formulaire permet d'ajouter un nouveau lien dans la liste</p>

    <form method="post">
        <div class="form-group row">
            <label class="col-md-3" for="nomSite">Nom du site (*)</label>
            <input type="text" class="form-control col-md-9" name="nomSite" placeholder="Entrez le nom du site" required>
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="urlSite">URL du site (*)</label>
            <input type="url" class="form-control col-md-9" name="urlSite" placeholder="Entrez l'adresse du site (URL)" required>
            <div class="invalid-feedback text-left offset-md-3">Le format de l'URL n'est pas correct</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="description">Description</label>
            <textarea class="form-control col-md-9" name="description" placeholder="Entrez une description" required></textarea>
        </div>

        <button type="submit" name="envoyercreateliens" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer</button>
    </form>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>