<?php
require "bin/config.php";
$connect = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT)
    or die(mysqli_error($connect));
mysqli_set_charset($connect, DB_CHARSET);
/* Page contrôleur frontal */
/* Ajouter les liens vers les pages a la place de "page" */
if (!isset($_GET["p"])) {
    include "files/accueil.php";

} else {
    $p = $_GET["p"];

    switch ($p) {
        case "galerie":
            include "files/galerie.php";
            break;
        case "liens":
            include "files/liens.php";
            break;
        case "tuto":
            include "files/tuto.php";
            break;
        case "tuto2":
            include "files/tuto2.php";
            break;
        case "contact":
            include "files/contact.php";
            break;
        case "mail":
            include "files/mail.php";
            break;
        case "connexion":
            include "files/connexion.php";
            break;
        case "crud":
            include "files/accueilcrud.php";
            break;
        case "deconnexion":
            include "files/deconnexion.php";
            break;
        case "crudliens":
            include "files/crudliens.php";
            break;
        case "crudgalerie":
            include "files/crudgalerie.php";
            break;
        case "modifierliens":
            include "files/modifierliens.php";
            break;
        case "supprimerliens":
            include "files/supprimerliens.php";
            break;
        case "createliens":
            include "files/createliens.php";
            break;
        default:
            include "files/accueil.php";

    }
}
?>