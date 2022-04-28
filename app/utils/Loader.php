<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
__load_all_classes();

function __load_all_spots(){
    foreach ((new SQLSession())->get("SELECT * FROM spots") as $key => $value){
        $decoded = decode_data($value["location"]);
        SpotManager::$current_spots_list[$value["uid"]] = new Spot($value["name"], $value["tier"], new Location($decoded[0], $decoded[1], $decoded[2], (float)$decoded[3], (float)$decoded[4]), $value["description"], new UID((int)$value["uid"]));
    }
}