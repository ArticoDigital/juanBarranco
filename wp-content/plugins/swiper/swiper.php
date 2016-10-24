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

register_deactivation_hook( __FILE__, 'wp_swiper_deactivation_hook' );
register_activation_hook( __FILE__, 'wp_swiper_activation_hook' );

require_once ABSPATH . "wp-content/plugins/swiper/app/schema.php";

function wp_swiper_activation_hook() {

    $schema = new Schema;
    $schema->create('sp_gallery', [
        'id INT PRIMARY KEY AUTO_INCREMENT',
        'name VARCHAR(100) NOT NULL',
        'description VARCHAR(250)',
    ]);

    $schema->create('sp_images', [
        'id INT PRIMARY KEY AUTO_INCREMENT',
        'name VARCHAR(100) NOT NULL',
        'gallery_id INT NOT NULL',
        'CONSTRAINT images_gallery_fk FOREIGN KEY (gallery_id) REFERENCES ' . $schema->getPrefix('sp_gallery') . ' (id)'
    ]);
}

function wp_swiper_deactivation_hook() {
    echo "<script>alert('prueba');</script>";
}

/*add_theme_support( 'post-thumbnails' );
*/
add_action('wp_print_scripts', 'swiper_register_scripts');
add_action('wp_print_styles', 'swiper_register_styles');