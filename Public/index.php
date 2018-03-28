<?php 
include '../core/Kernel.php';
use \Core\Exception\HttpExceptionManager;
use \Core\Exception\HttpException;

try {
    Kernel::run();
} catch (HttpException $e) {
    HttpExceptionManager::handle($e);
} catch (\Exception $e) {
    HttpExceptionManager::handle(new HttpException(500, $e));
}