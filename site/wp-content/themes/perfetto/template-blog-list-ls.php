<?php

/*
 * Template Name: Blog List + Left Sidebar
 */

get_header();

?>

    <?php get_template_part('inc/title_breadcrumb'); ?>

    <div class="row">

        <?php get_sidebar(); ?>

        <div class="span9">

            <?php get_template_part('inc/slider_loop_b'); ?>

            <ul class="thumbnails">

                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'paged' => $paged
                );
                $temp = $wp_query;
                $wp_query= null;
                $wp_query = new WP_Query( $args );
                while($wp_query->have_posts()): $wp_query->the_post();
                    ?>
                    <li <?php post_class('span9 blog-list'); ?>>
                        <div class="row">
                            <?php
                            if( has_post_thumbnail() )
                            {
                                $thumb_id = get_post_thumbnail_id();
                                $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                                ?>
                                <div class="span3">
                                    <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="thumb fancybox">
                                        <?php the_post_thumbnail('post'); ?>
                                        <span class="view"><i class="icon-search icon-white"></i></span>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="span6">
                                <em class="data-time"><?php the_author_posts_link() ?> <span><?php the_time('j M'); ?></span>, <?php the_time('Y'); ?></em>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo the_excerpt(); ?></p>
                                <dl class="dl-horizontal">
                                    <dt>Категории</dt>
                                    <dd><?php the_category(' , '); ?></dd>
                                    <dt>Метки</dt>
                                    <dd><?php the_tags(' ', ' , '); ?></dd>
                                </dl>
                                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Просмотреть</a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>

            </ul>

            <?php theme_pagination(); ?>

        </div>

    </div>

<?php get_footer(); ?>