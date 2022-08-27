<?php

require_once __DIR__ . "/../Autoloader.php";
__load_all_classes();

function __acces(){
    create_routes(
        [
            [
                "method" => METHOD_GET,
                "name" => "/",
                "callback" => function(){
                    require_once "view/home.view.php";
                }
            ],
            [
                "method" => METHOD_POST,
                "name" => '/',
                "callback" => function(){
                    if (isset($_POST["submit-request"])){
                        $_NPOST = array_map(function ($value){
                            return xss_counter($value);
                        }, $_POST);

                        $spot = new Spot($_NPOST["name"], TieredSpot::SPOT_ALL, new Location($_NPOST["country"], $_NPOST["city"], $_NPOST["street"], (float)$_NPOST["latitude"], (float)$_NPOST["longitude"]), new UID());

                        (new SQLSession())->table("spot_requests")->insert(
                            ["name", "location", "description"],
                            [$spot->get_name(), $spot->get_location()->encode(), $_NPOST["description"]]
                        )->close();
                    }
                }
            ],
            [
                "method" => METHOD_GET,
                "name" => "/favorites",
                "callback" => function(){
                    require_once "view/favorites.view.php";
                }
            ]
        ]
    );
    load_routes();
}