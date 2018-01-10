<?php
namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Category');
	}

	public function index(){
		$items = $this->Category->all();
		$this->render('posts.admin.categories.index', compact('items'));
	}

	public function add(){
		if (!empty($_POST)) {
			$result = $this->Category->create([
				'titre' => $_POST['titre'],
			]);
			if ($result) {
				header('Location: index.php?p=admin.categories.index');
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('posts.admin.categories.edit', compact('form'));
	}

	public function edit(){
		if (!empty($_POST)) {
			$result = $this->Category->update($_GET['id'], [
				'titre' => $_POST['titre'],
			]);
				return $this->index();
		}
		$category = $this->Category->find($_GET['id']);
		$form = new BootstrapForm($category);
		$this->render('posts.admin.categories.edit', compact('form'));
	}

	public function delete(){
		if (!empty($_POST)) {
			$result = $this->Category->delete($_POST['id']);
			return $this->index();
		}
	}
}
?>