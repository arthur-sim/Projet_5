<!DOCTYPE html>

<head>
    <title><?= App::getInstance()->title; ?></title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style_admin.css" />
</head>

<body>

    <header>
        <div id="header_style" style="display: flex;justify-content: space-between;">
            <a href="index.php" id="head_a"><img src="css/images/house.png"></a>
            <p id="head_p">Arthur Simonian</p>  
            <a href="index.php?p=admin.posts.index" id="head_a"><img src="css/images/settings.png"></a>
        </div>
    </header>

    <div id="header">
        <h1 id="titre">Administration</h1>
    </div>

    <div style="display: flex; font-size: 1.5em;"> 
        <li ><a href="index.php?p=admin.commentaires.index">Accueil</a></li>	
        <li ><a href="index.php?p=admin.posts.index">Articles</a></li>
        <li><a href="index.php?p=admin.categories.index">Categories</a></li>	
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1>Ajout / Edition</h1>
            <form method="post">
                <?= $form->input('nom', 'Nom'); ?>
                <?php if (isset($errors['nom'])) { ?>
                    <div style="color: red;"><?php display($errors['nom']); ?></div>
                <?php } ?>
                <?= $form->input('titre', 'Titre'); ?>
                <?php if (isset($errors['titre'])) { ?>
                    <div style="color: red;"><?php display($errors['titre']); ?></div>
                <?php } ?>
                <?= $form->input('contenu', 'Contenu'); ?>
                <?php if (isset($errors['contenu'])) { ?>
                    <div style="color: red;"><?php display($errors['contenu']); ?></div>
                <?php } ?>
                <?= $form->input('verif', 'Verification'); ?>
                <?= $form->inputCsrf(); ?>
                <button class="btn btn-primary" >Sauvegarder</button>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div> 
</body>