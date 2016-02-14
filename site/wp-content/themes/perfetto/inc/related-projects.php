<div class="row">
    <div class="span12">
        <hr>
        <?php
        $heading = ot_get_option('related_works_heading');
        $subheading = ot_get_option('related_works_subheading');
        if($heading)
        {
            echo '<h2>'.$heading.'</h2>';
        }
        if($subheading)
        {
            echo '<p class="lead">'.$subheading.'</p>';
        }
        ?>
        <ul id="portfolio" class="thumbnails">
            <?php
            $categories = get_the_terms($post->ID, 'portfolio-categories');
            if ($categories) {
                $category_ids = array();
                foreach($categories as $single_category) $category_ids[] = $single_category->term_id;

                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'portfolio-categories',
                            'terms'     => $category_ids,
                            'operator'  => 'IN'
                        )
                    ),
                    'post__not_in'          => array( $post->ID ),
                    'posts_per_page'        => 4,
                    'ignore_sticky_posts'   => 1
                );

            }

            if($args){
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                    ?>
                    <li class="span3">
                        <div class="thumbnail">
                            <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="thumb fancybox">
                                <?php
                                if( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="'.get_template_directory_uri().'/img/placeholder.jpg" alt="Placeholder" />';
                                }
                                ?>
                                <span class="view">
                                    <i class="icon-search icon-white"></i>
                                </span>
                            </a>
                            <div class="caption">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <em class="data-time"><?php the_author_posts_link() ?> <span><?php the_time('j M'); ?></span>, <?php the_time('Y'); ?></em>
                                <?php echo excerpt(75);?>
                                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Просмотреть</a>
                            </div>
                        </div>
                    </li>

                <?php
                endwhile;
                wp_reset_query();
            }
            ?>
        </ul>
    </div>
</div>