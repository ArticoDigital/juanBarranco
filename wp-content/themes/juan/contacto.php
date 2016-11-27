<?php
/*
Template Name: Contacto
*/
?>
<?php get_header(); ?>
<?php
while (have_posts()) : the_post(); ?>
    <div class="Contact row Half stretch" style="background: <?php echo $cb ?> ">

        <div class="Content-page col-9 cols-12 row stretch">
            <div class="col-12" style="margin: auto">
                <h2><?php the_title()?></h2>
            </div>
            <div class=" Contact-content col-12 cols-12">
                <?php the_content(); ?>
            </div>

        </div>
    </div>
<?php endwhile;
wp_reset_query(); ?>
<?php get_footer(); ?>

