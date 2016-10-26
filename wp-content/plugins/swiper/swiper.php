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


add_action( 'admin_action_create', 'create_admin_action' );
add_action( 'admin_action_update', 'update_admin_action' );

function update_admin_action(){
    $title = $_POST['gallery_title'];
    $id = $_POST['id'];

    if(count($_POST) < 3){
        wp_redirect(admin_url('admin.php?page=swiper/app/elements/new.php&name=' . str_replace(' ', '%20', $title) . '&error=' . str_replace(' ', '%20', 'Debe agregar al menos 1 imágen')));
    }
    else {
        $schema = new Schema;
        $schema->update('sp_gallery', [
            'name' => $title,
            'updated_at' => date('Y-m-d')
        ], [
            'id' => $id
        ]);

        $schema->delete('sp_images', ['gallery_id' => $id]);

        foreach ($_POST as $key => $item) {
            if (strpos($key, 'image') !== false){
                $schema->insert('sp_images', [
                    'name' => $item,
                    'gallery_id' => $id
                ]);
            }
        }

        wp_redirect(admin_url('admin.php?page=swiper/app/index.php'));
    }
}

function create_admin_action() {
    $title = $_POST['gallery_title'];

    if(count($_POST) < 3){
        wp_redirect(admin_url('admin.php?page=swiper/app/elements/new.php&name=' . str_replace(' ', '%20', $title) . '&error=' . str_replace(' ', '%20', 'Debe agregar al menos 1 imágen')));
    }
    else {
        $schema = new Schema;
        $gallery = $schema->insert('sp_gallery', [
            'name' => $_POST['gallery_title'],
            'slug' => str_replace(' ', '-', strtolower($_POST['gallery_title'])),
            'updated_at' => date('Y-m-d')
        ]);

        foreach ($_POST as $key => $item) {
            if (strpos($key, 'image') !== false){
                $schema->insert('sp_images', [
                    'name' => $item,
                    'gallery_id' => $gallery
                ]);
            }
        }

        wp_redirect(admin_url('admin.php?page=swiper/app/index.php'));
    }

}

if( is_admin() ) {
    function my_admin_load_styles_and_scripts() {
        $mode = get_user_option( 'media_library_mode', get_current_user_id() ) ? get_user_option( 'media_library_mode', get_current_user_id() ) : 'grid';
        $modes = array( 'grid', 'list' );
        if ( isset( $_GET['mode'] ) && in_array( $_GET['mode'], $modes ) ) {
            $mode = $_GET['mode'];
            update_user_option( get_current_user_id(), 'media_library_mode', $mode );
        }
        if( ! empty ( $_SERVER['PHP_SELF'] ) && 'upload.php' === basename( $_SERVER['PHP_SELF'] ) && 'grid' !== $mode ) {
            wp_dequeue_script( 'media' );
        }
        wp_enqueue_media();
    }
    add_action( 'admin_enqueue_scripts', 'my_admin_load_styles_and_scripts' );
}

function swiper_options_panel() {
    add_menu_page('Sliders', 'Sliders', 'manage_options', plugin_dir_path(__FILE__) . 'app/index.php' , null);
    add_submenu_page( plugin_dir_path(__FILE__) . 'app/index.php', 'Nuevo', 'Nuevo', 'manage_options', plugin_dir_path(__FILE__) . 'app/elements/new.php', null);
    add_submenu_page( null, 'Update', 'Update', 'manage_options', plugin_dir_path(__FILE__) . 'app/elements/edit.php', null);
}

add_action('admin_menu', 'swiper_options_panel');

function swiper_settings_init() {

    add_settings_section(
        'swiper_section_home',
        __('', 'swiper'),
        'swiper_section_developers_cb',
        'swiper'
    );

    // register a new field in the "wporg_section_developers" section, inside the "wporg" page
    add_settings_field(
        'swiper_field_pill', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Pill', 'wporg'),
        'swiper_field_pill_cb',
        'swiper',
        'swiper_section_developers',
        [
            'label_for'         => 'swiper_field_pill',
            'class'             => 'swiper_row',
            'swiper_custom_data' => 'custom',
        ]
    );
}

add_action('admin_init', 'swiper_settings_init');

// developers section cb

// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function swiper_section_developers_cb($args)
{
    ?>
    <p id="<?= esc_attr($args['id']); ?>"><?= esc_html__('Follow the white rabbit.', 'swiper'); ?></p>
    <?php
}

// pill field cb

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function swiper_field_pill_cb($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('swiper_options');
    // output the field
    ?>
    <select id="<?= esc_attr($args['label_for']); ?>"
            data-custom="<?= esc_attr($args['swiper_custom_data']); ?>"
            name="swiper_options[<?= esc_attr($args['label_for']); ?>]"
    >
        <option value="red" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'red', false)) : (''); ?>>
            <?= esc_html('red pill', 'swiper'); ?>
        </option>
        <option value="blue" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'blue', false)) : (''); ?>>
            <?= esc_html('blue pill', 'swiper'); ?>
        </option>
    </select>
    <p class="description">
        <?= esc_html('You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'swiper'); ?>
    </p>
    <p class="description">
        <?= esc_html('You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'swiper'); ?>
    </p>
    <?php
}

/**
 * top level menu
 */

/**
 * top level menu:
 * callback functions
 */
function swiper_options_page_html()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('wporg_messages', 'wporg_message', __('Settings Saved', 'wporg'), 'updated');
    }

    // show error/update messages
    settings_errors('wporg_messages');
    ?>
    <div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields('wporg');
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections('wporg');
            // output save settings button
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}


/*function swiper_function($slug) {

    $args = [
        'post_type' => 'swiper_images',
    ];

//    $loop = new WP_Query($args);
//while ($loop->have_posts()) {
//$loop->the_post();

    $args = array(
        'name'   => $slug,
        'post_type'   => 'swiper_images',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    );

    $gallery = get_posts($args);

    var_dump($gallery);

    $size = types_render_field( '', [ "url" => "true"]);
    $urls = explode(' ', types_render_field( 'swiperoneimage', ["url" => "true"] ));

    $html = count($urls) > 1
        ? '<section class="SliderIndex">'
        : '<section class="BannerIndex">';

    $html .= '<section class="Slider-images swiper-wrapper">';

    foreach($urls as $url){

        $html .= '<article class="Item swiper-slide">
                          <img src="' . $url . '" alt="">
                      </article>';
    }

    $html .= '</section>';

    if(count($urls) > 1){
        $html .= '<div class="Slider-arrows">
                        <span class="Arrow Arrow--prev">
                            <img src="' . content_url('themes/juan/assets/images/arrow.svg') . '" alt="arrow">
                        </span>
                        <span class="Arrow Arrow--next">
                            <img src="' . content_url('themes/juan/assets/images/arrow.svg') . '" alt="arrow">
                        </span>
                    </div>
                    <div class="Slider-circles">
                        <div class="Circles-container"></div>
                    </div>';
    }
    return $html .= '</section>';
    //  }
}
*/

register_deactivation_hook( __FILE__, 'wp_swiper_deactivation_hook' );
register_activation_hook( __FILE__, 'wp_swiper_activation_hook' );

add_action('wp_print_scripts', 'swiper_register_scripts');
add_action('wp_print_styles', 'swiper_register_styles');