<?php
namespace Core\Exception;
use Core\Exception\HttpException;

abstract class HttpExceptionManager {
    static function handle(HttpException $e) {

        $codeErreur = $e->getCodeHttp();

        include '../app/views/erreurs.php';

            /** case 404: 
                header('Location: index.php');
                echo '404';
                break;
                
            case 500: 
                echo '500';
                var_dump($e->getPrevious());
                break;
                
            default:
                echo $e->getCodeHttp();
                break; **/
    }
}