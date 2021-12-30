<?php

/**
 * @param array $data
 *
 * @return false|string
 */
function encode_data(array $data){ return json_encode($data); }

/**
 * @param string $json
 *
 * @return mixed
 */
function decode_data(string $json){ return json_decode($json); }