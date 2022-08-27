<?php

require_once __DIR__ . "/../router/route/Route.php";
require_once __DIR__ . "/../router/RouterInterface.php";

class Router implements RouterInterface {

    /** @var bool $find */
    private static bool $find = false;

    /** @var null|string $base_url */
    private static $base_url = null;

    /**
     * @param string $route
     *
     * @param callable $callback
     */
    public static function group(string $base, callable $callback){
        self::$base_url = trim($base, '/');
        $callback();
        self::$base_url = null;
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function get(string $route, $callback) : Route {
        self::match('GET', $route, $callback);
        return new Route('GET', $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function post(string $route, $callback) : Route {
        self::match('POST', $route, $callback);
        return new Route('POST', $route, $callback);
    }

    /**
     * @param string $route
     * 
     * @param string|array|callback $callback
     * 
     * @return Route
     */
    public static function put(string $route, $callback) : Route {
        self::match('PUT', $route, $callback);
        return new Route('PUT', $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function patch(string $route, $callback) : Route {
        self::match('PATCH', $route, $callback);
        return new Route('PATCH', $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function delete(string $route, $callback) : Route {
        self::match('DELETE', $route, $callback);
        return new Route('DELETE', $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function options(string $route, $callback) : Route {
        self::match('OPTIONS', $route, $callback);
        return new Route('OPTIONS', $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function head(string $route, $callback) : Route {
        self::match('HEAD', $route, $callback);
        return new Route('HEAD', $route, $callback);
    }

    /**
     * @param string|array $method
     *
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return void
     */
    public static function match($method, string $route, $callback){
        if (!is_null(self::$base_url)) $route = self::$base_url . $route;
        $route = trim($route, '/');

        if (is_array($method)) {
            foreach ($method as $m) {
                self::match($m, $route, $callback);
            }
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === strtoupper($method)){
            if (trim($_SERVER['REQUEST_URI'], '/') == $route){
                self::$find = true;
                header('HTTP/1.1 200 OK', true, 200);
                self::execute($callback);
                return;
            }

            $path = preg_replace('#{([\w])+}#', '([^/]+)', $route);
            $path_to_match = "#^$path$#";

            if (preg_match_all($path_to_match, trim($_SERVER['REQUEST_URI'], '/'), $matche) && !self::$find){
                self::$find = true;
                header('HTTP/1.1 200 OK', true, 200);
                self::execute($callback, $matche);
                return;
            }
            if (!self::$find) header('HTTP/1.0 404 Not Found', true, 404);
        }
    }

    /**
     * @param string|array|callback $callback
     *
     * @param array $matche
     *
     * @return void
     */
    private static function execute($callback, ?array $matche = []){
        $matches = [];

        foreach($matche as $key => $value) {
            if ($key != 0) {
                array_push($matches, htmlspecialchars($value[0]));
            }
        }

        if (is_callable($callback)) {
            return call_user_func_array($callback, $matches);
        }

        if (is_string($callback)) {
            $callback = explode('@', $callback);
        }

        if (!class_exists($callback[0])) {
            throw new \Exception("Class {$callback[0]} not found");
        }

        $class = new $callback[0];

        if (!method_exists($class, $callback[1])) {
            throw new \Exception("Method $callback[1] not found in class $callback[0]");
        }

        return call_user_func_array([$class, $callback[1]], $matches);
    }
}
