<?php

/**
 * @param string $ip
 *
 * @return string
 */
function get_current_country(string $ip) : string { return unserialize(file_get_contents("http://ip-api.com/php/" . $ip))["country"]; }
