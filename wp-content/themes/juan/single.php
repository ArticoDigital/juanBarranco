<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="Single row ">
        <h1><?php the_title() ?></h1>

        <article>
            <figure class="col-12" style="
                    background-image: url(' <?php echo get_the_post_thumbnail_url(); ?>'); height: 300px;
                    background-size: contain;">

            </figure>
            <?php the_content() ?>
        </article>

    </section>
<?php endwhile;endif ?>
<?php get_footer(); ?>


