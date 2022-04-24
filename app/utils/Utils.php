<?php

/**
 * @param $value
 */
function debug($value) : void { echo "<pre> ",  var_dump($value), " </pre>"; }

/**
 * @param $str
 *
 * @return string
 */
function xss_counter($str) : string { return htmlentities($str, ENT_QUOTES, 'UTF-8'); }
