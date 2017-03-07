<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<?php global $post;
$my_query = new WP_Query('category_name=blog&showposts=100'); ?>
<section class="row Half center stretch" id="blog">
    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

        <article class="col-7 row start">
            <div class="col-9 ">
                <h2><?php the_title() ?></h2>
                <?php the_excerpt() ?>
            </div>
            <figure class="col-3">
                <?php the_post_thumbnail(); ?>
            </figure>
        </article>

    <?php endwhile;
    wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>

