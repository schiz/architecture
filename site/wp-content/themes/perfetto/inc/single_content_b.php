<div class="span9">
    <em class="data-time"><a href="#"><?php the_author_posts_link() ?></a> <span><?php the_time('j M'); ?></span>, <?php the_time('Y '); ?><?php the_category(' , '); ?></em><br />
    <div class="slides">
        <?php
        if( has_post_thumbnail() )
        {
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
            ?>
            <div>
                <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="fancybox">
                    <?php the_post_thumbnail('single-slider'); ?>
                    <span class="view"><i class="icon-search icon-white"></i></span>
                </a>
            </div>
        <?php
        }
        ?>
        <?php
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post->ID
        );
        $attachments = get_posts( $args );
        if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
                $img_src_a = wp_get_attachment_image_src( $attachment->ID , 'full' );
                echo '<div><a href="'.$img_src_a[0].'" rel="slider" class="fancybox"><img src="'.$img_src_a[0].'" alt="Photo" /> <span class="view"><i class="icon-search icon-white"></i></span></a> </div>';
            }
        }
        else
        {
            if( has_post_thumbnail() )
            {
                $thumb_id = get_post_thumbnail_id();
                $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                ?>
                <div>
                    <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="fancybox">
                        <?php the_post_thumbnail('single-slider'); ?>
                        <span class="view"><i class="icon-search icon-white"></i></span>
                    </a>
                </div>
            <?php
            }
        }
        ?>
    </div>
    <div class="margin">
        <?php the_content(); ?>
    </div>
    <h4 class="half-margin">Метки</h4>
    <div class="tags-cont">
        <?php the_tags( ' ', '&nbsp;', ' ' ); ?>
    </div>

    <?php wp_link_pages(array(
        'before'           => '<div class="pagination pagination-right margin"><ul><li>',
        'after'            => '</li></ul></div>',
        'link_before'      => '',
        'link_after'       => '',
        'next_or_number'   => 'next',
        'nextpagelink'     => 'Next Page',
        'previouspagelink' => 'Previous Page',
        'echo'             => 1
    )); ?>

    <div class="pagination text-center">
        <ul>
            <li class="pull-left"><?php next_post_link( '%link', '<< Старые посты' ); ?></li>
            <li class="pull-right"><?php previous_post_link( '%link', 'Новые посты >>' ); ?></li>
        </ul>
    </div>

    <hr />

    <?php
        if(is_singular( 'post' ))
        {
            comments_template();
        }
    ?>

</div>