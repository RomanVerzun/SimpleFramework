<?php

/**
 * Запрос пользователя
 */
$query = rtrim($_SERVER['QUERY_STRING'], '/');

/**
 * Подключение файлов и библиотек
 */
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

$router = new Router();

/**
 * Предопределенные маршруты
 */
Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);

debug(Router::getRoutes());

if (Router::matchRoute($query)) {
    debug(Router::getRoute());
} else
{
    echo "404";
}