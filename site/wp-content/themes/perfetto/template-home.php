<?php

/*
 * Template Name: Home
 */

get_header();

?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('inc/title_breadcrumb'); ?>

        <?php get_template_part('inc/slider_loop'); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

</div>
<!-- end of .container -->

<?php get_footer(); ?>