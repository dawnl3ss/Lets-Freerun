<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
__load_all_classes();

class SpotManager {

    /** @var array $current_spots_list */
    public static $current_spots_list = [];

    /**
     * @param Spot $spot
     */
    public static function add_spot(Spot $spot) : void {
        self::$current_spots_list[$spot->get_uid()] = $spot;
        create_spot_path($spot);
        SQLManager::write_data("INSERT INTO `spots` (name, tier, location, uid) VALUES ('{$spot->get_name()}', '{$spot->get_tier()}', '{$spot->get_location()->encode()}', '{$spot->get_uid()}')");
    }

    /**
     * @param Spot $spot
     */
    public static function remove_spot(Spot $spot) : void {
        unset(self::$current_spots_list[$spot->get_uid()]);
        SQLManager::write_data("DELETE FROM `spots` WHERE uid = '{$spot->get_uid()}'");
    }

    /**
     * @param int $spot_id
     *
     * @param Spot $new_instance
     */
    public static function edit_spot(int $spot_id, Spot $new_instance) : void {
        self::$current_spots_list[$spot_id] = $new_instance;
        SQLManager::write_data("UPDATE `spots` SET name = '{$new_instance->get_name()}', tier = '{$new_instance->get_tier()}', location = '{$new_instance->get_location()->encode()}' WHERE uid = '{$spot_id}'");
    }
}