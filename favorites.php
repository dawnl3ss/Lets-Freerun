<?php
    require_once "app/Autoloader.php";
    __load_all_classes();
    __load_all_spots();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> Lets-Freerun </title>

        <!-- Head Meta -->
        <link rel="icon" type="image/png" href="image/icon.ico">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS/JS Style -->
        <link rel="stylesheet" href="style/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="style/css/fontAwesome.css">
        <link rel="stylesheet" href="style/css/hero-slider.css">
        <link rel="stylesheet" href="style/css/owl-carousel.css">
        <link rel="stylesheet" href="style/css/datepicker.css">
        <link rel="stylesheet" href="style/css/main-style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script src="style/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
        <div class="wrap">
            <header id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="primary-nav-button" type="button"> Menu </button>
                            <nav id="primary-nav" class="dropdown cf">
                                <span><a href="../Lets-Freerun"><img class="logo" src="image/logo.png" alt="logo"></span></a>
                                <ul class="dropdown menu">
                                    <li class='active'><a href="./"> Home </a></li>
                                    <li><a href="#"> Most Visited </a>
                                        <ul class="sub-menu">
                                            <li><a href="#"> United-States </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                        if ($spot instanceof Spot){
                                                            if ($spot->get_location()->get_country() === "United-States" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                                echo "<li><a href='location/{$spot->as_path()}?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="#"> France </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                        if ($spot instanceof Spot){
                                                            if ($spot->get_location()->get_country() === "France" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                                echo "<li><a href='location/{$spot->as_path()}?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="#"> England </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                        if ($spot instanceof Spot){
                                                            if ($spot->get_location()->get_country() === "England" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                                echo "<li><a href='location/{$spot->as_path()}?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="scrollTo" data-scrollTo="favorites" href="#"> Your favorites </a></li>
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
                            <h1> Your favorites spots </h1>
                            <span> List of spots that you added in your favorites list. </span>
                            <div class="blue-button">
                                <a class="scrollTo" data-scrollTo="favorites" href="#"> Discover favorites </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="featured-places" id="favorites">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span> favorites </span>
                            <h2> Your favorites spots. </h2>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <?php
                        $cookie = $_COOKIE["favorites"];
                        $spot_uids = explode(",", $cookie);

                        if ($cookie !== "") {
                            foreach (SpotManager::$current_spots_list as $uid => $spot) {
                                if ($spot instanceof Spot) {
                                    if (in_array((string)$uid, $spot_uids)) {
                                        echo "
                                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                                <div class='featured-item'>
                                                    <div class='thumb'>
                                                        <img style='object-fit: cover; width:1000px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg' alt=''>
                                                        <div class='overlay-content'><ul><li><i class='fa fa-star'></i></li></ul></div>
                                                    </div>
                                                    <div class='down-content'>
                                                        <h4> " . $spot->get_name() . " </h4>
                                                        <span> " . ucfirst($spot->tier_to_category()) . " </span>
                                                        <p> (description du spot) </p>
                                                        <div class='row'>
                                                            <div class='col-md-6 first-button'>
                                                                <div class='text-button'>
                                                                    <a href='' id='fav-{$spot->get_uid()}'> Remove from favorites </a>
                                                                    <script type='module'>
                                                                        import { delete_favorites } from './app/spot/favorites/fav-manager.js';
                                                                        
                                                                        document.getElementById('fav-{$spot->get_uid()}').onclick = function (){
                                                                             delete_favorites('" . $spot->get_uid() . "')
                                                                             window.location.href = 'favorites.php';
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-6'>
                                                                <div class='text-button'>
                                                                    <a href='location/{$spot->as_path()}/?uid={$spot->get_uid()}'> See details </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                }
                            }
                        } else echo "<h4 style='text-align: center'> You have not added any spot. </h4>";
                    ?>
                </div>
            </div>
        </section>

        <section class="our-services" id="description">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="down-services">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="left-content">
                                        <h4> Most famous countries for parkour/freerun practice. </h4>
                                        <p> (j'sais pas quoi mettre ici encore, ça fait vide si je mets rien) </p>
                                        <div class="blue-button">
                                            <a href="" class="scrollTo" data-scrollTo="popular"> Discover More </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="accordions">
                                        <ul class="accordion">
                                            <li>
                                                <a> France </a>
                                                <p> As you know (maybe), Parkour was invented in France, during 1980s. This country </p>
                                            </li>
                                            <li>
                                                <a> United-States </a>
                                                <p> un text ici (idk) </p>
                                            </li>
                                            <li>
                                                <a> England </a>
                                                <p> un text ici (idk) </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                                <img src="image/footer_logo.png" alt="footer logo">
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
                                        <li><a href="#favorites" class="scrollTo" data-scrollTo="favorites"><i class="fa fa-stop"></i> My favorites </a></li>
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

        <div class="sub-footer">
            <p> Copyright &copy; Lets-Freerun 2022 </p>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="style/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="style/js/vendor/bootstrap.min.js"></script>
        <script src="style/js/datepicker.js"></script>
        <script src="style/js/plugins.js"></script>
        <script src="style/js/main.js"></script>
        <script type='module'>
            import { set_cookie, cookie_exist } from './app/network/cookie-manager.js';
            if (!cookie_exist("favorites")) set_cookie("favorites", "");
        </script>
    </body>
</html>