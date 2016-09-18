<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="Single">
        <h1><?php the_title() ?></h1>

    </section>
<?php endwhile;endif ?>
<?php get_footer(); ?>


