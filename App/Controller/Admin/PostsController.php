<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Utils\Token;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index() {
        $posts = $this->Post->all();
        if ($posts === false) {
            throw new HttpException(404);
        }
        $form = new BootstrapForm();
        $this->render('posts.admin.posts.index', compact('posts', 'form'));
    }

    public function add() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }
            if (empty($_POST['titre'])) {
                $errors['titre'] = 'Le titre ne peut pas être vide';
            }
            if (empty($_POST['contenu'])) {
                $errors['contenu'] = 'Le contenu ne peut pas être vide';
            }

            if (empty($errors)) {
                $result = $this->Post->create([
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'category_id' => $_POST['category_id'],
                    'date' => date("Y-m-d h_m-s")
                ]);
                header('Location: index.php?p=admin.posts.index');
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('posts.admin.posts.edit', compact('categories', 'form', 'errors'));
    }

    public function edit() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }
            if (empty($_POST['titre'])) {
                $errors['titre'] = 'Le titre ne peut pas être vide';
            }
            if (empty($_POST['contenu'])) {
                $errors['contenu'] = 'Le contenu ne peut pas être vide';
            }
            if (empty($errors)) {
                $result = $this->Post->update($_GET['id'], [
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'category_id' => $_POST['category_id']
                ]);

                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('posts.admin.posts.edit', compact('categories', 'form'));
    }

    public function delete() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }

            if (empty($errors)) {
                if (!empty($_POST)) {
                    $result = $this->Post->delete($_POST['id']);

                    return $this->index();
                }
            }
        }
    }

}
