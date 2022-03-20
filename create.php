<?php

require_once "app/Autoloader.php";
__load_all_classes();
__init_sql();
__load_all_spots();

/*SpotManager::add_spot(new Spot(
    "Central Park",
    TieredSpot::SPOT_FAMOUS,
    new Location("United-States", "New-York", "Central Park", 40.79875874218898, -73.95631911204548),
    new UID()
));*/

create_spot_path(new Spot(
    "zub",
    TieredSpot::SPOT_FAMOUS,
    new Location("United-States", "New-York", "zub", 40.79875874218898, -73.95631911204548),
    new UID()
));

