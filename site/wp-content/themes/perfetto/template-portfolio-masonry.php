<?php

/*
 * Template Name: Portfolio Masonry
 */

get_header();

?>

<?php get_template_part('inc/title_breadcrumb'); ?>

<?php get_template_part('inc/slider_loop'); ?>

    </div>
    </div>

    <div id="masonry">

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
            'paged' => $paged
        );
        $temp = $wp_query;
        $wp_query= null;
        $wp_query = new WP_Query( $args );
        while($wp_query->have_posts()): $wp_query->the_post();
            $featured = get_post_meta($post->ID, 'featured', true);
            ?>

            <div <?php if( $featured == 'featured_yes' ){ post_class('single big'); }else{ post_class('single'); } ?>>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <em class="data-time"><?php the_author_posts_link() ?> <span><?php the_time('j M'); ?></span>, <?php the_time('Y'); ?></em>
                <?php
                if( has_post_thumbnail() )
                {
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                    ?>
                    <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="thumb fancybox">
                        <?php the_post_thumbnail('blog-2col'); ?>
                        <span class="view"><i class="icon-search icon-white"></i></span>
                    </a>
                <?php
                }
                ?>
                <p><?php echo excerpt(75); ?></p>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Продолжение</a>

            </div>

        <?php endwhile; ?>

    </div>

    <div class="section">

        <div class="container">

<?php get_footer(); ?>