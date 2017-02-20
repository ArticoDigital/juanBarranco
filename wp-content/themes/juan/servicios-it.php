<?php
/*
Template Name: SERVICIOS IT
*/
?>
<?php get_header(); ?>
<header class="Header-service ">
    <div class=" Header-serviceContent row middle center">
        <div class="group-h1 col-6 cols-12">
            <h1>
                <span style="font-size: 25px; line-height: 45px;"><?php _e('¿WHAT PROFESSIONAL DOES IT DELIVER YOU', 'luker'); ?></span>
                <span style="font-size: 58px; line-height: 45px;"><?php _e('SERVICES IT?', 'luker'); ?></span>
            </h1>
        </div>
        <figure class="col-6 row center Header-serviceImage" style="height: 200px">

        </figure>
    </div>
</header>
<?php
$colorBackground = get_post_meta(get_the_ID(), 'colorBackground')[0];
$cb = (empty($colorBackground)) ? '' : $colorBackground;
while (have_posts()) : the_post(); ?>
    <div class="row Half stretch" style="background: <?php echo $cb ?> ">
        <div class="col-3 Nav-sidebar cols-12   ">
            <?php wp_nav_menu(array('theme_location' => 'menuServiciosIT')) ?>
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

