<?php
session_start();
if (!isset($_SESSION["idsession"])||$_SESSION["idsession"]!==session_id()){
    header("location:./?p=connexion");
}

$readliens="SELECT * FROM liens ORDER BY id DESC";

$queryreadliens=mysqli_query($connect,$readliens)or die(mysqli_errno($connect));

$resultat=mysqli_num_rows($queryreadliens);
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

<main class="container mt-5">
    <h1 class="text-center mt-4">SECTION POUR GÉRER VOTRE LISTE DES LIENS.</h1>
    <header class="row">
        <a href="?p=createliens"><button type="button" class="btn btn-outline-info">Ajouter un nouveau lien</button></a>
    </header>
    <table class="table table-striped">
        <thead class="thead-light">
        <tr>
            <th scope="col">Nom du site</th>
            <th scope="col">URL</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (empty($resultat)){
            echo "Le site n'a pas encore de liens";
        }else{
            while ($items=mysqli_fetch_assoc($queryreadliens)){
                ?>
        <tr>
            <td><?=$items["nom"]?></td>
            <td><?=$items["description"]?></td>
            <td><a href="<?=$items['url']?>" target="_blank"><?=$items['url']?></a></td>
            <td><a href="?p=modifierliens&id=<?=$items['id']?>" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i><br>Modifier</a></td>
            <td><a href="?p=supprimerliens&id=<?=$items['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i><br>Supprimer</a></td>
        </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

    <!-- Modal pour afficher les détails -->
    <div class="modal fade" id="detailsLien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Détails du lien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nom du site : OpenClassRooms</p>
                    <p>URL : https://www...</p>
                    <p>Description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate harum illo, praesentium ullam. Repudiandae voluptatem suscipit distinctio impedit doloribus quaerat magni temporibus ipsa minima, quasi eius sed a veritatis.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour confirmer la suppression-->
    <div class="modal fade" id="supprimerLien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprimer">Supprimer ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous certain de vouloir supprimer ce lien ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-md">
        <a href="?p=crud"><button type="button" class="btn btn-dark btn-lg btn-block m-5">Retour</button></a>
    </div>
</main>



</body>
</html>
