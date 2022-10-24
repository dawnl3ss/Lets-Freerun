<?php

function __load_all_classes(string $path = ""){
    if ($path == "") $path = $_SERVER["DOCUMENT_ROOT"] . "/app/";

    foreach (scandir($path) as $files){
        if ($files != "." && $files != ".."){
            if (is_file($path . "/" . $files)){
                if (strpos($files, ".php")) {
                    require_once $path . "/" . $files;
                } else continue;
            } else __load_all_classes($path . "/" . $files);
        } else continue;
    }
    require_vendors();
}


function require_vendors(){
    require_once __DIR__ . "/../vendor/zephyr/app.php";
}