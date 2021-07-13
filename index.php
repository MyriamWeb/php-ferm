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
                <button type="button" class="btn btn-outline-secondary col-11">Home</button>
                <?php include("./includes/ul.inc.html"); ?>
            </nav>
    <section class="m-5 col-8">
        <button class="btn btn-primary" type="submit">Ajouter des données</button>
        <?php include ("./includes/form.inc.html"); ?>
    </section>
        </div>
    </div>
    <footer>
        <?php include("./includes/footer.inc.html"); ?>
    </footer>
</body>
</html>