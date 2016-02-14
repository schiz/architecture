<?php get_header(); ?>

<?php
$single = ot_get_option('psingle');
if( $single == 'single_slider_ls' || $single == 'single_slider_rs' )
{
    get_template_part('inc/title_breadcrumb');
}
?>

<div class="row">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php
        $single = ot_get_option('psingle');
        if( $single == 'single_simple' )
        {
            get_template_part('inc/portfolio_single');
        }
        elseif( $single == 'single_slider_ls' )
        {
            get_sidebar();
            get_template_part('inc/portfolio_single_b');
        }
        elseif( $single == 'single_slider_rs' )
        {
            get_template_part('inc/portfolio_single_b');
            get_sidebar();
        }
        else
        {
            get_template_part('inc/portfolio_single');
        }
        ?>

    <?php endwhile; ?>

</div>


<?php get_template_part('inc/related-projects'); ?>


</div>
<!-- end of .container -->


<?php get_footer(); ?>
