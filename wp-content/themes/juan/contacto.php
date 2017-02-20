<?php
/*
Template Name: Contacto
*/
?>
<?php get_header(); ?>
<?php
while (have_posts()) : the_post(); ?>
    <div class="Contact row Half stretch " style="background: <?php echo $cb ?> ">

        <div class="Content-page col-6 cols-12 row stretch">
            <div class="col-12" style="margin: auto">
                <h2 style="margin: 6rem 0 7rem; text-align: center"><?php the_title() ?></h2>
            </div>
            <div class=" Contact-content  col-12 cols-12" style="text-align: left">
                <?php the_content(); ?>
            </div>
            <?php global $post;
            $my_query = new WP_Query('category_name=ubicaciones&showposts=100'); ?>
            <ul class="map row col-12" id="locations">
                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                    <li style="color: blue;" class="col-4 cols-6 row " id="locations" data-lnglat="<?php echo the_title() ?>">
                        <?php the_content() ?>
                    </li>

                <?php endwhile; ?>
            </ul>
            <div id="map" class="col-12" style="height: 300px"></div>
        </div>
        <div class="col-6 cols-12">
            <figure>
                <img src="<?php bloginfo('template_url') ?>/assets/images/pag-web.png" alt="">
            </figure>
            <div class="Contact-form" style="margin: 40px ;background: #d8d8d8; max-width: 300px; padding: 20px 20px;
border-radius: 4px;  ">
                <h3>Formulario de contacto</h3>
                <?php echo do_shortcode('[contact-form-7 id="309" title="Contact form 1"]') ?>
            </div>
        </div>
    </div>


    <script>
        function initMap() {

            var location = $('#locations li:first-child').data('lnglat').split(',');
            console.log(location)
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: Number(location[0]), lng: Number(location[1])},
                scrollwheel: false,
                zoom: 13
            });

            var marker = new google.maps.Marker({
                position: {lat: Number(location[0]), lng: Number(location[1])},

            });

            $('#locations li').on('click', function () {
                var locations = $(this).data('lnglat').split(',');
                var latlng = new google.maps.LatLng(Number(locations[0]), Number(locations[1]));
                marker.setPosition(latlng);
                map.setCenter({lat: Number(locations[0]), lng: Number(locations[1])});
            });


            marker.setMap(map);



        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrhX-WElUsi_iyMJ2NNC741pN_mQUIhVE&callback=initMap"
            async defer></script>
<?php endwhile;
wp_reset_query(); ?>
<?php get_footer(); ?>

