<?php
/*
Template Name: INTENCIÓN ESTRATÉGICA PROFESIONAL
*/
?>
<?php get_header(); ?>
<header class="Header-service ">
    <div class=" Header-serviceContent row middle center">
        <div class="group-h1 col-6">
            <h1>
                <span style="font-size: 52px; line-height: 45px;">INTENCIÓN</span>
                <span style="font-size: 40px; line-height: 45px;">ESTRATÉGICA</span>
                <span style="font-size: 40px; line-height: 34px;">PROFESIONAL</span>
            </h1>
        </div>
        <figure class="col-6 row center Header-serviceImage">
            <div class="row center">
                <img style="display:block" src="<?php bloginfo("template_url") ?>/assets/images/estrategia.jpg"
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
            <?php wp_nav_menu(array('theme_location' => 'menuEstrategia')) ?>
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

