<?php

function __load_all_classes() : void {
    foreach (@scandir("app") as $folders){
        if ($folders != "." and $folders != ".." and $folders != "Autoloader.php"){
            foreach (@scandir("app/{$folders}") as $file){
                if ($file != "." and $file != "..") {
                    if (is_file("app/{$folders}/{$file}")) require_once "app/{$folders}/{$file}";
                }
            }
        }
    }
}