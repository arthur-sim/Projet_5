<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Utils\Token;

class CommentairesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Commentaire');
    }

    public function index() {
        $items = $this->Commentaire->all();
        if ($items === false) {
            throw new HttpException(404);
        }
        $form = new BootstrapForm();
        $this->render('posts.admin.commentaire.index', compact('items', 'form'));
    }

    public function edit() {
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
                $result = $this->Commentaire->update($_GET['id'], [
                    'nom' => $_POST['nom'],
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'verif' => $_POST['verif']
                ]);
                return $this->index();
            }
        }
        $commentaire = $this->Commentaire->find($_GET['id']);
        $form = new BootstrapForm($commentaire);
        $this->render('posts.admin.commentaire.edit', compact('form'));
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
                    $result = $this->Commentaire->delete($_POST['id']);

                    return $this->index();
                }
            }
        }
    }

}
