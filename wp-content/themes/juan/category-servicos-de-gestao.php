<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<?php global $post;
$my_query = new WP_Query('category_name=servicos-de-gestao&showposts=100'); ?>
<div class="row  cols-12" id="blog">
    <section class="row Half center stretch col-8 cols-12" >
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

            <article class="col-12 cols-12  row start">
                <div class="col-9 cols-12">
                    <h2><?php the_title() ?></h2>
                    <?php the_excerpt() ?>
                </div>
                <figure class="col-3 cols-12">
                    <?php the_post_thumbnail(); ?>
                </figure>
            </article>

        <?php endwhile;wp_reset_postdata(); ?>
    </section>
    <aside class=" col-3">
        <div class="Content-aside">
            <h3>todos os itens</h3>
            <?php $my_query1 = new WP_Query('category_name=servicos-de-gestao&showposts=100'); ?>
            <?php while ($my_query1->have_posts()) : $my_query1->the_post(); ?>
                <ul>

                    <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                </ul>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </aside>
</div>
<?php get_footer(); ?>

