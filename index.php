<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("./includes/head.inc.html"); ?>
</head>
<body>
<header>
    <?php include("./includes/header.inc.html"); ?>
</header>
    <div>
        <div class="row">
            <nav class="col-2 m-5">
                <a href="index.php"class="btn btn-outline-secondary col-11">Home</a>
                <?php 
                if(!empty($_SESSION)){
                    include("./includes/ul.inc.html");
                    $table = $_SESSION["table"];
                }
                ?>
            </nav>
            <section class="m-5 col-lg-8">
                <?php
                if(isset($_GET["add"])){
                 include ("includes/form.inc.html");
                }
                elseif (isset($_POST["enregistrer"])){
                    $prénom = $_POST['prénom'];
                    $nom = $_POST['nom'];
                    $age = $_POST['age'];
                    $taille = $_POST['taille'];
                    $situation = $_POST['situation'];

                    $table = array(
                        "prénom" => $prénom,
                        "nom" => $nom,
                        "age" => $age,
                        "taille" => $taille,
                        "situation" => $situation
                    );
                    $_SESSION["table"] = $table;
                    echo "<h2>Données sauvegardées</h2>";
                }
                elseif(isset($_GET["debugging"])){
                    echo "<h2>Débogage</h2>";
                    print"<pre>";
                    print_r($table);
                    print"</pre>";
                }
                elseif(isset($_GET["concatenation"])){
                    echo 
                        "<h2>Concaténation</h2>
                        <br>
                        <p>===> Construction d/'une phrase avec le contenu du tableau :</p>";
                    echo
                        "<h2>" .$table['prénom'] . " " .$table['nom']. "</h2>".
                        "<p>" .$table['age']." ans, je mesure " . $table['taille'] .
                        " et je fais partie des " .$table['situation'] . "s de la promo Simplon.</p>";
                    echo 
                        "<br>
                        <p>===> Construction d/'une pharse aprés MAJ du tableau :</p>";
                        $table['prénom'] = ucfirst ($table['prénom']); 
                        $table['nom'] = strtoupper($table['nom']);
                    echo
                        "<h2>" .$table['prénom'] . " " .$table['nom']. "</h2>".
                        "<p>" .$table['age']." ans, je mesure " . $table['taille'] .
                        " et je fais partie des " .$table['situation'] . "s de la promo Simplon.</p>";
                    echo
                        "<br>
                        <p>===> Affichage d/'une virgue à la place du point pour la taille :</p>";
                        $table['prénom'] = ucfirst ($table['prénom']); 
                        $table['nom'] = strtoupper($table['nom']);
                        $table['taille'] = str_replace('.' , ',', $table['taille']);
                    echo
                        "<h2>" .$table['prénom'] . " " .$table['nom']. "</h2>".
                        "<p>" .$table['age']." ans, je mesure " . $table['taille'] .
                        " et je fais partie des " .$table['situation'] . "s de la promo Simplon.</p>";
                }
                elseif(isset($_GET["del"])){
                    unset ($_SESSION['table']);
                    echo "<h2>Les données ont bien été supprimées</h2>";
                }
                else{
                     echo "<a href='index.php?add' class='btn btn-primary px-2'>Ajouter des données</a>";
                }
                ?>
            </section>
        </div>
    </div>
    <footer>
        <?php include("./includes/footer.inc.html"); ?>
    </footer>
</body>
</html>