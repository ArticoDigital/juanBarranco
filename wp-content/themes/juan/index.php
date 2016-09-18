<?php get_header(); ?>
<?php global $post;
$my_query = new WP_Query('category_name=noticias&showposts=10'); ?>
    <ul class="News row ">

        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <?php
            $back = get_post_custom_values('fondo', $post->ID)[0];
            $color = get_post_custom_values('color', $post->ID)[0];
            ?>
            <li class="col-4 cols-12 row middle end" style='background : <?php echo $back ?>'>
                <a href=" <?php echo get_permalink($post->ID) ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                    <?php else: echo '<h2 class="end" style="color:  ' . $color . ' ">' . get_the_title() . '</h2> <span style="color: ' . $color . '"> + </span>' ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php get_footer(); ?>