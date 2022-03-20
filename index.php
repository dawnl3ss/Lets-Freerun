<?php
    require_once "app/Autoloader.php";
    __load_all_classes();
    __init_sql();
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
                                    <li class='active'><a class="scrollTo" data-scrollTo="popular" href="#"> Popular </a></li>
                                    <li><a href="#"> Most Visited </a>
                                        <ul class="sub-menu">
                                            <li><a href="#"> United-States </a>
                                                <ul class="sub-menu">
                                                    <?php
                                                        foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                            if ($spot instanceof Spot){
                                                                if ($spot->get_location()->get_country() === "United-States" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                                    echo "<li><a href='location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
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
                                                                    echo "<li><a href='location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
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
                                                                    echo "<li><a href='location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
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
                            <h2> Find the best Parkour spot ! </h2>
                            <span> A lot of spots are available here. </span>
                            <div class="blue-button">
                                <a class="scrollTo" data-scrollTo="popular" href="#"> Discover Spots </a>
                            </div>
                        </div>
                        <div class="submit-form">
                            <form id="form-submit" action="#search" method="get">
                                <div class="row">
                                    <div class="col-md-3 first-item">
                                        <fieldset>
                                            <input name="city" type="text" class="form-control" id="city" placeholder="City" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3 second-item">
                                        <fieldset>
                                            <input name="country" type="text" class="form-control" id="country" placeholder="Country" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3 third-item">
                                        <fieldset>
                                            <select required name='category' onchange='this.form.()'>
                                                <option value="null"> Select category... </option>
                                                <option value="0"> Famous spots </option>
                                                <option value="1"> Uncommon spots </option>
                                                <option value="2"> All spots </option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset>
                                            <button class="btn" type="submit" id="form-submit"> Search Now </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
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
                            <span> Popular Places </span>
                            <h2> Some of the most famous places of parkour community. </h2>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <?php
                        $spots = SpotManager::$current_spots_list;
                        shuffle($spots);

                        foreach ($spots as $uid => $spot){
                            if ($spot instanceof Spot){
                                echo "
                                    <div class='item popular-item''>
                                        <div class='thumb'>
                                            <img style='object-fit: cover; width:300px; height:200px;' src='image/location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "/cover.jpg" . "' alt=''>
                                            <div class='text-content'>
                                                <h4> {$spot->get_name()} </h4>
                                                <span> {$spot->get_location()->get_country()} </span>
                                            </div>
                                            <div class='plus-button'>
                                                <a href='location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "?uid={$spot->get_uid()}" . "'><i class='fa fa-plus'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    ?>
                </div>
            </div>
        </section>

        <?php if (isset($_GET["country"])): ?>
            <section class="featured-places" id="search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading">
                                <h2> Your search </h2><br>
                                <span> <?php echo "Country : " . $_GET["country"] . " | City : " . $_GET["city"]; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            foreach (SpotManager::$current_spots_list as $uid => $spot){
                                if ($spot instanceof  Spot){
                                    if (strtolower($spot->get_location()->get_country()) === strtolower($_GET["country"]) && strtolower($spot->get_location()->get_city()) === strtolower($_GET["city"]) && $spot->get_tier() === (int)$_GET["category"]){
                                        echo "
                                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                                <div class='featured-item'>
                                                    <div class='thumb'>
                                                        <img src='image/location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "/cover.jpg' alt=''>
                                                    </div>
                                                    <div class='down-content'>
                                                        <h4> {$spot->get_name()} </h4>
                                                        <span> " . ucfirst($spot->tier_to_category()) . " </span>
                                                        <p> Description du spot </p>
                                                        <div class='row'>
                                                            <div class='col-md-6 first-button'>
                                                                <div class='text-button'>
                                                                    <a href='#'> Add to favorites </a>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-6'>
                                                                <div class='text-button'>
                                                                    <a href='location/" . strtolower($spot->get_location()->get_country()) . "/" . strtolower($spot->get_location()->get_city()) . "/" . strtolower($spot->get_name()) . "?uid={$spot->get_uid()}" . "'> See Details </a>
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
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="our-services" id="favorits">
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
    
        <div class="sub-footer">
            <p> Copyright &copy; Lets-Freerun 2022 </p>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="style/js/vendor/jquery-1.11.2.min.js"></script>
    
        <script src="style/js/vendor/bootstrap.min.js"></script>
        <script src="style/js/datepicker.js"></script>
        <script src="style/js/plugins.js"></script>
        <script src="style/js/main.js"></script>
    </body>
</html>