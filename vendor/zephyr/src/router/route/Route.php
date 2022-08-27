<?php

class Route {

    /** @var string $method */
    private string $method;

    /** @var string $route */
    private string $route;

    /** @var $callback */
    private $callback;

    public function __construct(string $method, string $route, $callback){
        $this->method = $method;
        $this->route = $route;
        $this->callback = $callback;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function name(string $name) : self {
        self::$routes[$name] = $this->route;
        return $this;
    }

    public function previous() : void {
        $previous = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $previous", true, 302);
        return;
    }

    /**
     * @return string
     */
    public function get_method() : string { return $this->method; }

    /**
     * @return string
     */
    public function get_route() : string { return $this->route; }

    /**
     * @return mixed
     */
    public function get_callback(){ return $this->callback; }
}
