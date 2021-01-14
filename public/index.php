<?php

/**
 * Запрос пользователя
 */
$query = rtrim($_SERVER['QUERY_STRING'], '/');


define('WWW', __DIR__ . '/../'); 
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');

/**
 * Подключение файлов и библиотек
 */
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
//require '../app/controllers/Main.php';
//require '../app/controllers/Posts.php';
//require '../app/controllers/PostsNew.php';

spl_autoload_register(function($class)
{
    $file = APP . "/controllers/$class.php";
    if (is_file($file))
    {
        require_once $file;
    }
});

$router = new Router();

/**
 * Предопределенные маршруты
 */
Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);  