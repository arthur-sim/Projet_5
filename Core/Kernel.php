<?php

include '../Config/config.php';

use Core\Exception\HttpException;

abstract class Kernel {

    static function run() {

        define('ROOT', dirname(__DIR__));
        require ROOT . '/app/App.php';
        App::load();
        require ROOT . '/core/Utils/utils.php';

        if (isset($_GET['p'])) {
            $page = $_GET['p'];
        } else {
            $page = 'posts.index';
        }

        require '../core/controller/controller.php';

        $page = explode('.', $page);
        if ($page[0] == 'admin' && count($page) === 3) {
            $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
            $action = $page[2];
        } elseif ($page[0] != 'admin' && count($page) === 2) {
            $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
            $action = $page[1];
        } else {
            throw new HttpException(404);
        }
        if (class_exists($controller)) {
            $controller = new $controller();
        } else {
            throw new HttpException(404);
        }
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            throw new HttpException(404);
        }
    }

}
