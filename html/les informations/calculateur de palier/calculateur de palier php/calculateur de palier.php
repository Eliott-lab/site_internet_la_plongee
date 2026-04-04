<!doctype html>
<html lang="Fr">
<head>
    <!-- Définir le type de document -->
    <meta charset="UTF-8">
    <!-- Mettre les mots clés pour les moteurs de recherche -->
    <meta name="keywords" content="calculateur de palier de plongée a partir du modèle mn90">
    <!-- Décrire le contenu de la page pour les moteurs de recherche -->
    <meta name="description" content="formulaire a remplir pour calculer les tables de plongée">
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

    <h1>Voici vos palier :</h1>


    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $dbname = "palier";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "<p>Erreur de connexion : " . htmlspecialchars($e->getMessage()) . "</p>";
        die;
    }

    // Listes de référence pour arrondir les valeurs de profondeur et de temps
    $liste_duree = array(5,10,15,20,25,30,35,40,45,50,55,60);
    $liste_profondeur = array(6,8,10,12,15,18,20,22,25,28,30,32,35,38,40,42,45,48,50,52,55,58,60);
    $liste_temps = array(15,30,45,60,90,120,150,210,240,270,300,330,360,390,420,450,480,510,540,570,600,630,690,720);

    // Fonctions d'arrondi
    function transformer_profondeur($a, $liste_profondeur) {
        if ($a > 60) {
            die("Je suis désolé mais la profondeur de $a M dépasse les capacités de calcul. Vérifiez vos données.");
        }
        foreach ($liste_profondeur as $profondeur) {
            if ($a <= $profondeur) {
                return $profondeur;
            }
        }
    }

    function transformer_temps($b, $liste_duree) {
        if ($b > 60) {
            die("Je suis désolée mais le temps de $b minutes dépasse les capacités de calcul. Vérifiez vos données.");
        }
        foreach ($liste_duree as $duree) {
            if ($b <= $duree) {
                return $duree;
            }
        }
    }

    function transformer_temps_entre($t, $liste_temps) {
        if ($t > 720) {
            die("Je suis désolée mais le temps de $t minutes dépasse les capacités de calcul. Vérifiez vos données.");
        }
        foreach ($liste_temps as $temps) {
            if ($t <= $temps) {
                return $temps;
            }
        }
    }

    // Fonctions de calcul des paliers et GPS
    function trouver_palier($a, $b, $conn) {
        $trouver_palier = $conn->prepare("SELECT 15M, 12M, 9M, 6M, 3M FROM palier WHERE profondeur = :profondeur AND temps = :temps");
        $trouver_palier->execute(['profondeur' => $a, 'temps' => $b]);
        $palier = $trouver_palier->fetch(PDO::FETCH_NUM);

        if (in_array(999, $palier)) {
            die("Je suis désolée mais il n'y a aucune donnée pour une plongée de $b minutes à $a mètres.");
        }

        return $palier;
    }

    function GPS($a, $b, $conn) {
        $trouver_GPS = $conn->prepare("SELECT GPS FROM palier WHERE profondeur = :profondeur AND temps = :temps");
        $trouver_GPS->execute(['profondeur' => $a, 'temps' => $b]);
        return $trouver_GPS->fetchColumn();
    }

    function majoration($a, $b, $t, $d, $conn, $liste_temps) {
        $GPS = GPS($a, $b, $conn);
        $t = transformer_temps_entre($t, $liste_temps);
        $trouver_azote_residuel = $conn->prepare("SELECT $t FROM evolution_azote_residuel WHERE GPS = :GPS");
        $trouver_azote_residuel->execute(['GPS' => $GPS]);
        $azote_residuel = $trouver_azote_residuel->fetchColumn();

        $trouver_majoration = $conn->prepare("SELECT $d FROM azote_residuel WHERE quantite_azote_residuel = :azote");
        $trouver_majoration->execute(['azote' => $azote_residuel]);
        return (int)$trouver_majoration->fetchColumn();
    }

    // Fonction d'affichage des paliers
    function text_palier($x, $a, $b) {
        echo "<h3>Voici les paliers pour une profondeur de $a mètres et $b minutes :</h3><br/>";
        $compteur = 0;
        foreach ($x as $y => $valeur) {
            if ($valeur != 0) {
                $compteur++;
                $z = 15 - 3 * $y;
                if ($compteur == 1) {
                    echo "<p class='text'>Tu devras faire un palier de $valeur minutes à $z M ";
                } else {
                    echo "et un palier de $valeur minutes à $z M ";
                }
            }
        }
        echo ".</p>";
        if ($compteur == 0) {
            echo "<p class='texte'>Tu n'as pas de palier à faire mais je te conseille de faire un palier de sécurité de 3 minutes à 3 mètres.</p>";
        }
    }

    // Traitement des données soumises
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($_POST as $nom_variable => $valeur) {
            ${$nom_variable} = htmlspecialchars($valeur);
        }

        // Calcul pour la première plongée
        $profondeur_plongée_1 = transformer_profondeur($profondeur_plongée_1, $liste_profondeur);
        $temps_plongée_1 = transformer_temps($temps_plongée_1, $liste_duree);
        $palier = trouver_palier($profondeur_plongée_1, $temps_plongée_1, $conn);

        echo "<h2>Voici les paliers à faire pour la première plongée :</h2><br>";
        text_palier($palier, $profondeur_plongée_1, $temps_plongée_1);

        // Calcul pour la deuxième plongée (si applicable)
        if (isset($plongée_successive) && $profondeur_plongée_2 && $temps_plongée_2 && $temps_entre_plongée) {
            $profondeur_plongée_2 = transformer_profondeur($profondeur_plongée_2, $liste_profondeur);
            $temps_plongée_2 = transformer_temps($temps_plongée_2, $liste_duree) + majoration($profondeur_plongée_1, $temps_plongée_1, $temps_entre_plongée, $profondeur_plongée_2, $conn, $liste_temps);
            $temps_plongée_2 = transformer_temps($temps_plongée_2, $liste_duree);
            $palier2 = trouver_palier($profondeur_plongée_2, $temps_plongée_2, $conn);

            echo "<h2>Voici les paliers à faire pour la deuxième plongée :</h2><br>";
            text_palier($palier2, $profondeur_plongée_2, $temps_plongée_2);
        } else {
            echo "<p>Impossible de calculer les paliers pour la deuxième plongée. Veuillez vérifier les informations fournies.</p>";
        }
    }
    ?>


</body>
</html>
