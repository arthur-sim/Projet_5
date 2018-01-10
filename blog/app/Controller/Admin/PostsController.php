<?php
namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
	}

	public function index(){
		$posts = $this->Post->all();
		$this->render('posts.admin.posts.index', compact('posts'));
	}

	public function add(){
		if (!empty($_POST)) {
			$result = $this->Post->create([
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'category_id' => $_POST['category_id'],
				'date' => date("Y-m-d h_m-s")
			]);
			if ($result) {
				header('Location: index.php?p=admin.posts.index');
			}
		}
		$this->loadModel('Category');
		$categories = $this->Category->extract('id', 'titre');
		$form = new BootstrapForm($_POST);
		$this->render('posts.admin.posts.edit', compact('categories', 'form'));
	}

	public function edit(){
		if (!empty($_POST)) {
			$result = $this->Post->update($_GET['id'], [
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'category_id' => $_POST['category_id']
			]);
			if ($result) {
				return $this->index();
			}
		}
		$post = $this->Post->find($_GET['id']);
		$this->loadModel('Category');
		$categories = $this->Category->extract('id', 'titre');
		$form = new BootstrapForm($post);
		$this->render('posts.admin.posts.edit', compact('categories', 'form'));
	}

	public function delete(){
		if (!empty($_POST)) {
			$result = $this->Post->delete($_POST['id']);
			return $this->index();
		}
	}
}
?>