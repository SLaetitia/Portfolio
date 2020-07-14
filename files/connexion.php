<?php
    session_start();
    if (isset($_SESSION["idsession"])&&$_SESSION["idsession"]===session_id()){
        header("location:./?p=crud");
    }

    if (isset($_POST["pseudo"],$_POST["MDP"])){
        $pseudo = htmlspecialchars(strip_tags(trim($_POST['pseudo'])),ENT_QUOTES);
        $MDP = htmlspecialchars(strip_tags(trim($_POST['MDP'])),ENT_QUOTES);

        if (!empty($pseudo)&&!empty($MDP)){
            $queryuser ="SELECT * FROM user WHERE pseudo='$pseudo' and MDP= '$MDP'";
            $recupuser = mysqli_query($connect, $queryuser);

            if (mysqli_num_rows($recupuser)===1){
                $user = mysqli_fetch_assoc($recupuser);
                $_SESSION = $user;
                $_SESSION["idsession"]=session_id();
                header("location:./?p=crud");
                exit();
            }else{
                $probleme ="Login ou mot de passe non valide.";
            }
        }
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Accueil</title>
</head>

<body>

<!-- Barre de navigation -->

<?php
include "navbar.php";
?>

<!-- Espace admin -->

<div class="container mt-5">
    <h1>Se connecter</h1>

    <form action="" name="connexion" method="post">
        <div class="row pt-5" >
            <div class="form-group col-md-6">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="Votre login" required>
            </div>
            <div class="form-group col-md-6">
                <label for="motdepasse">Votre mot de passe</label>
                <input type="password" class="form-control" name="MDP" placeholder="Votre mot de passe" required>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-block d-block d-md-none d-lg-none d-xl-none" value="Envoyer name="envoyer" >Se connecter</button>
        <button type="submit" class="btn btn-info d-none d-md-block d-lg-block d-xl-block" id="button-connect">Se connecter</button>

        <?php
        if (isset($probleme)){
            echo "<h6>".$probleme."</h6>";
        }else{
            echo "";
        }
        ?>
    </form>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>