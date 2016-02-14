<?php get_header(); ?>

    <?php echo do_shortcode("[team heading='Наша команда' subheading='Представитель'][/team]"); ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div class="row">

        <div class="span3 text-right">
            <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
            ?>
            <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="members" class="thumb half-margin fancybox">
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
            <div class="social social-profile">
                <?php
                $social_icons = array(
                    'twitter'   => array( 'name'=>'twitter',    'link'=>get_post_meta($post->ID, 'team_twt', true) ),
                    'flickr'    => array( 'name'=>'flickr',     'link'=>get_post_meta($post->ID, 'team_flickr', true) ),
                    'gplus'     => array( 'name'=>'google-plus','link'=>get_post_meta($post->ID, 'team_gplus', true) ),
                    'facebook'  => array( 'name'=>'facebook',   'link'=>get_post_meta($post->ID, 'team_fb', true) )
                );
                foreach( $social_icons as $social_name => $social_meta ){
                    $link  = $social_meta['link'];
                    $class = $social_meta['name'];
                    if(!empty($link)){
                        echo '<a href="'.$link.'" class="ico-'.$class.'"><img src="'.get_template_directory_uri().'/img/'.$class.'-icon.png" alt="'.$class.'" /></a>';
                    }
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="span6">
            <div class="single_post">
               <h3><?php the_title();?></h3>
               <em class="data-time half-margin"><?php echo get_post_meta($post->ID, 'designation', true); ?></em><br />
               <?php the_content();?>
            </div>
        </div>

        <div class="span3 margin">
            <?php echo get_post_meta($post->ID, 'right_col', true); ?>
        </div>

    </div>

    <?php endwhile; ?>

</div>



<?php get_footer(); ?>
