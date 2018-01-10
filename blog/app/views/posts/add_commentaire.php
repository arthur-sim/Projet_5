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
	<div class="row" id="banderolle-contact" style="background-color:#4381e0; height: 7vh;">
	    <div class="col-sm-1"></div>
	    <div class="col-sm-11">
			<a href="index.php?p=admin.categories.index">Accueil</a>	
			<a href="index.php?p=admin.posts.index">Posts</a>
			<a href="index.php?p=admin.categories.index">Categories</a>	
		</div>
	</div>

	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<h1>Ajout / Edition</h1>
			<form method="post">
				<?= $form->input('nom', 'Nom'); ?>
				<?= $form->input('titre', 'Titre'); ?>
				<?= $form->input('contenu', 'Contenu'); ?>
				<button class="btn btn-primary" >Sauvegarder</button>
			</form>
		</div>
		<div class="col-sm-2"></div>
	</div> 
</body>