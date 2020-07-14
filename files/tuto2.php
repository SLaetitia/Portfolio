<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tuto Menu déroulant</title>
</head>
<body>
<!-- Barre de navigation -->

<?php
include "navbar.php";
?>

<!-- Tutoriels personelle-->
<div class="bloctxt">
    <h1> Tuto d'un menu déroulant </h1>

    <p>Part ce tutoriel je vais vous expliquer comment faire un menu déroulant. </p>


    <h2>Onglets principaux</h2>
    <div class="paratuto">
        <p>Commençons d'abord par créer dans un même dossier 7 pages dans notre éditeur.<br>
            5 pages avec notre structure html de base et nommez-les par exemple:</p>
        <ul>
            <li>index.html</li>
            <li>menu.html</li>
            <li>page1.html</li>
            <li>page2.html</li>
            <li>page3.html</li>
            <li>contact.html</li>
            <li>et un styles.css</li>

        </ul>
        <p> ! Ne pas oublier de bien lier notre page css dans le head avec &lt;link&gt; </p>
        <p>Notre page index.html va nous servir à accueillir notre menu déroulant et les autres pages seront les pages
            de destination pour les onglets principaux du menu. </p>


        <p>Nous allons structurer notre menu dans la balise &lt;nav&gt; avec à l'intérieur les balises &lt;ul&gt; pour
            créer les onglets principaux du menu et &lt;li&gt; qui amèneront vers la page voulue. </p>
        <p>Nous pouvons mettre aussi une classe à l'intérieur d'un li (ex: &lt;li class="…" &gt; ) ce qui nous permettra
            de mieux le cibler dans notre css.</p>
        <p>Voilà ce que contient le premier niveau de notre menu, maintenant nous allons faire la seconde partie qui
            correspond au sous-onglet. </p>
    </div>

    <h2> Sous-onglets </h2>
    <div class="paratuto">
        <p>Pour crée un sous onglet il va falloir à la fin de notre balise &lt;a&gt; et juste avant la fermeture du &lt;li&gt;
            ou nous avons mis la class "menu" lui réouvrir une nouvelle fois les balises &lt;ul&gt; et &lt;li&gt; à
            l'intérieur qui vont correspondre à nos sous onglet et aussi lui donné une class.
        </p>
        <p>Et bien sûr toujours dans notre fichier index.html</p>
        <p>Voici à quoi cela devrait ressemble pour le moment.<br>
            Maintenant nous allons le mettre en forme avec la partie css.</p>
    </div>


    <h2>Mise en forme css</h2>
    <div class="paratuto">
        <p>Dans l'onglet style.css nous allons cibler notre body pour faire un <strong>margin</strong> et un <strong>padding</strong>
            à 0 PX pour enlever toutes les marges et faire pareil pour notre élément du menu principale</p>
        <p>pour cibler que l'élément principale nous allons utiliser le sélecteur (ex : nav&gt;ul) ce qui signifie que
            nous ciblons uniquement les enfants directs de notre élément <strong>nav</strong></p>
        <p>Enlevons ensuite les puces devant tous nos &lt;li&gt; en sélectionnant <strong>nav li</strong> avec la
            propriété <strong>list-style-type&colon; none&semi; </strong></p>
        <p>mettons les cotes à cotes en sélectionnant les enfants direct<strong>nav&gt;ul&gt;li</strong> avec <strong>
                float&colon;left&semi;</strong>
        </p>
        <p>ce qui devrait nous donner ce résultat</p>

        <p>Ensuite étirons notre nav à 100 % de la taille de la page avec <strong>width&colon; 100%&semi;</strong> et
            pourquoi pas lui donnée une couleur grâce à <strong>background-color&colon; </strong> à vous de choisir
            celle qui vous plait</p>
        <p>Dans <strong>nav&gt;ul&gt;li</strong> nous allons aussi leurs donnez <strong>position relative</strong> ce
            qui nous sera bien utile pour positionner les sous onglets sous les onglets. </p>

        <p>on doit appliquer un clear fix css sur notre liste ul principale car quand un élément parent non flottant
            possède des enfants flottant le css va faire collapser le parent qui va avoir une hauteur de 0 px, dans
            notre cas nous allons devoir utiliser <strong>after&comma; display et clear.</strong><br>
            Nous faisons cela car nos élément li flotte à gauche et que notre liste ul ne flotte pas. </p>

        <p>maintenant occupons nous du style de nos liens <strong>nav li </strong> pour enlever le soulignement <strong>list&minus;style&minus;type&colon;
                none&semi; </strong> changeons aussi le display de l'élément pour pouvoir étendre la taille de l'onglet
            et pour que l'onglet reste cliquable<strong>nav a</strong> avec <strong>display&colon;
                inline-block&semi;</strong> et <strong>text&minus; decoration&colon; none&semi;</strong></p>
        <p>mettons un padding à l'élément <strong> nav&lt;ul&lt; li&lt; à padding: 20px 30px&semi;</strong> et une
            couleur de votre choix. </p>

        <p>pour que nos sous menus soient positionnés sous le menu principal, et qu'il s'affiche uniquement au passage
            de la souris. </p>
        <pre><strong>nav li:hover .submenu{<br>
                display : inline-block&semi;<br>
                position : absolute&semi;<br>
                top : 100%&semi;<br>
                left : 0px&semi;<br>
                padding : 0px&semi;<br>
                } </strong></pre>

        <p>on ajoute une bordure fine entre nos éléments sous menu avec </p><strong>
                <pre>.submenu li {
                border-bottom: 1px solid black&semi;
                }<pre></pre>
        </strong>

        <p>ainsi qu'une largeur fixe à nos liens de sous menu et ajouter une petite marge intérieure, changer la taille
            et la couleur de l'écriture.</p>
        <pre><strong>.submenu li a{<br>
                padding: 15px 30px;<br>
                font-size: 13px;<br>
                color: white;<br>
                width: 270px;<br>
                }</strong></pre>

        <p>on peut ajouter une couleur de fond à notre menu uniquement visible au passage de la souris avec un<strong>
                background-color</strong> sur</p>
        <p><strong> .menu .submenu </strong>mais aussi <strong>.menu:hover</strong> ou aussi <strong> nav&lt;ul&lt;li&lt;a:hover </strong>
        </p>
        <p>ce qui donne ceci</p>


        <p>et pour terminer on va styliser notre élément a dans notre sous menu pour que l'écriture apparait en gras
            lors du passage de souris.</p>
        <pre><strong>.submenu li:hover a{<br>
                color:black;<br>
                font-weight: bold;</strong><br>
        </pre>
    </div>
</div>

</body>
<!-- ??? Footer ??? -->

</html>
