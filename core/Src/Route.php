<?php

namespace Src;

class Route
{
    private static $routes = [];

    private function __construct()
    {

    }

    public static function add(string $route, array $action): void
    {
        if (!array_key_exists($route, self::$routes)) {
            self::$routes[$route] = $action;
        }
    }

    public static function start(): void
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (array_key_exists($uri, self::$routes) && class_exists(self::$routes[$uri][0])) {
            $class = new self::$routes[$uri][0];
            $action = self::$routes[$uri][1];

            if (method_exists($class, $action)) {
               $class->$action();
            }
        } else throw new \Error('Данного пути не существует');
    }
}