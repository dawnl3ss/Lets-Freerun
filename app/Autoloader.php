<?php

function __load_all_classes() : void {
    $path = $_SERVER["DOCUMENT_ROOT"] . "/";

    foreach (@scandir($path . "app") as $folders){
        if ($folders != "." and $folders != ".." and $folders != "Autoloader.php"){
            foreach (@scandir($path . "app/{$folders}") as $file){
                if ($file != "." and $file != ".."){
                    if (is_file($path . "app/{$folders}/{$file}") && !strpos($file, ".js")) {
                        require_once $path . "app/{$folders}/{$file}";
                    }
                }
            }
        }
    }
    require_vendors();
}

function require_vendors(){
    require_once __DIR__ . "/../vendor/zephyr/app.php";
}