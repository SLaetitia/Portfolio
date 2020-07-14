<?php
session_start();
if (!isset($_SESSION["idsession"])||$_SESSION["idsession"]!==session_id()){
    header("location: ?p=connexion");
}
$id = (int) $_GET['id'];

if (isset($_GET['confirm'])){
    $id = (int) $_GET['id'];
    $suppr="DELETE FROM liens WHERE id='$id'";
    mysqli_query($connect,$suppr) or die(mysqli_errno($connect));
    header("location: ?p=crudliens");
    exit();
}
$recup="SELECT * FROM liens WHERE id='$id'";
$queryrecup=mysqli_query($connect,$recup)or die(mysqli_errno($connect));
$nb=mysqli_num_rows($queryrecup);

if ($nb===1){
    $item=mysqli_fetch_assoc($queryrecup);
    $text='suppresion de '.$item['nom'];
}else{
    $text='error 404';
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
    <h1 class="text-center mt-4">Admin - supprimer un lien</h1>
    <h2><?=$text?></h2>
    <div >
        <?php
        // si on a pas de résultat
        if(empty($nb)){
            echo "<h4>Cette page n'existe plus</h4>";
            // si 1 resultat
        }else {
            ?>
            <h5>Voulez-vous vraiment supprimer la page "<?=$item['nom']?>" ?</h5>
            <a href="?p=supprimerliens&id=<?=$item['id']?>&confirm=ok">Oui</a><button onclick="history.go(-1);">Non</button>

            <?php
        }
        ?>
    </div>

</main>
</body>
</html>
