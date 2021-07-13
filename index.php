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
                <a href=""class="btn btn-outline-secondary col-11">Home</a>
                <?php include("./includes/ul.inc.html"); ?>
            </nav>
            <section class="m-5 col-8">
                <?php
                if(isset($_GET["add"])){
                 include ("includes/form.inc.html");
                }
                else{ ?>
                 <a href="index.php?add" class="btn btn-primary px-2">Ajouter des données</a>
                <?php
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