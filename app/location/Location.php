<?php

class Location {

    /** @var string $country */
    private $country;

    /** @var string $city */
    private $city;

    /** @var string $street */
    private $street;

    public function __construct(string $country, string $city, string $street = ""){
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function get_country() : string { return $this->country; }

    /**
     * @return string
     */
    public function get_city() : string { return $this->city; }

    /**
     * @return string
     */
    public function get_street() : string { return $this->street; }

    /**
     * @return string
     */
    public function encode() : string { return encode_data([$this->country, $this->city, $this->street]); }
}