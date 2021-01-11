<?php

/**
 * Маршрутизатор
 */

class Router
{
    /**
     * $routes - таблица наших маршрутов
     * $route - текущий маршрут
     */
    protected static $routes = [];
    protected static $route = [];

    
    /**
     * Добавление нового маршрута
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращение таблицы маршрутов
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Возвращение текущего маршрута
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Ищет совпадения с запросом в таблице маршрутов
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if ($url == $pattern)
            {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
}
