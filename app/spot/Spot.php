<?php

require_once "app/Autoloader.php";
__load_all_classes();

class Spot {

    /** @var string $name */
    private $name;

    /** @var Location $location */
    private $location;

    /** @var UID $uid */
    private $uid;

    public function __construct(string $name, Location $location, UID $uid = null){
        $this->name = $name;
        $this->location = $location;
        $this->uid = is_null($uid) ? $this->uid = new UID() : $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function get_name() : string { return $this->name; }

    /**
     * @return Location
     */
    public function get_location() : Location { return $this->location; }

    /**
     * @return int
     */
    public function get_uid() : int { return $this->uid->get_content(); }
}