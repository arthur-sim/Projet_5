<?php
namespace App\Controller;

use Core\Controller\Controller;
use \Core\HTML\BootstrapForm;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Commentaire');
		$this->loadModel('Category');
	}

	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		$this->render('posts.index', compact('posts', 'categories'));
	}

	public function category(){	
		$categorie = $this->Category->find($_GET['id']);
		if ($categorie === false) {
			$this->notFound();
		}
		$articles = $this->Post->lastByCategory($_GET['id']);
		$categories = $this->Category->all();
		$this->render('posts.category', compact('articles', 'categories', 'categorie'));
	}

	public function show(){
		$article = $this->Post->findWithCategory($_GET['id']);
		$commentaires = $this->Commentaire->commentaires($_GET['id']);
		$this->render('posts.show', compact('article' , 'commentaires'));
	}

	public function add_commentaire(){
		if (!empty($_POST)) {
			$result = $this->Commentaire->create([
				'nom' => $_POST['nom'],
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'date' => date("Y-m-d h_m-s")
				/**'article_id' =>**/  
			]);
			if ($result) {
				header('Location: 
					index.php?p=admin.commentaire.index');
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('posts.admin.commentaire.edit', compact('form'));
	}
}
?>