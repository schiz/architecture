<?php

get_header();

?>

    <div class="row">
        <div class="span12 clearfix">

            <?php
            if(function_exists( 'bcn_display' ) && !is_page_template('template-home.php'))
            {
                ?>
                <div class="breadcrumb">
                    <?php bcn_display(); ?>
                    <?php ?>
                </div>
            <?php } ?>

            <div class="margin">
                <?php
                $heading = ot_get_option('searchheading');
                $sub_heading = ot_get_option('searchsubheading');
                if($sub_heading)
                {
                    echo '<h1 class="no-margin">'.$heading.'</h1>';
                    echo '<p class="lead">'.$sub_heading.'</p>';
                }
                else
                {
                    echo '<h1>'.$heading.'</h1>';
                }
                ?>
            </div>

        </div>
    </div>

    <div class="row">

        <div class="span12">

            <ul class="thumbnails">

                <?php
                if(have_posts())
                    while(have_posts()): the_post();
                        ?>
                    <li <?php post_class('span12 blog-list'); ?>>
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
                            <div class="span9">
                                <em class="data-time"><?php the_author_posts_link() ?> <span><?php the_time('j M'); ?></span>, <?php the_time('Y'); ?></em>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
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