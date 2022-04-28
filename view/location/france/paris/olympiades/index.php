<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
    __load_all_classes();
    __load_all_spots();

    if (isset(SpotManager::$current_spots_list[(int)$_GET["uid"]])){
        $spot = SpotManager::$current_spots_list[(int)$_GET["uid"]];
    } else header("Location: ../../../../../");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> LF - <?php echo $spot->get_name(); ?> </title>

        <!-- Head Meta -->
        <link rel="icon" type="image/png" href="../../../../../image/icon.ico">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS/JS Style -->
        <link rel="stylesheet" href="../../../../../style/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../../style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../../../../style/css/fontAwesome.css">
        <link rel="stylesheet" href="../../../../../style/css/hero-slider.css">
        <link rel="stylesheet" href="../../../../../style/css/owl-carousel.css">
        <link rel="stylesheet" href="../../../../../style/css/datepicker.css">
        <link rel="stylesheet" href="../../../../../style/css/main-style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX1XprpFJjtse_HGaH1zSoOEVAmd9DG8A"></script>
        <script src="../../../../../style/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/view/second-nav-bar.php" ?>

        <section class="banner" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0">
                        <div class="banner-caption splitscreen">
                            <div class="rightm">
                                <div class="line-dec"></div>
                                <h1> <?php echo $spot->get_name(); ?> </h1>
                                <h3> <i class="fa fa-arrow-right"></i> <?php echo $spot->get_location()->get_country(); ?> </h3>
                                <h3> <i class="fa fa-arrow-right"></i> <?php echo $spot->get_location()->get_city(); ?> </h3><br>
                                <div class="line-dec"></div>

                                <div class="fav-button">
                                    <?php if (!in_array((string)$spot->get_uid(), explode(",", $_COOKIE["favorites"]))): ?>
                                        <div class="blue-button">
                                            <a id="fav-<?php echo $spot->get_uid(); ?>" href=""> Add to favorites </a>
                                        </div>
                                        <script type='module'>
                                            import { add_favorites } from "./../../../../../app/spot/favorites/fav-manager.js";

                                            document.getElementById("fav-<?php echo $spot->get_uid(); ?>").onclick = function (){
                                                add_favorites("<?php echo (int)$spot->get_uid(); ?>");
                                            }
                                        </script>
                                    <?php else: ?>
                                        <div class="green-button">
                                            <a id="fav-<?php echo $spot->get_uid(); ?>" href=""> Added ! </a>
                                        </div>
                                        <script type='module'>
                                            import { delete_favorites } from "./../../../../../app/spot/favorites/fav-manager.js";

                                            document.getElementById("fav-<?php echo $spot->get_uid(); ?>").onclick = function (){
                                                delete_favorites("<?php echo (int)$spot->get_uid(); ?>");
                                            }
                                        </script>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="leftm">
                                <div id="map" class="map"></div>
                                <script type="module">
                                    import { display_map } from "./../../../../../app/location/maps/google-maps-api.js";
                                    display_map(<?php echo $spot->get_location()->get_lat(); ?>, <?php echo $spot->get_location()->get_lng(); ?>, "<?php echo $spot->get_name(); ?>");
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/view/footer.php" ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="../../../../../style/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="../../../../../style/js/vendor/bootstrap.min.js"></script>
        <script src="../../../../../style/js/datepicker.js"></script>
        <script src="../../../../../style/js/plugins.js"></script>
        <script src="../../../../../style/js/main.js"></script>
    </body>
</html>
