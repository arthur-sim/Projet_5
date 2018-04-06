<?php

namespace Core\Exception;

use Core\Exception\HttpException;

abstract class HttpExceptionManager {

    static function handle(HttpException $e) {

        $codeErreur = $e->getCodeHttp();

        include '../app/views/erreurs.php';
    }

}
