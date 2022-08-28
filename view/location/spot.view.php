<?php
    if (isset($_SESSION["spot"]) && $_SESSION["spot"] instanceof Spot){
        $spot = $_SESSION["spot"];
    } else header("Location: ../../");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> LF - <?php echo $spot->get_name(); ?> </title>

        <!-- Head Meta -->
        <link rel="icon" type="image/png" href="../../image/icon.ico">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS/JS Style -->
        <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../style/css/fontAwesome.css">
        <link rel="stylesheet" href="../../style/css/hero-slider.css">
        <link rel="stylesheet" href="../../style/css/owl-carousel.css">
        <link rel="stylesheet" href="../../style/css/datepicker.css">
        <link rel="stylesheet" href="../../style/css/main-style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX1XprpFJjtse_HGaH1zSoOEVAmd9DG8A"></script>
        <script src="../../style/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
        <div class="wrap">
            <header id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="primary-nav-button" type="button"> Menu </button>
                            <span>
                                <a href="/"><img class="logo" src="../../image/logo.png" alt="logo"></a>
                            </span>
                            <nav id="primary-nav" class="dropdown cf">
                                <ul class="dropdown menu">
                                    <li class='active'>
                                        <a href="/"> Home </a>
                                    </li>
                                    <li>
                                        <a href=""> Most Visited </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href=""> United-States </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spots){
                                                        if ($spots instanceof Spot){
                                                            if ($spots->get_location()->get_country() === "United-States" && $spots->get_tier() === TieredSpot::SPOT_FAMOUS) {
                                                                echo "<li><a href='/{$spots->as_path()}'> {$spots->get_name()} </a></li>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href=""> France </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spots){
                                                        if ($spots instanceof Spot){
                                                            if ($spots->get_location()->get_country() === "France" && $spots->get_tier() === TieredSpot::SPOT_FAMOUS) {
                                                                echo "<li><a href='/{$spots->as_path()}'> {$spots->get_name()} </a></li>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href=""> England </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spots){
                                                        if ($spots instanceof Spot){
                                                            if ($spots->get_location()->get_country() === "England" && $spots->get_tier() === TieredSpot::SPOT_FAMOUS) {
                                                                echo "<li><a href='/{$spots->as_path()}'> {$spots->get_name()} </a></li>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/favorites"> Your favorites </a>
                                    </li>
                                    <li>
                                        <a class="scrollTo" data-scrollTo="contact" href="#contact"> Contact Us </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
        </div>

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
                                            import { add_favorites } from "./../../app/spot/favorites/fav-manager.js";

                                            document.getElementById("fav-<?php echo $spot->get_uid(); ?>").onclick = function (){
                                                add_favorites("<?php echo (int)$spot->get_uid(); ?>");
                                            }
                                        </script>
                                    <?php else: ?>
                                        <div class="green-button">
                                            <a id="fav-<?php echo $spot->get_uid(); ?>" href=""> Added ! </a>
                                        </div>
                                        <script type='module'>
                                            import { delete_favorites } from "./../../app/spot/favorites/fav-manager.js";

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
                                    import { display_map } from "./../../app/location/maps/google-maps-api.js";
                                    display_map(<?php echo $spot->get_location()->get_lat(); ?>, <?php echo $spot->get_location()->get_lng(); ?>, "<?php echo $spot->get_name(); ?>");
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular-places" id="popular">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span> Pictures </span>
                            <h2> Some pictures of the spot. </h2>
                        </div>
                    </div>
                </div>
                <?php
                foreach (scandir("image/location/" . $spot->as_path()) as $key => $image){
                    if ($image !== "." && $image !== ".."){
                        echo "
                            <span class='item popular-item'>
                                <span class='thumb'>
                                    <img id='spot-picture' src='../../image/location/{$spot->as_path()}/{$image}" . "' alt=''>
                                </span>
                            </span>
                        ";
                    }
                }
                ?>
            </div>
        </section>

        <section class="our-services" id="favorites">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="down-services">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-heading">
                                        <span> Descripton </span>
                                        <h2> A little description to introduce you to the spot. </h2>
                                    </div>
                                </div>
                                <div class="col-md-offset-2">
                                    <div class="col-md-5 col-md-offset-2">
                                        <div class="accordions">
                                            <ul class="accordion">
                                                <li>
                                                    <a> <?php echo $spot->get_name(); ?> </a>
                                                    <p> <?php echo $spot->get_description(); ?> </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once "view/part/footer.part.php"; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="../../style/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="../../style/js/vendor/bootstrap.min.js"></script>
        <script src="../../style/js/datepicker.js"></script>
        <script src="../../style/js/plugins.js"></script>
        <script src="../../style/js/main.js"></script>
        <script type='module'>
            import { set_cookie, cookie_exist } from './../../app/network/cookie/cookie-manager.js';
            if (!cookie_exist("favorites")) set_cookie("favorites", "");
        </script>
    </body>
</html>
