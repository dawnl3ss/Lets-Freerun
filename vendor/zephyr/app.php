<?php

require_once "src/controller/Controller.php";
require_once "src/standard/StandardMethods.php";

const METHOD_GET = StandardMethods::METHOD_GET;
const METHOD_POST = StandardMethods::METHOD_POST;
const METHOD_PUT = StandardMethods::METHOD_PUT;
const METHOD_PATCH = StandardMethods::METHOD_PATCH;
const METHOD_DELETE = StandardMethods::METHOD_DELETE;

/**
 * Create an only Route
 *
 * @param string $method
 *
 * @param string $name
 *
 * @param $callback
 *
 * @return void
 */
function create_route(string $method, string $name, $callback){ Controller::create_route($method, $name, $callback); }

/**
 * Create many Routes in one function
 *
 * @param array $routes
 */
function create_routes(array $routes){ Controller::create_routes($routes); }

/**
 * Load all Routes
 *
 * @return void
 */
function load_routes(){ Controller::__load(); }
