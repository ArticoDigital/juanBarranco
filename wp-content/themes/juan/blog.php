<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<?php global $post;
$my_query = new WP_Query('category_name=blog&showposts=100'); ?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>


    <?php the_content() ?>


<?php endwhile; ?>
<?php get_footer(); ?>

