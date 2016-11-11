<?php

function swiper_shortcode($atts = [], $content = null, $tag = '')
{
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    $swiper_atts = shortcode_atts([
        'id' => 1,
        'size' => 'big',
    ], $atts, $tag);


    $schema = new Schema;
    $images = $schema->select('sp_images', '*', ['gallery_id' => esc_html__($swiper_atts['id'], 'swiper')]);
    $html = '';
    if(esc_html__($swiper_atts['size'], 'swiper') == 'big'){
        $html .= count($images) > 1
            ? '<section class="SliderIndex">'
            : '<section class="BannerIndex">';
    }
    else{
        $html .= '<section class="SliderSmall">
                    <h1>Casos de Éxito</h1>';
    }

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