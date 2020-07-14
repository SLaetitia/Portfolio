<?php
if (!$connect) {
    echo "erreur de connexion: " . mysqli_connect_error();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Formulaire de contact </title>
    <style>
        body {
            height: 100%;
            background-color: #fff;
        }
        label,
        input,
        textarea {
            display: block;
            width: 100%;
        }
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        li {
            padding: 0.3em;
        }
        span {
            font-weight: 700;
            color: black;
            line-height: 35px;
            line-height: 2.5rem;
            font-size: 12px;
            font-size: 0.8rem;
            text-transform: uppercase;
        }
        input[type="submit"] {
            background: #e76f51;
            color: black;
            font-weight: 700;
            font-size: 1.2rem;
            border-radius: 5px;
            margin-top: 1.3em;
        }

        .containercontact {
            width: 460px;
            margin: 5em auto;
        }
        form {
            background-color: #f4a261;
            padding-top: 40px;
            padding-right: 40px;
            padding-bottom: 40px;
            padding-left: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-radius: 3px;
            overflow: hidden;
        }

        .required-star {
            color: black;
        }

        input,
        textarea {
            width: 100%;
            padding: 9px 20px;
            border: 1px solid;
            border-color: black;
            background-color: #f4a261;
            box-sizing: border-box;
            font-size: 14px;
            font-size: 1rem;
            line-height: 29px;
            line-height: 2rem;
            box-shadow: inset 0 2px 4px 0 rgba(206, 209, 224, 0.2);
            border-radius: 1px;
            line-height: 29px;
            line-height: 2rem;
        }
    </style>
</head>

<body>

<?php
include "navbar.php";
?>

<h1>Contactez-moi</h1>
<div class="containercontact">
    <form method="post">
        <ul>
            <li>
                <label for="nom"><span>Nom : <span class="required-star">*</span></span></label>
                <input type="text" id="nom" name="nom">
            </li>
            <li>
                <label for="prenom"><span>Prénom : <span class="required-star">*</span></span></label>
                <input type="text" id="prenom" name="prenom">
            </li>
            <li>
                <label for="mail"><span>Email :<span class="required-star">*</span></span></label>
                <input type="email" id="mail" name="email">
            </li>
            <li>
                <label for="telephone"><span>Téléphone :</span></label>
                <input type="number" id="telephone" name="telephoe">
            </li>
            <li>
                <label for="message"><span>Message :</span></label>
                <textarea rows="4" cols="50"></textarea>
            </li>
            <li>
                <input type="submit">
            </li>
        </ul>
    </form>
</div>

                    <?php $monmail="web2020.laetitia@gmail.com";
                            $email="marieflore@hotmail.com";

                            if (isset($_POST["envoyer"])){
                                if (empty($_POST["email"])){
                                    echo "Champ email vide.";
                                } else{
                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        echo "Cette adresse n'est pas valide";
                                    }else{
                                        if (empty($_POST["prenom"]) or empty($_POST["nom"])){
                                            echo "Indiquer votre Nom et Prénom";
                                        }else{
                                            if (empty($_POST["message"])){
                                                echo "Veuillez écrire votre message";
                                            }else{
                                                $Entetes = "MIME-Version: 1.0\r\n";
                                                $Entetes = "Content-type: text/html; charset=UTF-8\n";


                                                $mail=htmlentities($_POST["email"],ENT_QUOTES,"utf-8");
                                                $prenom=htmlentities($_POST["prenom"],ENT_QUOTES,"utf-8");
                                                $nom=htmlentities($_POST["nom"],ENT_QUOTES,"utf-8");
                                                $telephone=htmlentities($_POST["telephone"],ENT_QUOTES,"utf-8");
                                                $message=htmlentities($_POST["message"],ENT_QUOTES,"utf-8");

                                                if (mail($monmail,$prenom." ".$nom,"Voici le message envoyé par $prenom $nom : <br> $message",$Entetes)){
                                                    echo "Votre email à bien été envoyé";
                                                    $pushmail="INSERT INTO email(prenom,nom,telephone,message)VALUES($prenom,$nom,$telephone,$message)";
                                                    $envoiemail=mysqli_query($connect,$pushmail);
                                                } else {
                                                    echo "Une erreur n'a pas pu envoyé votre email";
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                    ?>

</body>

</html>