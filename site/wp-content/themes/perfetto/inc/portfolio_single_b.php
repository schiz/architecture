<div class="span9">
    <em class="data-time">by <a href="#"><?php the_author_posts_link() ?></a> on <span><?php the_time('M j'); ?></span>, <?php the_time('Y'); ?> in
        <?php
        $terms = get_the_terms( $post->ID, 'portfolio-categories' );
        if ( $terms  ) :
            foreach ( $terms as $term ) {
                echo '<a rel="tag" href="'.home_url().'/portfolio-categories/'.$term->slug.'">'.$term->name.'</a> ';
            }
        endif;
        ?>
    </em>
    <br />
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
                $img_src = wp_get_attachment_image_src( $attachment->ID , 'full' );
                echo '<div><a href="'.$img_src[0].'" rel="slider" class="fancybox"><img src="'.$img_src[0].'" alt="Photo" /><span class="view"><i class="icon-search icon-white"></i></span></a> </div>';
            }
        }else{
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
    <h4 class="half-margin">Tags</h4>
    <div class="tags-cont">
        <?php
        $terms = get_the_terms( $post->ID, 'portfolio-categories' );
        if ( $terms  ) :
            foreach ( $terms as $term ) {
                echo '<a rel="tag" href="'.home_url().'/portfolio-categories/'.$term->slug.'">'.$term->name.'</a> ';
            }
        endif;
        ?>
    </div>

</div>