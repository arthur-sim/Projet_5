<?php
namespace Core\Exception;
use Core\Exception\HttpException;

abstract class HttpExceptionManager {
    static function handle(HttpException $e) {
        switch ($e->getCodeHttp()) {
            case 404: 
                echo '404';
                break;
                
            case 500: 
                echo '500';
                var_dump($e->getPrevious());
                break;
                
            default:
                echo $e->getCodeHttp();
                break;
        }
    }
}