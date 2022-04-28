<?php

require_once "app/Autoloader.php";
__load_all_classes();
__load_all_spots();


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


foreach (SpotManager::$current_spots_list as $uid => $spot){
    if ($spot instanceof Spot){
        (new SQLSession())->insert(
            "spots",
            [":name", ":tier", ":location", ":description", ":uid"],
            "name, tier, location, description, uid",
            [$spot->get_name(), $spot->get_tier(), $spot->get_location()->encode(), getdesc($spot->get_uid()), $spot->get_uid()]
        );
    }
}

function getdesc(int $uid){
    switch ($uid){
        case 3181906: // olympiades
            return "description";
        case 70152560: //la defense
            return "description";
        case 6777008: //ma power gap
            return "description";
        case 42560145: //evry & lisses
            return "description";
        case 57491566: //ancien ambarcadere
            return "description";
        case 70416404: //imax gap
            return "description";
        case 51412771: // Central Park
            return "description";
    }
}
