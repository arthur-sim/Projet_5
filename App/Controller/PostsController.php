<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;
use Core\Utils\Token;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Commentaire');
        $this->loadModel('Category');
    }

    public function index() {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category() {
        $categorie = $this->Category->find($_GET['id']);
        if ($categorie === false) {
            throw new HttpException(404);
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

    public function show() {
        $article = $this->Post->findWithCategory($_GET['id']);
        if ($article === false) {
            throw new HttpException(404);
        }
        $commentaires = $this->Commentaire->commentairesOn($_GET['id']);
        $this->render('posts.show', compact('article', 'commentaires'));
    }

    public function add_commentaire() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }
            if (empty($_POST['nom'])) {
                $errors['nom'] = 'Le nom ne peut pas être vide';
            }
            if (empty($_POST['titre'])) {
                $errors['titre'] = 'Le titre ne peut pas être vide';
            }
            if (empty($_POST['contenu'])) {
                $errors['contenu'] = 'Le contenu ne peut pas être vide';
            }
            if (empty($errors)) {
                $result = $this->Commentaire->create([
                    'nom' => $_POST['nom'],
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'date' => date("Y-m-d h_m-s"),
                    'article_id' => $_GET['id']
                ]);

                header('Location: index.php');
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('posts.add_commentaire', compact('form'));
    }

}
