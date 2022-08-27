<?php

require_once __DIR__ . "/../router/route/Route.php";
require_once __DIR__ . "/../router/Router.php";

class Controller {

    /** @var Route[] $route_list */
    public static $route_list = [];

    public static function __load(){
        foreach (self::$route_list as $route){
            Router::{$route->get_method()}($route->get_route(), $route->get_callback());
        }
    }

    /**
     * @param string $method
     *
     * @param string $name
     *
     * @param $callback
     *
     * @return void
     */
    public static function create_route(string $method, string $name, $callback){
        array_push(self::$route_list, new Route($method, $name, $callback));
    }

    /**
     * @param array $routes
     */
    public static function create_routes(array $routes){
        foreach ($routes as $route){
            create_route($route["method"], $route["name"], $route["callback"]);
        }
    }
}