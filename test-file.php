<?php

require_once "app/Autoloader.php";
__load_all_classes();
__load_all_spots();


SpotManager::add_spot($spot = new Spot(
    "Freeway Park",
    TieredSpot::SPOT_FAMOUS,
    new Location("United-States", "Seattle", "700 Seneca St", 47.609319326940714, -122.33121544367668),
    "description",
    new UID()
));
/*debug(array_filter(SpotManager::$current_spots_list, function (Spot $spot){
    return $spot->get_tier() === TieredSpot::SPOT_UNCOMMON;
}));
$string_table_index = implode(", ", $table_index);
implode(", ", array_map(function ($iteration){
    return "'{$iteration}'";
}, $values));
debug(sql_array_to_string(["test", "oui", "non"]));
debug(sql_array_to_qmark(["test", "oui", "non"]));*/


/*foreach (SpotManager::$current_spots_list as $uid => $spot){
    if ($spot instanceof Spot){
        (new SQLSession())->insert(
            "spots",
            [":name", ":tier", ":location", ":description", ":uid"],
            "name, tier, location, description, uid",
            [$spot->get_name(), $spot->get_tier(), $spot->get_location()->encode(), getdesc($spot->get_uid()), $spot->get_uid()]
        );
        echo "INSERT INTO spots (name, tier, location, description, uid) VALUES ('{$spot->get_name()}', '{$spot->get_tier()}', '{$spot->get_location()->encode()}', '{$spot->get_description()}', '{$spot->get_uid()}');" . "<br>";
    }
}*/

function getdesc(int $uid){
    switch ($uid){
        case 3181906: // olympiades
            return "description";
        case 70152560: //la-defense
            return "description";
        case 6777008: //ma power gap
            return "description";
        case 42560145: //evry-&-lisses
            return "description";
        case 57491566: //ancien ambarcadere
            return "description";
        case 70416404: //imax-gap
            return "description";
        case 51412771: // Central Park
            return "description";
    }
}
