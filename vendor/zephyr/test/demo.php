<?php

require_once "app.php";

create_routes(
    [
        [
            "method" => METHOD_GET,
            "name" => "/route",
            "callback" => function(){
                echo 'Here is my first route. <a href="/route/another-route"> go ahead </a>';
            }
        ],
        [
            "method" => METHOD_GET,
            "name" => "/route/another-route",
            "callback" => function(){
                echo 'Another route grouped with <a href="/route"> /route </a>';
            }
        ],
        [
            "method" => METHOD_GET,
            "name" => "/route/id={id}",
            "callback" => function($id){
                echo $id;
            }
        ]
    ]
);

load_routes();