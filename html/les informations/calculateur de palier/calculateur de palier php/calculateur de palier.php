<!doctype html>
<html lang="Fr">
<head>
    <!-- Définir le type de document -->
    <meta charset="UTF-8">
    <!-- Mettre les mots clés pour les moteurs de recherche -->
    <meta name="keywords" content="calculateur de palier de plongée a partir du modele mn90">
    <!-- Décrire le contenu de la page pour les moteurs de recherche -->
    <meta name="description" content="formulaire a remplir pour calculer les tables de plonége">
    <!-- Définir l'auteur de la page -->
    <meta name="author" content="Eliott paquet">
    <!-- Importation des feuilles de style CSS -->
    <link href="../../../General/css general.css" rel="stylesheet">
    <!-- Définir l'icône de l'onglet de la page -->
    <link href="../../../General/image/image logo.GIF" rel="icon">
    <style>
        /*mise en place du css pour la page php */
h1{
    padding:10px;
    text-align: center;
}

h2{
    padding:10px;
    text-align: center;
}

p{

    font-size:20px
}
h3{
    padding-bottom:10px;
    text-align: center;
}
    </style>
</head>
<script src="../../../general/general.js">
</script>
<body class="modifiable vers_le_haut" onload="detecterDirectionScrollbar()">
    <!-- fond pour l'animation -->
    <div class="fond_bleu">
    <!-- Image de bateau pour l'animation -->
    <div class="bateau">
        <img src="../../../General/image/bateau.png" alt="bateau pour animation">
    </div>
  </div>
    <!-- Navigation -->
    <nav>
        <!-- Premier menu déroulant -->
        <div class="dropdown">
            <button class="bouton-afficher">La plongée</button>
            <div class="contenu_a_afficher">
                <a href="../../../la plongée/pourquoi plongée/pourquoi_plongée.html">Pourquoi faire de la plongée ?</a>
                <a href="../../../la plongée/des poissons/des poissons.html">Des poissons?</a>
                <a href="../../../la plongée/les risques/les_risques.html">Les risques?</a>
                <a href="../../../la plongée/comment se former/comment se former.html">Comment se former ?</a>
            </div>
        </div>
        <!-- Deuxième menu déroulant -->
        <div class="dropdown">
            <button class="bouton-afficher">Le matériel</button>
            <div class="contenu_a_afficher">
                <a href="../../../le materiel/la combinaison/la combinaison.html">La combinaison</a>
                <a href="../../../le materiel/le bloc/le bloc.html">Le bloc</a>
                <a href="../../../le materiel/le reste/le reste.html">Le reste</a>
            </div>
        </div>
        <!-- Troisième menu déroulant -->
        <div class="dropdown">
            <button class="bouton-afficher">Les informations</button>
            <div class="contenu_a_afficher">
                <a href="../../../les informations/code sources/code sources.html">le code source</a>
                <a href="../../../les informations/informations complémentaires/informations complémentaires.html">informations complémentaire</a>
                <a href="../../../les informations/calculateur de palier/calculateur de palier html/calculateur de palier.html">Un calculateur de palier</a>
            </div>
        </div>
    </nav>

    <h1>voici vos palier :</h1>


    <?php
    //connection au server
$servername = "localhost";
$username = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=palier", $username);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connexion impossible verifier d'avoir bien configurer votre laragon d'apres le fichier README!: ";
  die;
}
$liste_duree=array(5,10,15,20,25,30,35,40,45,50,55,60);
$longueur_liste_duree=count($liste_duree);
$liste_profondeur=array(6,8,10,12,15,18,20,22,25,28,30,32,35,38,40,42,45,48,50,52,55,58,60);
$longueur_liste_profondeur=count($liste_profondeur);
$conn = new PDO("mysql:host=$servername;dbname=palier", $username);

