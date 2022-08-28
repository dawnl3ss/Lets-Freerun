<?php

require_once __DIR__ . "/../Autoloader.php";
__load_all_classes();

/**
 * @param Spot $spot
 */
function create_spot_image_path(Spot $spot){
    $path = __DIR__ . "/../../image/location/";
    $location = $spot->get_location();

    if (!is_dir($path . strtolower($location->get_country()))){
        mkdir($path . strtolower($location->get_country()));
    }
    if (!is_dir($path . strtolower($location->get_country()) . '/' . strtolower($location->get_city()))){
        mkdir($path . strtolower($location->get_country()) . '/' . strtolower($location->get_city()));
    }
    if (!is_dir($path . strtolower($location->get_country()) . '/' . strtolower($location->get_city()) . '/' . str_replace(' ', '-', strtolower($spot->get_name())))){
        mkdir($path . strtolower($location->get_country()). '/' . strtolower($location->get_city()) . '/' . str_replace(' ', '-', strtolower($spot->get_name())));
    }
}