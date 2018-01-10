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

	<div class="row" style="margin-top: 3%;margin-bottom: 3%;">
		<div class="col-sm-2" ></div>
		<div class="col-sm-8">
			<h1>Administrer les articles</h1>
			<table class="table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Titre</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($posts as $post): ?>
						<tr>
							<td><?= $post->id; ?></td>
							<td><?= $post->titre; ?></td>
							<td>
								<a class="btn btn-primary" style="border-radius: 0%;" href="?p=admin.posts.edit&id=<?= $post->id; ?>">Editer</a>
								<form action="?p=admin.posts.delete" method="post" style="display: inline;">
								    <input type="hidden" name="id" value="<?= $post->id ?>">
								    <button type="submit" class="btn btn-danger" style="border-radius: 0%;">Suprimmer</button>
								</form>
							</td>
						</tr>
					<?php endforeach ;?> 
				</tbody>
			</table>
			<p>
				<a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
			</p>
		</div>
	</div>
</body>