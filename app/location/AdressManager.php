<?php

/**
 * @param string $ip
 *
 * @return mixed
 */
function get_current_country(string $ip){ return unserialize(file_get_contents("http://ip-api.com/php/" . $ip))["country"]; }
