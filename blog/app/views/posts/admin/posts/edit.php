<!DOCTYPE html>

<head>
	<title><?= App::getInstance()->title; ?></title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style_admin.css" />
</head>

<body>
	<div id="header">
	    <h1 id="titre">Administration</h1>
	</div>

	<div style="display: flex; font-size: 1.5em;"> 
    	<li style="color: #333333;"><a href="index.php?p=admin.posts.index">Accueil</a></li>	
		<li style="color: #333333;"><a href="index.php?p=admin.categories.index">Categories</a></li>
		<li style="color: #333333;"><a href="index.php?p=admin.commentaires.index">Commentaires</a></li>	
  	</div>

	</br>

		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<h1>Ajout / Edition</h1>

				<form method="post">
					<?= $form->input('titre', 'Titre de l\'article'); ?>
					<?= $form->input('contenu', 'Contenu', ['type' => 'textearea']); ?>
					<?= $form->select('category_id', 'catégorie', $categories); ?>
					<button class="btn btn-primary">Sauvegarder</button>
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div> 
	</br>
</body>