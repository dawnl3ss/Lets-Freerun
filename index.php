<?php

require_once "app/Autoloader.php";
__load_all_classes();
__init_sql();
__load_all_spots();

foreach (SpotManager::$current_spots_list as $uid => $spot){
    if ($spot instanceof Spot){
        echo $spot->get_name() . " [{$uid}] : " . $spot->get_location()->get_country() . " -> " . $spot->get_location()->get_city();
        echo "<br>";
    }
}
