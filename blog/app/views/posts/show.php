<!DOCTYPE html>

<head>
	<title><?= App::getInstance()->title; ?></title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style_admin.css" />
</head>

<body>
	<div id="header">
	    <h1 id="titre"><?= $article->titre; ?></h1>
	</div>

	<div class="row" style="margin-top: 3%;margin-bottom: 3%;">
		<div class="col-sm-2" ></div>
		<div class="col-sm-8">
			<p><em><?= $article->categorie; ?></em></p>

			<p><?= $article->contenu; ?></p>

			<div style="width: 90%; margin: auto;">
				<h3>Commentaires:</h3>
			</div>

			<div style="width: 80%; margin: auto;">
				<?php foreach ($commentaires as $commentaire): ?>
					<div class="commentaires">
						<h3 class="commentaire_title"><?= $commentaire->nom; ?></h3>

						<p class="commentaire_contenu"><?= $commentaire->contenu; ?></p>
					</div>
				<?php endforeach ?>
				</br><p><a href="?p=posts.add_commentaire" class="btn btn-success" >Ajouter</a></p>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>