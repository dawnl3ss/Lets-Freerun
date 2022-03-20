<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
    __load_all_classes();
    __init_sql();
    __load_all_spots();
    $spot = SpotManager::$current_spots_list[(int)$_GET["uid"]];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> LF - <?php echo $spot->get_name(); ?> </title>

        <!-- Head Meta -->
        <link rel="icon" type="image/png" href="../../../../image/icon.ico">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS/JS Style -->
        <link rel="stylesheet" href="../../../../style/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../../../style/css/fontAwesome.css">
        <link rel="stylesheet" href="../../../../style/css/hero-slider.css">
        <link rel="stylesheet" href="../../../../style/css/owl-carousel.css">
        <link rel="stylesheet" href="../../../../style/css/datepicker.css">
        <link rel="stylesheet" href="../../../../style/css/main-style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX1XprpFJjtse_HGaH1zSoOEVAmd9DG8A"></script>
        <script src="../../../../style/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
        <div class="wrap">
            <header id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="primary-nav-button" type="button"> Menu </button>
                            <nav id="primary-nav" class="dropdown cf">
                                <span><a href="../../../../../Lets-Freerun"><img class="logo" src="../../../../image/logo.png" alt="logo"></span></a>
                                <ul class="dropdown menu">
                                    <li class='active'><a class="scrollTo" data-scrollTo="popular" href="#"> Popular </a></li>
                                    <li><a href="#"> Most Visited </a>
                                        <ul class="sub-menu">
                                            <li><a href="#"> United-States </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spots){
                                                        if ($spots instanceof Spot){
                                                            if ($spots->get_location()->get_country() === "United-States")
                                                                echo "<li><a href='../../../../location/" . strtolower($spots->get_location()->get_country()) . "/" . strtolower($spots->get_location()->get_city()) . "/" . strtolower($spots->get_name()) . "?uid={$spots->get_uid()}" . "'> {$spots->get_name()} </a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="#"> France </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spots){
                                                        if ($spots instanceof Spot){
                                                            if ($spots->get_location()->get_country() === "France")
                                                                echo "<li><a href='../../../../location/" . strtolower($spots->get_location()->get_country()) . "/" . strtolower($spots->get_location()->get_city()) . "/" . strtolower($spots->get_name()) . "?uid={$spots->get_uid()}" . "'> {$spots->get_name()} </a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="#"> England </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spots){
                                                        if ($spots instanceof Spot){
                                                            if ($spots->get_location()->get_country() === "England")
                                                                echo "<li><a href='../../../../location/" . strtolower($spots->get_location()->get_country()) . "/" . strtolower($spots->get_location()->get_city()) . "/" . strtolower($spots->get_name()) . "?uid={$spots->get_uid()}" . "'> {$spots->get_name()} </a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="scrollTo" data-scrollTo="favorits" href="#"> Your favorits </a></li>
                                    <li><a class="scrollTo" data-scrollTo="contact" href="#"> Contact Us </a></li>
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
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2> <?php echo $spot->get_name() . " - " . $spot->get_location()->get_country() ?> </h2>
                            <div>
                                <div id="map" style="width:100%; height:50%"></div>
                                <script type="module">
                                    import { display_map } from "./../../../../app/location/maps/google-maps-api.js";
                                    display_map(<?php echo $spot->get_location()->get_lat(); ?>, <?php echo $spot->get_location()->get_lng(); ?>, "<?php echo $spot->get_name(); ?>");
                                </script>
                            </div>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="about-veno">
                            <div class="logo">
                                <img src="../../../../image/footer_logo.png" alt="footer logo">
                            </div>
                            <p> Lets-Freerun is a website fully developped by me, Neptune, during my free time. If you have any request or idea just contact me. </p>
                            <ul class="social-icons">
                                <li>
                                    <a href="https://github.com/Neptune-IT/Lets-Freerun"><i class="fa fa-github center"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="useful-links">
                            <div class="footer-heading">
                                <h4> Useful Links </h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li><a href="#favorits" class="scrollTo" data-scrollTo="favorits"><i class="fa fa-stop"></i> My Favorits </a></li>
                                        <li><a href=""><i class="fa fa-stop"></i> How It Works? </a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li><a href=""><i class="fa fa-stop"></i> More About Us </a></li>
                                        <li><a  href="#contact" class="scrollTo" data-scrollTo="contact"><i class="fa fa-stop"></i> Contact Us </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="contact" class="col-md-3">
                        <div class="contact-info">
                            <div class="footer-heading">
                                <h4> Contact Information </h4>
                            </div>
                            <p> Do you have a question ? A request ? Contact us with : </p>
                            <ul>
                                <li><span> Email: </span><a>lets-freerun@protonmail.com</a></li>
                                <li><span> Address: </span><a href="">lets-freerun.xyz</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="../../../../style/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="../../../../style/js/vendor/bootstrap.min.js"></script>
        <script src="../../../../style/js/datepicker.js"></script>
        <script src="../../../../style/js/plugins.js"></script>
        <script src="../../../../style/js/main.js"></script>
    </body>
</html>
