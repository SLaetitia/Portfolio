<?php
session_start();
if (!isset($_SESSION["idsession"])||$_SESSION["idsession"]!==session_id()){
    header("location:./?p=connexion");
}
$id = (int) $_GET['id'];

if (!empty($_POST)){
    $nom=htmlspecialchars(strip_tags(trim($_POST['nom'])),ENT_QUOTES);
    $description=htmlspecialchars(strip_tags(trim($_POST['description'])),ENT_QUOTES);
    $url=htmlspecialchars(strip_tags(trim($_POST['url'])),ENT_QUOTES);

    if (!empty($nom)&&!empty($description)&&!empty($url)&&!empty($id)){
        $queryupdates="update liens set nom='$nom',description='$description',url='$url' WHERE id='$id'";
        mysqli_query($connect,$queryupdates) or die(mysqli_errno($connect));
        header("location:./?p=crudliens");
        exit();
    }else{
        $textupdate="Un des champs est vide";
    }
}
$requet="SELECT * FROM liens WHERE id='$id'";
$query=mysqli_query($connect,$requet) or die(mysqli_errno($connect));
$nb=mysqli_num_rows($query);

if ($nb===1){
    $item=mysqli_fetch_assoc($query);
}
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Galerie</title>
</head>
<body>

<!-- Barre de navigation -->
<?php
include "navbar.php";
?>

<main class="container">
    <h1 class="text-center mt-4">Admin - Modifier un lien</h1>
    <p class="lead text-center">Ce formulaire permet d'ajouter un nouveau lien dans la liste</p>

    <form id="formulaire" method="post">
        <div class="form-group row">
            <label class="col-md-3" for="nomSite">Nom du site</label>
            <input name="nom" type="text" class="form-control col-md-9" id="nomSite" placeholder="Entrez le nom du site" value="<?=$item['nom']?>">
            <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du site</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="urlSite">URL du site</label>
            <input name="url" type="url" class="form-control col-md-9" id="urlSite" placeholder="Entrez l'adresse du site (URL)" value="<?=$item['url']?>">
            <div class="invalid-feedback text-left offset-md-3">Le format de l'URL n'est pas correct</div>
        </div>
        <div class="form-group row">
            <label class="col-md-3" for="description">Description</label>
            <textarea name="description" class="form-control col-md-9" id="description" placeholder="Entrez une description" ><?=$item['description']?></textarea>
        </div>
        <?php
        if (isset($textupdate)){
            echo $textupdate;
        }
        ?>
        <button type="submit" class="btn btn-primary btn-block offset-md-4 col-md-4" >Envoyer</button>
    </form>
</main>
</body>
</html>
