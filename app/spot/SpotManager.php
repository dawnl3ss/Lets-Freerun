<?php

require_once __DIR__ . "/../Autoloader.php";
__load_all_classes();

class SpotManager {

    /** @var array $current_spots_list */
    public static $current_spots_list = [];

    /**
     * @param Spot $spot
     */
    public static function add_spot(Spot $spot) : void {
        self::$current_spots_list[$spot->get_uid()] = $spot;
        create_spot_image_path($spot);
        (new SQLSession())->table("spots")->insert(
            ["name", "tier", "location", "description", "uid"],
            [$spot->get_name(), $spot->get_tier(), $spot->get_location()->encode(), $spot->get_description(), $spot->get_uid()]
        );
    }

    /**
     * @param Spot $spot
     */
    public static function remove_spot(Spot $spot) : void {
        unset(self::$current_spots_list[$spot->get_uid()]);
        (new SQLSession())->table("spots")->delete("uid", (string)$spot->get_uid());
    }

    /**
     * @param int $spot_id
     *
     * @param Spot $new_instance
     */
    public static function edit_spot(int $spot_id, Spot $new_instance) : void {
        self::$current_spots_list[$spot_id] = $new_instance;
        (new SQLSession())->update("UPDATE spots SET name = '{$new_instance->get_name()}', tier = '{$new_instance->get_tier()}', location = '{$new_instance->get_location()->encode()}' WHERE uid = '{$spot_id}'");
    }
}