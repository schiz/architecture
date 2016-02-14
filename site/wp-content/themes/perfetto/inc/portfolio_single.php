<div class="span3 text-right post-meta clearfix">

    <?php
    if(function_exists( 'bcn_display' ))
    {
        ?>
        <div class="breadcrumb">
            <?php bcn_display(); ?>
            <?php ?>
        </div>
    <?php } ?>
    <h1 class="no-margin"><?php the_title(); ?></h1>
    <em class="data-time"><a href="#"><?php the_author_posts_link() ?></a> <span><?php the_time('j M'); ?></span>, <?php the_time('Y'); ?></em><br />
    <br />
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
    <hr />
    <dl>
        <dt>Категории</dt>
        <dd>
            <?php
            $terms = get_the_terms( $post->ID, 'portfolio-categories' );
            if ( $terms  ) :
            foreach ( $terms as $term ) {
                echo '<a href="'.home_url().'/portfolio-categories/'.$term->slug.'">'.$term->name.'</a> , ';
            }
            endif;
            ?>
        </dd>
    </dl>

</div>

<div class="span9">

    <div class="single_post">
        <?php
        if( has_post_thumbnail() )
        {
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
            ?>
            <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="fancybox">
                <?php the_post_thumbnail('single-slider'); ?>
                <span class="view"><i class="icon-search icon-white"></i></span>
            </a>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="span9">
            <ul class="thumbnails">
                <?php
                $args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_status' => null,
                    'post_parent' => $post->ID,
                    'exclude' => array(get_post_thumbnail_id( $post->ID ))
                );
                $attachments = get_posts( $args );
                if ( $attachments ) {
                    foreach ( $attachments as $attachment ) {
                        $img_src_a = wp_get_attachment_image_src( $attachment->ID , 'full' );
                        $img_src_b = wp_get_attachment_image_src( $attachment->ID , 'post' );
                        echo '<li class="span3" style="opacity: 1;">
                                  <div class="thumbnail">
                                      <a href="'.$img_src_a[0].'" rel="thumbnails" class="thumb fancybox">
                                            <img src="'.$img_src_b[0].'" alt="Photo" />
                                            <span class="view"><i class="icon-search icon-white"></i></span>
                                      </a>
                                  </div>
                              </li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="single_post">
        <?php the_content();?>
    </div>

</div>
