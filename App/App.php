<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App {

    public $title = 'Portfolio';
    private static $db_instance;
    private static $_instance;

    public static function load() {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function getTable($name) {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name(self::getDb());
    }

    public static function getDb() {
        $config = config::getInstance(ROOT . '/config/config.php');
        if (is_null(self::$db_instance)) {
            self::$db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return self::$db_instance;
    }

}

?>