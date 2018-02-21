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
	    <h1 id="titre"><?php display($article->titre); ?></h1>
	</div>

	<div class="row" style="margin-top: 3%;margin-bottom: 3%;">
		<div class="col-sm-2" ></div>
		<div class="col-sm-8">
			<p><?= $article->date; ?></p>
			<p><em><?php display($article->categorie); ?></em></p>

			<p><?= $article->contenu; ?></p>

			<div style="width: 90%; margin: auto;">
				<h3>Commentaires:</h3>
                <p><em>Les commentaires sont verifiés par un administrateur</em></p>
			</div>

			<div style="width: 80%; margin: auto;">
				<?php foreach ($commentaires as $commentaire): ?>
					<div class="commentaires">
						<h2 class="commentaire_titre"><?php display($commentaire->titre); ?></h2>
						<h3 class="commentaire_nom"><?php display($commentaire->nom); ?></h3>
						<p class="commetaire_date"><em><?php display($commentaire->date); ?></em></p>
						<p class="commentaire_contenu"><?php display($commentaire->contenu); ?></p>
					</div>
				<?php endforeach ?>
				</br><p><a href="?p=posts.add_commentaire&id=<?= $_GET['id'] ?>" class="btn btn-success" >Ajouter</a></p>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>