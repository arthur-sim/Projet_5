<?php
namespace App\Controller\Admin;
use Core\HTML\BootstrapForm;

class CommentairesController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Commentaire');
	}

	public function index(){
		$items = $this->Commentaire->all();
		$this->render('posts.admin.commentaire.index', compact('items'));
	}

	public function add(){
		if (!empty($_POST)) {
			$result = $this->Commentaire->create([
				'nom' => $_POST['nom'],
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu']
			]);
			if ($result) {
				header('Location: index.php?p=admin.commentaire.index');
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('posts.admin.commentaire.edit', compact('form'));
	}

	public function edit(){
		if (!empty($_POST)) {
			$result = $this->Commentaire->update($_GET['id'], [
				'nom' => $_POST['nom'],
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu']
			]);
				return $this->index();
		}
		$commentaire = $this->Commentaire->find($_GET['id']);
		$form = new BootstrapForm($commentaire);
		$this->render('posts.admin.commentaire.edit', compact('form'));
	}

	public function delete(){
		if (!empty($_POST)) {
			$result = $this->Commentaire->delete($_POST['id']);
			return $this->index();
		}
	}
}
?>