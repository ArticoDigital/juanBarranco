<?php get_header(); ?>
<section class="SliderIndex">
    <section class="Slider-images swiper-wrapper">
        <article class="Item swiper-slide">
            <blockquote class="row middle color-darkBlue">
                <p>
                    SERVICIOS Y SOLUCIONES <br>
                    <sup>EN</sup> <span style="font-size: 1.45rem">GOBIERNO CORPORATIVO</span> <br>
                    <sup>Y</sup> <span style="font-size: 1.28rem"> ARQUITECTURA EMPRESARIAL</span><br>
                    <span style="font-size: 2.75rem">A SU ALCANCE</span>
                </p>
            </blockquote>
            <img src="<?php bloginfo('template_url') ?>/assets/slider1/slider_01.jpg" alt="">
        </article>
        <article class="Item swiper-slide">
            <blockquote class="row middle color-darkBlue">
                <p>
                    SERVICIOS Y SOLUCIONES <br>
                    <sup>EN</sup> <span style="font-size: 1.45rem">GOBIERNO CORPORATIVO</span> <br>
                    <sup>Y</sup> <span style="font-size: 1.28rem"> ARQUITECTURA EMPRESARIAL</span><br>
                    <span style="font-size: 2.75rem">A SU ALCANCE</span>
                </p>
            </blockquote>
            <img src="<?php bloginfo('template_url') ?>/assets/slider1/slider_01.jpg" alt="">
        </article>
        <article class="Item swiper-slide">
            <blockquote class="row middle color-darkBlue">
                <p>
                    SERVICIOS Y SOLUCIONES <br>
                    <sup>EN</sup> <span style="font-size: 1.45rem">GOBIERNO CORPORATIVO</span> <br>
                    <sup>Y</sup> <span style="font-size: 1.28rem"> ARQUITECTURA EMPRESARIAL</span><br>
                    <span style="font-size: 2.75rem">A SU ALCANCE</span>
                </p>
            </blockquote>
            <img src="<?php bloginfo('template_url') ?>/assets/slider1/slider_01.jpg" alt="">
        </article>
        <article class="Item swiper-slide">
            <blockquote class="row middle color-darkBlue">
                <p>
                    SERVICIOS Y SOLUCIONES <br>
                    <sup>EN</sup> <span style="font-size: 1.45rem">GOBIERNO CORPORATIVO</span> <br>
                    <sup>Y</sup> <span style="font-size: 1.28rem"> ARQUITECTURA EMPRESARIAL</span><br>
                    <span style="font-size: 2.75rem">A SU ALCANCE</span>
                </p>
            </blockquote>
            <img src="<?php bloginfo('template_url') ?>/assets/slider1/slider_01.jpg" alt="">
        </article>
    </section>
    <div class="Slider-arrows">
        <span class="Arrow Arrow--prev">
            <img src="<?php bloginfo('template_url') ?>/assets/images/arrow.svg" alt="arrow">
        </span>
        <span class="Arrow Arrow--next">
            <img src="<?php bloginfo('template_url') ?>/assets/images/arrow.svg" alt="arrow">
        </span>
    </div>
    <div class="Slider-circles">
        <div class="Circles-container"></div>
    </div>
</section>
<?php get_footer(); ?>
<script>
    $(document).ready(function () {
        var mySwiper = new Swiper ('.SliderIndex', {
            loop: true,
            direction: 'horizontal',
            pagination: '.Circles-container',
            nextButton: '.Arrow--next',
            prevButton: '.Arrow--prev',
            paginationClickable: true,
        })
    });
</script>
