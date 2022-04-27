<?php

require_once "app/Autoloader.php";
__load_all_classes();
//__load_all_spots();

/*
SpotManager::add_spot(new Spot(
    "Central Park",
    TieredSpot::SPOT_FAMOUS,
    new Location("United-States", "New-York", "Central Park", 40.79875874218898, -73.95631911204548),
    new UID()
));
debug(array_filter(SpotManager::$current_spots_list, function (Spot $spot){
    return $spot->get_tier() === TieredSpot::SPOT_UNCOMMON;
}));
$string_table_index = implode(", ", $table_index);
implode(", ", array_map(function ($iteration){
    return "'{$iteration}'";
}, $values));
debug(sql_array_to_string(["test", "oui", "non"]));
debug(sql_array_to_qmark(["test", "oui", "non"]));
*/
