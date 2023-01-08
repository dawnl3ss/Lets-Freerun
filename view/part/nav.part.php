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
                                            <? foreach (SpotManager::$current_spots_list as $uid => $spots): ?>
                                                <? if ($spots->get_location()->get_country() === "United-States" && $spots->get_tier() === TieredSpot::SPOT_FAMOUS): ?>
                                                    <?= "<li><a href='/{$spots->as_path()}" . "'> {$spots->get_name()} </a></li>" ?>
                                                <? endif; ?>
                                            <? endforeach; ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href=""> France </a>
                                        <ul class="sub-menu">
                                            <? foreach (SpotManager::$current_spots_list as $uid => $spots): ?>
                                                <? if ($spots->get_location()->get_country() === "France" && $spots->get_tier() === TieredSpot::SPOT_FAMOUS): ?>
                                                    <?= "<li><a href='/{$spots->as_path()}" . "'> {$spots->get_name()} </a></li>" ?>
                                                <? endif; ?>
                                            <? endforeach; ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href=""> England </a>
                                        <ul class="sub-menu">
                                            <? foreach (SpotManager::$current_spots_list as $uid => $spots): ?>
                                                <? if ($spots->get_location()->get_country() === "England" && $spots->get_tier() === TieredSpot::SPOT_FAMOUS): ?>
                                                    <?= "<li><a href='/{$spots->as_path()}" . "'> {$spots->get_name()} </a></li>" ?>
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
                            <li>
                                <a href="/favorites"> test </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</div>