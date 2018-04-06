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
        <h1 id="titre"><?php display($categorie->titre); ?></h1>
    </div>

    <div style="display: flex; font-size: 1.5em;">
        <?php foreach ($categories as $categorie): ?>
            <li><a href="<?= $categorie->url; ?>"><?php display($categorie->titre); ?></a></li>
        <?php endforeach ?>
    </div>
    <div id="posts" style="margin-top: 3%; margin-bottom: 5%;">
        <?php foreach ($articles as $post): ?>
            <h2><a href="<?= $post->url ?>"><?php display($post->titre); ?></a></h2>
            <p><em><?php display($post->categorie); ?></em></p>

            <p><?= $post->extrait; ?></p>
        <?php endforeach; ?>
    </div>
</body>