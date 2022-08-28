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
}