<?php

/**
 * @param string $data
 *
 * @param string $ip
 *
 * @return mixed
 */
function get_data_by_ip(string $data, string $ip){ return unserialize(file_get_contents("http://ip-api.com/php/" . $ip))[$data]; }

/**
 * @param string $ip
 *
 * @return string
 */
function get_current_country(string $ip) : string { return get_data_by_ip("country", $ip); }