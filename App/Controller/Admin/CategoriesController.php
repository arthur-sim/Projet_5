<?php
namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Utils\Token;

class CategoriesController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index()
    {
        $items = $this->Category->all();
        if ($items === false) {
            throw new HttpException(404);
        }
        $form = new BootstrapForm();
        $this->render('posts.admin.categories.index', compact('items' , 'form'));
    }

    public function add()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }

            if (empty($errors)) {
                if (!empty($_POST)) {
                    $result = $this->Category->create([
                        'titre' => $_POST['titre'],
                    ]);

                    header('Location: index.php?p=admin.categories.index');
                }
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('posts.admin.categories.edit', compact('form'));
    }

    public function edit()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }

            if (empty($errors)) {
                if (!empty($_POST)) {
                    $result = $this->Category->update($_GET['id'], [
                        'titre' => $_POST['titre'],
                    ]);
                    return $this->index();
                }
            }
        }
        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('posts.admin.categories.edit', compact('form'));
    }

    public function delete()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            } elseif (!Token::verify($_POST['csrf'])) {
                $errors['csrf'] = 'Token csrf invalide, veuillez renvoyer le formulaire';
            }

            if (empty($errors)) {
                if (!empty($_POST)) {
                    $result = $this->Category->delete($_POST['id']);

                    return $this->index();
                }
            }
        }
    }

}