<?php

class Location {

    /** @var string $country */
    private $country;

    /** @var string $city */
    private $city;

    /** @var string $street */
    private $street;

    /** @var float $latitude */
    private $latitude;

    /** @var float $longitude */
    private $longitude;

    public function __construct(string $country, string $city, string $street = "", float $lat, float $lng){
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->latitude = $lat;
        $this->longitude = $lng;
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
     * @return float
     */
    public function get_lat() : float { return $this->latitude; }

    /**
     * @return float
     */
    public function get_lng() : float { return $this->longitude; }

    /**
     * @return string
     */
    public function encode() : string { return encode_data([$this->country, $this->city, $this->street, $this->latitude, $this->longitude]); }
}