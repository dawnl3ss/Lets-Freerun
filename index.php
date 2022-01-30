<?php
require_once "app/Autoloader.php";
__load_all_classes();
__init_sql();
__load_all_spots();

foreach (SpotManager::$current_spots_list as $uid => $spot){
    if ($spot instanceof Spot){
        echo $spot->get_name() . " [{$uid}] : " . $spot->get_location()->get_country() . " -> " . $spot->get_location()->get_city();
        echo "<br>";
    }
}
?>

<html xml:lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOURKEY&sensor=false"></script>
        <style> html, body { height: 100% } </style>
    </head>

    <body>
        <div id="map" style="width:50%; height:50%"></div>
        <script type="module">
            import { display_map } from "./app/location/maps/google-maps-api.js";
            display_map(48.833, 2.333);
        </script>
    </body>
</html>
