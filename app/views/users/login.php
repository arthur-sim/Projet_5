

<!DOCTYPE html>

<head>
	<title><?= App::getInstance()->title; ?></title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style_login.css" />
	<link rel="stylesheet" href="css/style_admin.css" />
</head>

<body>
	<div id="header">
	    <h1 id="titre">Administration</h1>
	</div>

	<div class="row" style="margin-top: 2%;margin-bottom: 5%;">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<h1>Identifiez-vous</h1>
			<?php if($errors): ?>
				<div class="alert alert-danger">
					identifiants incorrects
				</div>
			<?php endif; ?>
			<form method="post">
				<?= $form->input('username', 'Pseudo'); ?>
				<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
				<button class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>
</body>
