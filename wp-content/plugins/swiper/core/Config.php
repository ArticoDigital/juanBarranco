<?php

function swiper_register_scripts() {
    wp_register_script('swiper-script', plugins_url('swiper/swiper.js'), array( 'jquery' ));
    wp_register_script('main_script', plugins_url('swiper/main.js'));

    wp_enqueue_script('swiper-script');
    wp_enqueue_script('main_script');
}

function swiper_register_styles() {
    wp_register_style('swiper_styles_theme', plugins_url('swiper/styles.css'));
    wp_enqueue_style('swiper_styles_theme');
}