<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<!-- ****************INCLUDE PAGE HEAD****************** -->
<head>
    <?php include("./includes/head.inc.html"); ?> 
</head>

<body>
<!-- *********************INCLUDE PAGE HEADER*********************** -->
<header>
    <?php include("./includes/header.inc.html"); ?> 
</header>
<!-- **********************NAV**************************** -->
    <div>
        <div class="container-fluid row mx-0">
            <nav class="col-sm-2 my-3">
                <a href="index.php"><button class="btn btn-outline-secondary btn-block">Home</button></a>
                <?php 
                    if(!empty($_SESSION)){
                        include("./includes/ul.inc.html");
                        $table = $_SESSION["table"];
                    }
                ?>
            </nav>
<!-- *************************SECTION***************************** -->
            <section class=" col-sm-9">
                <?php
                    if(isset($_GET["add"])){
                        include ("includes/form.inc.html");
                    }
                    //DECLARATION VARIABLE TABLE
                    elseif (isset($_POST["enregistrer"])){
                        $prénom = $_POST['prénom'];
                        $nom = $_POST['nom'];
                        $age = $_POST['age'];
                        $taille = $_POST['taille'];
                        $situation = $_POST['situation'];

                        $table = array(
                            "first_name" => $prénom,
                            "last_name" => $nom,
                            "age" => $age,
                            "size" => $taille,
                            "situation" => $situation
                        );
                        $_SESSION["table"] = $table;
                        echo "<h2>Données sauvegardées</h2>";
                    }
                    //DEBOGAGE
                    elseif(isset($_GET["debugging"])){
                        echo "<h2>Débogage</h2>";
                        print"<pre>";
                        print_r($table);
                        print"</pre>";
                    }
                    //CONCATENATION
                    elseif(isset($_GET["concatenation"])){
                        echo 
                            "<h2>Concaténation</h2>
                            <br>
                            <p>===> Construction d/'une phrase avec le contenu du tableau :</p>";
                        echo
                            "<h2>" .$table['first_name'] . " " .$table['last_name']. "</h2>".
                            "<p>" .$table['age']." ans, je mesure " . $table['size'] .
                            " et je fais partie des " .$table['situation'] . "s de la promo Simplon.</p>";
                        echo 
                            "<br>
                            <p>===> Construction d/'une pharse aprés MAJ du tableau :</p>";
                            $table['first_name'] = ucfirst ($table['first_name']); 
                            $table['last_name'] = strtoupper($table['last_name']);
                        echo
                            "<h2>" .$table['first_name'] . " " .$table['last_name']. "</h2>".
                            "<p>" .$table['age']." ans, je mesure " . $table['size'] .
                            " et je fais partie des " .$table['situation'] . "s de la promo Simplon.</p>";
                        echo
                            "<br>
                            <p>===> Affichage d/'une virgue à la place du point pour la taille :</p>";
                            $table['first_name'] = ucfirst ($table['first_name']); 
                            $table['last_name'] = strtoupper($table['last_name']);
                            $table['size'] = str_replace('.' , ',', $table['size']);
                        echo
                            "<h2>" .$table['first_name'] . " " .$table['last_name']. "</h2>".
                            "<p>" .$table['age']." ans, je mesure " . $table['size'] .
                            " et je fais partie des " .$table['situation'] . "s de la promo Simplon.</p>";
                    }
                    //BOUCLE
                    elseif(isset($_GET["loop"])){
                        echo
                            "<h2>Boucle</h2>
                            <br>
                            <p>===> Lecture du tableau à l'aide d'une boucle foreach</p>";
                        $i = 0;
                        foreach ($table as $key => $value){
                            echo
                                'à la ligne n°' .$i++.' correspond la clé "'.$key. '" et contient ' .$value."<br>"; 
                        }
                    }
                    //FUNCTION
                    elseif(isset($_GET["function"])){
                        echo
                            "<h2>Fonction</h2>
                            <br>
                            <p>===> J'utilise ma fonction readTable()</p>";
                        readTable($table);
                    }
                    //DELETE
                    elseif(isset($_GET["del"])){
                        unset ($_SESSION['table']);
                        echo "<h2>Les données ont bien été supprimées</h2>";
                    }
                    else{
                        echo "<a href='index.php?add' class='btn btn-primary my-3'>Ajouter des données</a>";
                    }
                    function readTable ($table) {
                        $i = 0;
                        foreach ($table as $key => $value){
                            echo
                                'à la ligne n°' .$i++.' correspond la clé "'.$key. '" et contient ' .$value."<br>"; 
                        }
                    }
                ?>
            </section>
        </div>
    </div>
<!-- *********************************FOOTER****************************** -->
    <footer>
        <?php include("./includes/footer.inc.html"); ?> 
    </footer>
</body>
</html>