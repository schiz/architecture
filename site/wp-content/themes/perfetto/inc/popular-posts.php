    <div class="span4">
        <h3 class="margin">Популярные посты</h3>
        <ul class="media-list">
            <?php
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => 4,
                    'orderby'               => 'comment_count'
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                    ?>
                    <li class="media simple">
                        <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="thumb pull-left fancybox">
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
                        <div class="media-body">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <br />
                            <em class="data-time"><?php the_author_posts_link() ?> <span><?php the_time('j M'); ?></span>, <?php the_time('Y'); ?></em><br />
                            <a class="btn btn-small" href="<?php the_permalink(); ?>">Просмотреть</a>
                        </div>
                    </li>

                <?php
                endwhile;
                wp_reset_query();
            ?>
        </ul>
    </div>