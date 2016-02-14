<?php

/*
 * Template Name: Page Right sidebar
 */

get_header();

?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div class="row">

            <div class="span9 clearfix">

                <?php get_template_part('inc/title_breadcrumb'); ?>

                <?php get_template_part('inc/slider_loop-b'); ?>

                <div class="margin" >

                    <?php the_content(); ?>

                </div>
            </div>

            <?php get_sidebar(); ?>

        </div>

    <?php endwhile; ?>

<?php get_footer(); ?>