<?php

require_once __DIR__ . "/../../vendor/zephyr/app.php";

function __acces(){
    create_route(METHOD_GET, '/test', function (){
        echo "test";
    });
}