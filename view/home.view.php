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
        <?php require_once "view/part/navbar.part.php" ?>

        <section class="banner" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2> Find the best Parkour spot ! </h2>
                            <span> A lot of spots are available here. </span>
                            <div class="blue-button">
                                <a class="scrollTo" data-scrollTo="popular" href=""> Discover Spots </a>
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
                                <div class='item popular-item'>
                                    <div class='thumb'>
                                        <img style='object-fit: cover; width:400px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg" . "' alt=''>
                                        <div class='text-content'>
                                            <h4> <a href='view/location/{$spot->as_path()}/?uid={$spot->get_uid()}'> {$spot->get_name()} </a> </h4>
                                            <span> {$spot->get_location()->get_country()} </span>
                                        </div>
                                        <div class='plus-button' data-toggle='tooltip' data-placement='top' title='Add to favorites'>
                                            <i class='fa fa-plus' id='plus-{$spot->get_uid()}'></i>
                                            <script type='module'>
                                                import { add_favorites } from './app/spot/favorites/fav-manager.js';           
                                                    document.getElementById('plus-{$spot->get_uid()}').onclick = function (){
                                                        add_favorites('" . $spot->get_uid() . "');
                                                        window.location.href = 'favorites.view.php';
                                                    }
                                            </script>
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

        <section class="popular-places down-services" id="for-you-places">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span> For You Spots </span>
                            <h2> A list of spots from your country. </h2>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <?php
                    $spots = array_filter(SpotManager::$current_spots_list, function (Spot $spot){
                        return strtolower($spot->get_location()->get_country()) === "france"/*strtolower(get_current_country($_SERVER["REMOTE_ADDR"]))*/;
                    });
                    shuffle($spots);

                    foreach ($spots as $uid => $spot){
                        if ($spot instanceof Spot){
                            echo "
                                <div class='item popular-item'>
                                    <div class='thumb'>
                                        <img style='object-fit: cover; width:400px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg" . "' alt=''>
                                        <div class='text-content'>
                                            <h4> <a href='view/location/{$spot->as_path()}/?uid={$spot->get_uid()}'> {$spot->get_name()} </a> </h4>
                                            <span> {$spot->get_location()->get_country()} </span>
                                        </div>
                                        <div class='plus-button' data-toggle='tooltip' data-placement='top' title='Add to favorites'>
                                            <i class='fa fa-plus' id='plus-{$spot->get_uid()}'></i>
                                            <script type='module'>
                                                import { add_favorites } from './app/spot/favorites/fav-manager.js';
                                                            
                                                document.getElementById('plus-{$spot->get_uid()}').onclick = function (){
                                                    add_favorites('" . $spot->get_uid() . "')
                                                    window.location.href = 'favorites.view.php';
                                                }
                                            </script>
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

        <section class="our-services" id="favorites">
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
                                                <p> As you know (maybe), Parkour was invented in France, during 1980s by David Belle. France gather a lot of very famous spots, particullarly in Paris & Evry. </p>
                                            </li>
                                            <li>
                                                <a> United-States </a>
                                                <p> A lot of traceurs come from United-States. This country contains a lot of interressant places to practice Parkour because of the number of big cities. </p>
                                            </li>
                                            <li>
                                                <a> England </a>
                                                <p> London has the most iconic gap in Parkour. It is called the IMAX Gap and is located in London. Besides, the famous YouTube parkour group Storror comes from England. </p>
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

        <section class="contact down-services" id="contact">
            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <div class="wrapper">
                        <div class="section-heading">
                            <span> Add a Spot </span>
                            <h2> You know a good spot around you and you wanna add it ? Let's request it with the form below ! </h2>
                        </div>
                        <button id="modBtn" class="modal-btn"> Add ! </button>
                    </div>
                    <div id="modal" class="modal">
                        <div class="modal-content">
                            <div class="close fa fa-close"></div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="left-content">
                                        <form class="row" action="" method="post">
                                            <div class="col-md-12">
                                                <div class="section-heading">
                                                    <span> Add a Spot </span>
                                                    <h2> Fullfill the form </h2>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input name="name" type="text" class="form-control" id="name" placeholder="Spot name..." required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input name="country" type="text" class="form-control" id="subject" placeholder="Country..." required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input name="city" type="text" class="form-control" id="subject" placeholder="City..." required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input name="street" type="text" class="form-control" id="subject" placeholder="Street... (not necessarily required)">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input name="latitude" type="number" class="form-control" id="subject" placeholder="Latitude..." step="0.00000000000001" min="-90" max="90" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input name="longitude" type="number" class="form-control" id="subject" placeholder="Longitude..." step="0.00000000000001" min="-180" max="180" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <textarea name="description" rows="6" class="form-control" id="message" placeholder="Description..." required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <button name="submit-request" type="submit" id="form-submit" class="btn"> Send Request </button>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="right-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <div class="section-heading">
                                                        <h2> Process & rules : </h2>
                                                    </div>
                                                    <p> Your request will be examinated within the 7 days. If all the details are okay, your spot will be added to our list. </p>
                                                    <ul>
                                                        <li> - Don't put wrong information intentionaly. </li>
                                                        <li> - One request is enough, don't try to do many requests. </li>
                                                        <li> - Don't try to hack/bypass website security. </li>
                                                    </ul>
                                                </div>
                                            </div>
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
        <script src="style/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="style/js/vendor/bootstrap.min.js"></script>
        <script src="style/js/datepicker.js"></script>
        <script src="style/js/plugins.js"></script>
        <script src="style/js/main.js"></script>
        <script type='module'>
            import { set_cookie, cookie_exist } from './app/network/cookie/cookie-manager.js';
            if (!cookie_exist("favorites")) set_cookie("favorites", "");
        </script>
    </body>
</html>