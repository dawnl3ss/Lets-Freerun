<?php

require_once __DIR__ . "/../Autoloader.php";
__load_all_classes();

class Render {

    /**
     * @param Spot $spot
     *
     * @return string
     */
    public static function spot_card(Spot $spot) : string {
        return "
            <div class='item popular-item'>
                <div class='thumb'>
                    <img style='object-fit: cover; width:400px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg" . "' alt=''>
                    <div class='text-content'>
                        <h4> <a href='/{$spot->as_path()}'> {$spot->get_name()} </a> </h4>
                        <span> {$spot->get_location()->get_country()} </span>
                    </div>
                    <div class='plus-button' data-toggle='tooltip' data-placement='top' title='Add to favorites'>
                        <i class='fa fa-plus' id='plus-{$spot->get_uid()}'></i>
                        <script type='module'>
                            import { add_favorites } from './../app/spot/favorites/fav-manager.js';
                            
                            document.getElementById('plus-{$spot->get_uid()}').onclick = function (){
                                add_favorites('" . $spot->get_uid() . "');
                                window.location.href = '/favorites';
                            }
                        </script>
                    </div>
                </div>
            </div>
        ";
    }

    /**
     * @param Spot $spot
     *
     * @return string
     */
    public static function fav_card(Spot $spot) : string {
        return "
            <div class='col-md-4 col-sm-6 col-xs-12'>
                <div class='featured-item'>
                    <div class='thumb'>
                        <img style='object-fit: cover; width:1000px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg' alt=''>
                        <div class='overlay-content'><ul><li><i class='fa fa-star'></i></li></ul></div>
                    </div>
                    <div class='down-content'>
                        <h4> " . $spot->get_name() . " </h4>
                        <span> " . ucfirst($spot->tier_to_category()) . " </span>
                        <p> " . $spot->get_description() . " </p>
                        <div class='row'>
                            <div class='col-md-6 first-button'>
                                <div class='text-button'>
                                    <a href='' id='fav-{$spot->get_uid()}'> Remove from favorites </a>
                                    <script type='module'>
                                        import { delete_favorites } from './../app/spot/favorites/fav-manager.js';
                                                                        
                                        document.getElementById('fav-{$spot->get_uid()}').onclick = function (){
                                            delete_favorites('" . $spot->get_uid() . "');
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='text-button'>
                                    <a href='/{$spot->as_path()}'> See details </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

    /**
     * @param Spot $spot
     *
     * @return string
     */
    public static function search_card(Spot $spot, bool $fav) : string {
        if ($fav) return "
            <div class='col-md-4 col-sm-6 col-xs-12'>
                <div class='featured-item'>
                    <div class='thumb'>
                        <img style='object-fit: cover; width:1000px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg' alt=''>
                    </div>
                    <div class='down-content'>
                        <h4> " . $spot->get_name() . " </h4>
                        <span> " . ucfirst($spot->tier_to_category()) . " </span>
                        <p> " . $spot->get_description() . " </p>
                        <div class='row'>
                            <div class='col-md-6 first-button'>
                                <div class='text-button'>
                                    <a href='/favorites' id='fav-{$spot->get_uid()}'> Remove from favorites </a>
                                    <script type='module'>
                                        import { delete_favorites } from './../app/spot/favorites/fav-manager.js';
                                                                        
                                        document.getElementById('fav-{$spot->get_uid()}').onclick = function (){
                                            delete_favorites('" . $spot->get_uid() . "');
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='text-button'>
                                    <a href='/{$spot->as_path()}'> See details </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        "; else {
            return "
                <div class='col-md-4 col-sm-6 col-xs-12'>
                    <div class='featured-item'>
                        <div class='thumb'>
                            <img style='object-fit: cover; width:1000px; height:200px;' src='image/location/{$spot->as_path()}/cover.jpg' alt=''>
                        </div>
                        <div class='down-content'>
                            <h4> " . $spot->get_name() . " </h4>
                            <span> " . ucfirst($spot->tier_to_category()) . " </span>
                            <p> " . $spot->get_description() . " </p>
                            <div class='row'>
                                <div class='col-md-6 first-button'>
                                    <div class='text-button'>
                                        <a href='/favorites' id='fav-{$spot->get_uid()}'> Add to favorites </a>
                                        <script type='module'>
                                            import { add_favorites } from './../app/spot/favorites/fav-manager.js';
                                                                            
                                            document.getElementById('fav-{$spot->get_uid()}').onclick = function (){
                                                add_favorites('" . $spot->get_uid() . "');
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='text-button'>
                                        <a href='/{$spot->as_path()}'> See details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
    }

    /**
     * @param Spot $spot
     *
     * @param string $image
     *
     * @return string
     */
    public static function img_card(Spot $spot, string $image) : string {
        return "
            <span class='item popular-item'>
                <span class='thumb'>
                    <img id='spot-picture' src='../../image/location/{$spot->as_path()}/{$image}" . "' alt=''>
                </span>
            </span>
        ";
    }
}