//fonction pour arrondir les valeurs qui sont donnée par l'utilisateur
function transformer_profondeur($a,$longueur_liste_profondeur,$liste_profondeur){
    //verification que l'utilisateur n'as pas donnée une valeur superieur a celle maximal de la table de donnée
    if ($a>60){
        die("Je suis desolé mais la profondeur de $a M donné depasse ce que le programme est capable de calculer. Verifier vos donnée,faite le calcul manuellement(la table utilisée est accesible dans les informations) ou chercher d'autre table pour calculer votre profondeur.");
    }
    //parcours la liste de donnée pour trouver la premiere qui est superieur à celle donnée par l'utilisateur
    for ($y=0;$y<$longueur_liste_profondeur;$y++){
        if ($a<=$liste_profondeur[$y]){
            $a=$liste_profondeur[$y];
            return $a;
        }
    }
}
//fonction pour arrondir les valeurs qui sont donnée par l'utilisateur
function transformer_temps($b,$longueur_liste_duree,$liste_duree){
    //verification que l'utilisateur n'as pas donnée une valeur superieur a celle maximal de la table de donnée
    if ($b>60){
        die("Je suis désolée mais le temps de $b minutes  depasse ce que le programme est capable de calculer. Verifier vos donnée,fait le calcul manuellement(la table utilisée est accesible dans les informations) ou chercher d'autre table pour calculer votre temps.");
    }
    //parcours la liste de donnée pour trouver la premiere qui est superieur à celle donnée par l'utilisateur
    for ($y=0;$y<$longueur_liste_duree;$y++){
        if ($b<=$liste_duree[$y]){
            $b=$liste_duree[$y];
            return $b;
        }
    }
}
//permet de trouver le palier en le cherchant dans la table palier
function trouver_palier($a,$b,$conn){
    //connexion a la table et recperation des valeurs
    $trouver_palier = "SELECT 15M, 12M, 9M, 6M, 3M FROM palier WHERE profondeur = $a AND temps = $b";
    $palier_resultat = $conn->query($trouver_palier);
    //permet de transformer le resultat en une liste constitué uniquement de la valeur des palier
    $palier = $palier_resultat->fetchAll(PDO::FETCH_NUM);
    $palier_valeurs = array();
    foreach ($palier as $ligne) {
        foreach ($ligne as $valeur) {
            $palier_valeurs[] = $valeur;
        }
    }
    //verifie que le resultat de la recherche ne donne pas uniquement  des 999 valeurs qui permet de dire que la table mn90 ne donne pas de palier
        if (in_array(999,$palier_valeurs)){
                die ("Je suis désolée mais il n'y a aucune donnée existante pour une plongée de $b minutes à $a mètre");
    }
        return $palier_valeurs;
}
//permet de donner le GPS
function GPS($a,$b,$conn){
    //recupere le gps
    $trouver_GPS="SELECT GPS FROM palier WHERE profondeur=$a and temps=$b";
    $GPS=$conn->query($trouver_GPS);
    //converti le resultat en string
    $GPS = $GPS->fetchAll(PDO::FETCH_NUM);
    $GPS_valeurs="";
    foreach ($GPS as $ligne) {
        foreach ($ligne as $valeur) {
            $GPS_valeurs = $valeur;
        }
    }
    return $GPS_valeurs;
}
//permet de calculer la majoration en temps qu'il faut ajouter a la deuxieme fonction
function majoration($a,$b,$t,$d,$conn) {
    $GPS=GPS($a,$b,$conn);
    $trouver_azote_residuel="SELECT $t FROM evolution azote residuel WHERE GPS=$GPS";
    $azote_residuel=$conn->query($trouver_azote_residuel);
    $trouver_majoration="SELECT $d FROM azote residuel WHERE azote residuel=$azote_residuel ";
    $majoration=$conn->query($trouver_majoration);
    return $majoration;
}
//permet de rediger un texte lsisble
function text_palier ($x,$a,$b){
    echo "<h3>Voici les paliers pour une profondeur de $a mètres et $b minutes :</h3><br/>";
    $longueur_palier=count($x);
    $compteur=0;
    for($y=0;$y<$longueur_palier;$y++){
        if ($x[$y]!=0){
        $compteur+=1;
        $z=15-3*$y;
        if ($compteur==1){
            echo "<p class='text'>Tu devras faire un palier de $x[$y] minutes à $z M ";
        }
        else {
            echo "et un palier de $x[$y] minutes à $z M ";
        }}}
        echo ".</p>";
    if ($compteur==0){
        echo "<p class='texte'> Tu n'as pas de palier a faire mais je te conseil de faire un palier de securité de 3 minute à 3 mètres.</p>";
    }
}


//appele les fonction a partir du from en html
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $nom_variable => $valeur) {
         ${$nom_variable} = $valeur;
        }
    }

//appele de fonction pour la plongée_1
$profondeur_plongée_1=transformer_profondeur($profondeur_plongée_1,$longueur_liste_profondeur,$liste_profondeur);
$temps_plongée_1=transformer_temps($temps_plongée_1,$longueur_liste_duree,$liste_duree);
$palier=trouver_palier($profondeur_plongée_1,$temps_plongée_1,$conn);

echo "<h2>Voici les paliers a faire pour la premiere plongée :</h2><br>";
text_palier($palier,$profondeur_plongée_1,$temps_plongée_1);
// redige le texte


// si la checkbox est cochée calcul les palier des la deuxieme plongée et affiche le texte 
if (isset($plongée_succesive)){
    $profondeur_plongée_2=transformer_profondeur($profondeur_plongée_2,$longueur_liste_profondeur,$liste_profondeur);
    $temps_plongée_2=transformer_temps($temps_plongée_2,$longueur_liste_duree,$liste_duree)+majoration($profondeur_plongée_1,$temps_plongée_1,$temps_entre_plongée,$profondeur_plongée_2,$conn);
    $temps_plongée_2=transformer_temps($temps_plongée_2,$longueur_liste_duree,$liste_duree);
    $palier2=trouver_palier($profondeur_plongée_2,$temps_plongée_2,$conn);

    echo "<h2>Voici les paliers a faire pour la deuxieme plongée avec un temps entre les deux plongée de $temps_entre_plongée minute:</h2><br>";
    text_palier($palier2,$profondeur_plongée_2,$temps_plongée_2);
}
?>


</body>
</html>