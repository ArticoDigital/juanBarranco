<?php
/*
Template Name: Servicios Profesionales
*/
?>
<?php get_header(); ?>
<header class="Header-service " style="background: none">
    <div class=" Header-serviceContent row middle center">
        <div class="group-h1 col-6 cols-12">
            <h1>
                <span style="font-size: 73px; line-height: 62px;">SERVICIOS</span>
                <span style="font-size: 46px; line-height: 45px;">PROFESIONALES</span>
            </h1>
            <p style=" margin: 0 auto;width: 353px; font-size: 12px;">
                Servicios orientados al fortalecimiento de los procesos, productos
                y servicios del área de TI, para el incremento de la eficiencia de la
                organización y el apoyo a la obtención de resultados estratégicos
                de la compañía y de tecnologías de información.
            </p>
        </div>
        <figure class="col-6 row center Header-serviceImage" >
            <div class="row center">
                <img style="display:block ;    max-width: inherit;" src="<?php bloginfo("template_url") ?>/assets/images/servicios-profesionales.png"
                     alt="">
            </div>
        </figure>
    </div>
</header>
<?php
$colorBackground = get_post_meta(get_the_ID(), 'colorBackground')[0];
$cb = (empty($colorBackground)) ? '' : $colorBackground;
while (have_posts()) : the_post(); ?>
    <div class="row Half stretch" style="background: <?php echo $cb ?> ">
        <div class="col-3 Nav-sidebar cols-12   ">
            <?php wp_nav_menu(array('theme_location' => 'menuServiciosProfesionales')) ?>
        </div>
        <div class="Content-page col-9 cols-12 row stretch">
            <div class="col-12" style="margin: auto">
                <h4><?php the_title()?></h4>
            </div>
            <div class="Entry-content col-12 cols-12">
                <?php the_content(); ?>
            </div>

        </div>
    </div>
<?php endwhile;
wp_reset_query(); ?>
<?php get_footer(); ?>

