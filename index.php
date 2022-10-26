<?php
    require_once "app/Autoloader.php";
    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');
    session_start();
    __load_all_classes();
    __load_all_spots();
    __acces();
?>