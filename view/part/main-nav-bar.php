<div class="wrap">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button id="primary-nav-button" type="button"> Menu </button>
                    <span>
                        <a href="../Lets-Freerun"><img class="logo" src="image/logo.png" alt="logo"></a>
                    </span>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu">
                            <li class='active'>
                                <a href=".."> Home </a>
                            </li>
                            <li>
                                <a href=""> Most Visited </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href=""> United-States </a>
                                        <ul class="sub-menu">
                                            <?php
                                            foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                if ($spot instanceof Spot){
                                                    if ($spot->get_location()->get_country() === "United-States" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                        echo "<li><a href='view/location/{$spot->as_path()}?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href=""> France </a>
                                        <ul class="sub-menu">
                                            <?php
                                            foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                if ($spot instanceof Spot){
                                                    if ($spot->get_location()->get_country() === "France" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                        echo "<li><a href='view/location/{$spot->as_path()}?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href=""> England </a>
                                        <ul class="sub-menu">
                                            <?php
                                            foreach (SpotManager::$current_spots_list as $uid => $spot){
                                                if ($spot instanceof Spot){
                                                    if ($spot->get_location()->get_country() === "England" && $spot->get_tier() === TieredSpot::SPOT_FAMOUS)
                                                        echo "<li><a href='view/location/{$spot->as_path()}?uid={$spot->get_uid()}" . "'> {$spot->get_name()} </a></li>";
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