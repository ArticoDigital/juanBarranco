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



    <svg width="54px" height="52px" viewBox="13554 2793 54 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <!-- Generator: Sketch 41 (35326) - http://www.bohemiancoding.com/sketch -->
        <desc>Created with Sketch.</desc>
        <defs></defs>
        <g id="Group-2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(13554.000000, 2793.000000)">
            <path d="M48.204,1.606 C47.714,1.114 47.066,0.869 46.421,0.869 C45.775,0.869 45.128,1.113 44.638,1.604 L40.829,5.404 L49.157,13.717 L52.967,9.921 C53.95,8.936 53.95,7.34 52.967,6.361 L48.204,1.606 Z" id="Shape" fill="#B4B4B4"></path>
            <polygon id="Shape" fill="#B4B4B4" points="16.104 30.083 24.433 38.397 47.376 15.498 39.046 7.184"></polygon>
            <polygon id="Shape" fill="#B4B4B4" points="14.308 31.86 12.528 41.949 22.636 40.173"></polygon>
            <path d="M37.331,46.441 L5.928,46.441 L5.928,15.041 L28.09,15.041 L33.551,9.589 L4.002,9.589 C2.062,9.589 0.478,11.175 0.478,13.115 L0.478,48.37 C0.478,50.306 2.062,51.893 4.002,51.893 L39.256,51.893 C41.193,51.893 42.778,50.306 42.778,48.37 L42.778,23.163 L37.329,28.604 L37.331,46.441 Z" id="Shape" fill="#B4B4B4"></path>
        </g>
    </svg>


<?php endwhile;
wp_reset_query(); ?>
<?php get_footer(); ?>

