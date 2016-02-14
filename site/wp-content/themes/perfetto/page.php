<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('inc/title_breadcrumb'); ?>

    <?php get_template_part('inc/slider_loop'); ?>

    <div class="row">

        <div class="span12 clearfix">
            <div class="margin" >

                <?php the_content(); ?>

            </div>
        </div>

    </div>

<?php endwhile; ?>

<?php get_footer(); ?>