<?php

/*
 * Template Name: Contact
 */

get_header();

?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('inc/title_breadcrumb'); ?>

        <?php get_template_part('inc/slider_loop'); ?>

        <div class="row">
            <div class="span12">
                <div class="margin" >
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

    <hr />

    <div class="row">

        <!-- Contact Address -->
        <div class="span3">
            <div class="half-margin">
                <h3 class="half-margin"><?php echo ot_get_option('contact_address_title'); ?></h3>
                <address>
                    <?php echo ot_get_option('contact_address'); ?>
                </address>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="span3">
            <div class="half-margin map-form">
                <h3 class="half-margin"><?php echo ot_get_option('contact_form_title'); ?></h3>
                <?php echo do_shortcode(ot_get_option('contact_form'));?>
            </div>
        </div>

        <!-- Contact Map -->
        <div class="span6 margin">
            <?php
            $lat = ot_get_option('contact_map_lat');
            $lng = ot_get_option('contact_map_lng');
            if( !empty($lat) && !empty($lng) )
            {
                echo '<div data-lat="'.$lat.'" data-lng="'.$lng.'" id="map-canvas" style="width: 100%; height: 350px;"></div>';
            }
            else
            {
                echo '<p><strong>ERROR!</strong> Latitude and Longitude values are missing in Theme Options.<br />Please enter the values of Latitude and Longitude in <em>Appearance > Theme Options > Contact</em> to display the map properly.</p>';
            }
            ?>

        </div>

    </div>

</div>

<?php get_footer(); ?>