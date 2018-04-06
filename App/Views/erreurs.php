<!DOCTYPE html>

<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style_admin.css" />
</head>

<body>


    <div id="header">
        <h1 id="titre"> <?= $codeErreur; ?> </h1>
    </div> 

    <div style="text-align: center">
        <?php
        if ($codeErreur === 404) {
            echo '  
                        <h1>Page introuvable<h1>
                        <btn><a href="index.php">Retour a laccueil</a></btn>
                        ';
        } else {
            echo '  
                        <h1>Erreur base de données<h1>
                        <btn><a href="index.php">Retour a laccueil</a></btn>
                        ';
        }
        ?>
    </div>

</body>