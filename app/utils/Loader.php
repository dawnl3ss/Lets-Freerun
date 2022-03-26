<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
__load_all_classes();

function __init_sql(){
    SQLManager::$database = new \MySQLi("p:127.0.0.1", "root", "root", SQLManager::DATABASE_LETS_FREERUN);
}

function __load_all_spots(){
    __init_sql();

    foreach (SQLManager::get_data("SELECT * FROM spots") as $key => $value){
        $decoded = decode_data($value["location"]);
        SpotManager::$current_spots_list[$value["uid"]] = new Spot($value["name"], $value["tier"], new Location($decoded[0], $decoded[1], $decoded[2], (float)$decoded[3], (float)$decoded[4]), new UID((int)$value["uid"]));
    }
}