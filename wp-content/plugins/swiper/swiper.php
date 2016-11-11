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
require_once "core/ShortCodes.php";

/*** ADD MENU ***/

function swiper_options_panel() {
    add_menu_page('Sliders', 'Sliders', 'manage_options', plugin_dir_path(__FILE__) . 'app/index.php' , null);
    add_submenu_page( plugin_dir_path(__FILE__) . 'app/index.php', 'Nuevo', 'Nuevo', 'manage_options', plugin_dir_path(__FILE__) . 'app/elements/new.php', null);
    add_submenu_page( null, 'Update', 'Update', 'manage_options', plugin_dir_path(__FILE__) . 'app/elements/edit.php', null);
}

function swiper_shortcodes_init() {
    add_shortcode('swiper', 'swiper_shortcode');
}

add_action('admin_menu', 'swiper_options_panel');

register_deactivation_hook( __FILE__, 'wp_swiper_deactivation_hook' );
register_activation_hook( __FILE__, 'wp_swiper_activation_hook' );

add_action('init', 'swiper_shortcodes_init');
add_action('wp_print_scripts', 'swiper_register_scripts');
add_action('wp_print_styles', 'swiper_register_styles');