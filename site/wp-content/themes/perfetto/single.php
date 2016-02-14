<?php get_header(); ?>

<?php
$single = ot_get_option('single');
if( $single == 'single_slider_ls' || $single == 'single_slider_rs' )
{
    get_template_part('inc/title_breadcrumb');
}
?>

<div class="row">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php
        $single = ot_get_option('single');
        if( $single == 'single_simple' )
        {
            get_template_part('inc/single_content');
            get_sidebar();
        }
        elseif( $single == 'single_slider_ls' )
        {
            get_sidebar();
            get_template_part('inc/single_content_b');
        }
        elseif( $single == 'single_slider_rs' )
        {
            get_template_part('inc/single_content_b');
            get_sidebar();
        }
        else
        {
            get_template_part('inc/single_content');
            get_sidebar();
        }
        ?>

    <?php endwhile; ?>

</div>

<hr>

<div class="row">

    <?php get_template_part('inc/related-posts'); ?>

    <?php get_template_part('inc/recent-posts'); ?>

    <?php get_template_part('inc/popular-posts'); ?>

</div>

</div>
<!-- end of .container -->


<?php get_footer(); ?>
