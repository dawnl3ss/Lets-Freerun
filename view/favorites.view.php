<?php
    $cookie = $_COOKIE["favorites"];
    $spot_uids = explode(",", $cookie);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> Lets-Freerun </title>

        <!-- Head Meta -->
        <link rel="icon" type="image/png" href="../image/icon.ico">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS/JS Style -->
        <link rel="stylesheet" href="../style/css/bootstrap.min.css">
        <link rel="stylesheet" href="../style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../style/css/fontAwesome.css">
        <link rel="stylesheet" href="../style/css/hero-slider.css">
        <link rel="stylesheet" href="../style/css/owl-carousel.css">
        <link rel="stylesheet" href="../style/css/datepicker.css">
        <link rel="stylesheet" href="../style/css/main-style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script src="../style/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
        <? require_once "view/part/nav.part.php"; ?>

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
                <div class='row'>
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span> Favorites </span>
                            <h2> Your favorites spots. </h2>
                        </div>
                    </div>
                    <? if ($cookie !== ""): ?>
                        <? foreach (SpotManager::$current_spots_list as $uid => $spot): ?>
                            <? if (in_array((string)$uid, $spot_uids)): ?>
                                <?= Render::fav_card($spot); ?>
                            <? endif; ?>
                        <? endforeach ?>
                    <? else: ?>
                        <h4 style='text-align: center'> You have not added any spot. </h4>
                    <? endif; ?>
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

        <? require_once "view/part/footer.part.php"; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="../style/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="../style/js/vendor/bootstrap.min.js"></script>
        <script src="../style/js/datepicker.js"></script>
        <script src="../style/js/plugins.js"></script>
        <script src="../style/js/main.js"></script>
        <script type='module'>
            import { set_cookie, cookie_exist } from '../app/network/cookie/cookie-manager.js';
            if (!cookie_exist("favorites")) set_cookie("favorites", "");
        </script>
    </body>
</html>