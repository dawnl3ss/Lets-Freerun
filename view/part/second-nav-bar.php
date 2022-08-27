<div class="wrap">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button id="primary-nav-button" type="button"> Menu </button>
                    <span>
                        <a href="../../../../../../Lets-Freerun"><img class="logo" src="../../../../../image/logo.png" alt="logo"></a>
                    </span>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu">
                            <li class='active'>
                                <a href="../../../../../.."> Home </a>
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
                                                    if ($spots->get_location()->get_country() === "United-States")
                                                        echo "<li><a href='../../../../location/{$spots->as_path()}/?uid={$spots->get_uid()}" . "'> {$spots->get_name()} </a></li>";
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
                                                    if ($spots->get_location()->get_country() === "France")
                                                        echo "<li><a href='../../../../location/{$spots->as_path()}/?uid={$spots->get_uid()}" . "'> {$spots->get_name()} </a></li>";
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
                                                    if ($spots->get_location()->get_country() === "England")
                                                        echo "<li><a href='../../../../location/{$spots->as_path()}/?uid={$spots->get_uid()}" . "'> {$spots->get_name()} </a></li>";
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="scrollTo" data-scrollTo="favorits" href="../../../../../favorites.php"> Your favorits </a>
                            </li>
                            <li>
                                <a class="scrollTo" data-scrollTo="contact" href=""> Contact Us </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</div>