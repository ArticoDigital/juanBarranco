<?php

/*
Plugin Name: Swiper
Plugin URI: http://idangero.us/swiper/get-started/
Description: Most Modern Mobile Touch Slider.
Author: Santiago Ruiz
Version: 3.3.1
Author URI: https://github.com/santo52
Licence: GPL2
*/

defined( 'ABSPATH' ) or die( '¡Swiper is failing!' );

require_once "core/Schema.php";
require_once "core/Install.php";
require_once "core/Config.php";
require_once "core/Actions.php";

/*** ADD MENU ***/

function swiper_options_panel() {
    add_menu_page('Sliders', 'Sliders', 'manage_options', plugin_dir_path(__FILE__) . 'app/index.php' , null);
    add_submenu_page( plugin_dir_path(__FILE__) . 'app/index.php', 'Nuevo', 'Nuevo', 'manage_options', plugin_dir_path(__FILE__) . 'app/elements/new.php', null);
    add_submenu_page( null, 'Update', 'Update', 'manage_options', plugin_dir_path(__FILE__) . 'app/elements/edit.php', null);
}

add_action('admin_menu', 'swiper_options_panel');


function swiper_function($id) {

    $schema = new Schema;
    $images = $schema->select('sp_images', '*', ['gallery_id' => $id]);


    $html = count($images) > 1
        ? '<section class="SliderIndex">'
        : '<section class="BannerIndex">';

    $html .= '<section class="Slider-images swiper-wrapper">';

    foreach($images as $image){

        $html .= '<article class="Item swiper-slide">
                      <img src="' . $image->name . '" alt="">
                  </article>';
    }

    $html .= '</section>';

    if(count($images) > 1){
        $html .= '<div class="Slider-arrows">
                        <span class="Arrow Arrow--prev">
                            <img src="' . plugins_url('swiper/public/images/arrow.svg') . '" alt="arrow">
                        </span>
                        <span class="Arrow Arrow--next">
                            <img src="' . plugins_url('swiper/public/images/arrow.svg') . '" alt="arrow">
                        </span>
                    </div>
                    <div class="Slider-circles">
                        <div class="Circles-container"></div>
                    </div>';
    }

    return $html .= '</section>';
}

register_deactivation_hook( __FILE__, 'wp_swiper_deactivation_hook' );
register_activation_hook( __FILE__, 'wp_swiper_activation_hook' );

add_action('wp_print_scripts', 'swiper_register_scripts');
add_action('wp_print_styles', 'swiper_register_styles');