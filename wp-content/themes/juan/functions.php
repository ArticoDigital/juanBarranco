<?php
/*
Description: WP Functions - Theme init
Theme: After Party Bogotá
*/
//add image in posts
add_theme_support('post-thumbnails');

define('themeDir', get_template_directory() . '/');
define('themeDirUri', get_template_directory_uri());

/* Jquery + Main */
add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, '2.1.3' , true);
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'main', themeDirUri . '/assets/js/main.js', '', '', true );
}
/* remove emoji comments */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/* Add Menu */
add_action('init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(
        array(
            'menuHeader' => __('Menu Header'),
            'menuFooter' => __('Menu Footer'),
            'menuEstrategia' => __('Menu Estrategia'),
        )
    );
}

/* Add Space Search Widget */
add_action('widgets_init', 'widgetSearchFooter');
function widgetSearchFooter(){
    register_sidebar(
        array(
            'id' => 'widgetSearch', /* ID unique*/
            'name' => 'widgetSearch',
            'description' => 'widget',
            'before_widget' => '<div class "SearchFooter">',
            'after_widget' => '</div>',
            'before_title' => '<strong>',
            'after_title' => '</strong>',
        )
    );
}
/* Add Custom Search */
add_filter('get_search_form', 'searchCustom');
function searchCustom() {
    $form = '<form role="search" method="get"   action="' . home_url( '/' ) . '" >
    <input type="text" placeholder="Buscar" value="" name="s" >
        <button></button>

    </form>';
    return $form;
}
if( class_exists( 'kdMultipleFeaturedImages' ) ) {

    $args = array(
        'id' => 'featured-image-2',
        'post_type' => 'page',      // Set this to post or page
        'labels' => array(
            'name'      => 'Featured image 2',
            'set'       => 'Set featured image 2',
            'remove'    => 'Remove featured image 2',
            'use'       => 'Use as featured image 2',
        )
    );

    new kdMultipleFeaturedImages( $args );
}
add_theme_support('category-thumbnails');

function swiper_init(){
    $args = array(
        'public' => true,
        'label' => 'Sliders',
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('swiper_images', $args);
}
add_action('init', 'swiper_init');

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

function swiper_function($slug) {

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