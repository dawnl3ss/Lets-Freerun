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
        <div class="wrap">
            <header id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="primary-nav-button" type="button"> Menu </button>
                            <span>
                                <a href="/"><img class="logo" src="../image/logo.png" alt="logo"></a>
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
                                                    <? foreach (SpotManager::$current_spots_list as $uid => $spot): ?>
                                                        <? if ($spot->get_location()->get_country() === "United-States" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS): ?>
                                                            <?= "<li><a href='/{$spot->as_path()}" . "'> {$spot->get_name()} </a></li>" ?>
                                                        <? endif; ?>
                                                    <? endforeach; ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href=""> France </a>
                                                <ul class="sub-menu">
                                                    <? foreach (SpotManager::$current_spots_list as $uid => $spot): ?>
                                                        <? if ($spot->get_location()->get_country() === "France" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS): ?>
                                                            <?= "<li><a href='/{$spot->as_path()}" . "'> {$spot->get_name()} </a></li>" ?>
                                                        <? endif; ?>
                                                    <? endforeach; ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href=""> England </a>
                                                <ul class="sub-menu">
                                                    <? foreach (SpotManager::$current_spots_list as $uid => $spot): ?>
                                                        <? if ($spot->get_location()->get_country() === "England" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS): ?>
                                                            <?= "<li><a href='/{$spot->as_path()}" . "'> {$spot->get_name()} </a></li>" ?>
                                                        <? endif; ?>
                                                    <? endforeach; ?>
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
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h1> Search engine </h1>
                            <span> Search registered spots all around the world. </span>
                            <div class="blue-button">
                                <a class="scrollTo" data-scrollTo="results" href="#"> See Results </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-places" id="results">
            <div class="container">
                <div class='row'>
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span> Results </span>
                            <h2> Your favorites spots. </h2>
                        </div>
                    </div>
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

        <?php require_once "view/part/footer.part.php"; ?>

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