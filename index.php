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
                    $situation = $_POST['formappRadio'];

                    $table = array(
                        "prénom" => $prénom,
                        "nom" => $nom,
                        "age" => $age,
                        "taille" => $taille,
                        "formappRadio" => $situation
                    );
                    $_SESSION["table"] = $table;
                    echo "<h2>Données sauvegardées</h2>";
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