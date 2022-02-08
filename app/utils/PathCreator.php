<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
__load_all_classes();

/**
 * @param Spot $spot
 */
function create_spot_path(Spot $spot){
    add_country_folder($spot, "location/");
    add_city_folder($spot, "location/" . $spot->get_location()->get_country());
    add_name_folder($spot, "location/" . $spot->get_location()->get_country() . "/" . $spot->get_location()->get_city());
}

/**
 * @param Spot $spot
 *
 * @param string $path
 */
function add_country_folder(Spot $spot, string $path){
    if (!is_dir($path . strtolower($spot->get_location()->get_country()))) mkdir($path . strtolower($spot->get_location()->get_country()));
}

/**
 * @param Spot $spot
 *
 * @param string $path
 */
function add_city_folder(Spot $spot, string $path){
    if (!is_dir($path . "/" . strtolower($spot->get_location()->get_city()))) mkdir($path . "/" . strtolower($spot->get_location()->get_city()));
}

/**
 * @param Spot $spot
 *
 * @param string $path
 */
function add_name_folder(Spot $spot, string $path){
    if (!is_dir($path . "/" . strtolower($spot->get_name()))) mkdir($path . "/" . strtolower($spot->get_name()));

}