<?php

require_once __DIR__ . "/../RouterInterface.php";

class RouteCollector implements RouterInterface {

    /** @var string $base */
    private static string $base;

    /**
     * @param string $base
     *
     * @return RouteCollector
     */
    public static function new(string $base){
        self::$base = trim($base, '/') . '/';
        return new self();
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function get(string $route, $callback) : Route {
        return Router::get(self::$base . trim($route, '/'), $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function post(string $route, $callback) : Route {
        return Router::post(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function put(string $route, $callback) : Route {
        return Router::put(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function patch(string $route, $callback) : Route {
        return Router::patch(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function delete(string $route, $callback) : Route {
        return Router::delete(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function options(string $route, $callback) : Route {
        return Router::options(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function head(string $route, $callback) : Route {
        return Router::head(self::$base . $route, $callback);
    }
}
