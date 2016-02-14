<?php

/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/

function pixel_one_half( $atts, $content = null ) {
    return '<div class="span6 margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_one_half', 'pixel_one_half');

function pixel_one_third( $atts, $content = null ) {
    return '<div class="span4 margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_one_third', 'pixel_one_third');

function pixel_two_third( $atts, $content = null ) {
    return '<div class="span8 margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_two_third', 'pixel_two_third');

function pixel_one_fourth( $atts, $content = null ) {
    return '<div class="span3 margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_one_fourth', 'pixel_one_fourth');

function pixel_three_fourth( $atts, $content = null ) {
    return '<div class="span9 margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_three_fourth', 'pixel_three_fourth');

function pixel_one_sixth( $atts, $content = null ) {
    return '<div class="span2 margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_one_sixth', 'pixel_one_sixth');

function pixel_column_row( $atts, $content = null ) {
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('pixel_column_row', 'pixel_column_row');



/*-----------------------------------------------------------------------------------*/
/*	Wide Banner
/*-----------------------------------------------------------------------------------*/

function banner_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'subheading' => '',
        'button' => 'Order',
        'url' => '#'
    ), $atts));

    return '</div></div>
            <div class="wide-bg">
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <h1 class="no-margin">'.$heading.'</h1>
                            <p class="lead no-margin">'.$subheading.'</p>
                        </div>
                        <div class="span6">'.do_shortcode( $content ).'</div>
                        <div class="span3"><a href="'.$url.'" class="btn btn-large btn-primary margin">'.$button.'</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="section"><div class="container">';
}
add_shortcode('wide_banner', 'banner_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Team Members
/*-----------------------------------------------------------------------------------*/

function team_member( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'subheading' => '',
        'posts_per_page' => ''
    ), $atts));

    if(empty($posts_per_page))
    {
        $posts_per_page = 4;
    }

    ob_start();
    ?>

    <div class="row">
        <div class="span12">
            <h2><?php echo $heading; ?></h2>
            <p class="lead"><?php echo $subheading; ?></p>
            <ul class="thumbnails">
                <?php
                $args = array(
                    'post_type' => 'team',
                    'posts_per_page' => $posts_per_page
                );
                $team = new WP_Query( $args );
                while ( $team->have_posts() ) : $team->the_post();
                    $post_id = get_the_ID();
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                ?>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="members" class="thumb fancybox">
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
                            <em><?php get_post_meta($post_id, 'designation', true); ?></em>
                            <div class="social social-profile">
                                <?php
                                $social_icons = array(
                                    'twitter'   => array( 'name'=>'twitter',    'link'=>get_post_meta($post_id, 'team_twt', true) ),
                                    'flickr'    => array( 'name'=>'flickr',     'link'=>get_post_meta($post_id, 'team_flickr', true) ),
                                    'gplus'     => array( 'name'=>'google-plus','link'=>get_post_meta($post_id, 'team_gplus', true) ),
                                    'facebook'  => array( 'name'=>'facebook',   'link'=>get_post_meta($post_id, 'team_fb', true) )
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
                            <p><?php echo excerpt(75); ?></p>
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>">Profile</a>
                        </div>
                    </div>
                </li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>
    </div>
    <hr />

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('team', 'team_member');



/*-----------------------------------------------------------------------------------*/
/*	Blog Posts
/*-----------------------------------------------------------------------------------*/

function home_blog_posts( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'subheading' => '',
        'posts_per_page' => ''
    ), $atts));

    if(empty($posts_per_page))
    {
        $posts_per_page = 4;
    }

    ob_start();
    ?>

    <div class="row">
        <div class="span12">
            <h2><?php echo $heading; ?></h2>
            <p class="lead"><?php echo $subheading; ?></p>
            <ul class="thumbnails">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $posts_per_page
                );
                $post = new WP_Query( $args );
                while ( $post->have_posts() ) : $post->the_post();
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
                                <em><?php the_time('F dS, Y'); ?></em>
                                <p><?php echo excerpt(75); ?></p>
                                <a class="btn" href="<?php the_permalink(); ?>">View</a>
                            </div>
                        </div>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>
    </div>
    <hr />

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('home_posts', 'home_blog_posts');



/*-----------------------------------------------------------------------------------*/
/*	Recent Work
/*-----------------------------------------------------------------------------------*/

function home_recent_work( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'subheading' => '',
        'posts_per_page' => ''
    ), $atts));

    if(empty($posts_per_page))
    {
        $posts_per_page = 4;
    }

    ob_start();
    ?>

    <div class="row">
        <div class="span12">
            <h2><?php echo $heading; ?></h2>
            <p class="lead"><?php echo $subheading; ?></p>
            <ul class="thumbnails">
                <?php
                $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => $posts_per_page
                );
                $post = new WP_Query( $args );
                while ( $post->have_posts() ) : $post->the_post();
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                    $terms = get_the_terms( get_the_id(), 'portfolio-categories' );
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
                                <em><?php foreach( $terms as $term ){ echo $term->name.' '; } ?></em>
                                <p><?php echo excerpt(75); ?></p>
                                <a class="btn" href="<?php the_permalink(); ?>">View</a>
                            </div>
                        </div>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>
    </div>
    <hr />

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('recent_work', 'home_recent_work');



/*-----------------------------------------------------------------------------------*/
/*	Featured Posts
/*-----------------------------------------------------------------------------------*/

function home_featured_posts( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'posts_per_page' => ''
    ), $atts));

    if(empty($posts_per_page))
    {
        $posts_per_page = 2;
    }

    ob_start();
    ?>

<!--    <div class="row">-->
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'meta_query' => array(
                array(
                    'key' => 'featured',
                    'value' => 'featured_no',
                    'compare' => '=',
                    'type' => 'NUMERIC'
                )
            )
        );
        $post = new WP_Query( $args );
        while ( $post->have_posts() ) : $post->the_post();
            ?>
            <div class="span4">
                <h3 class="margin"><?php echo $heading; ?></h3>
                <ul class="media-list">
                    <li class="media simple">
                        <?php
                        if( has_post_thumbnail() ) {
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                            ?>
                            <a href="<?php echo $thumb_url[0]; ?>" title="<?php echo the_title(); ?>" rel="recent" class="pull-left thumb fancybox">
                                <?php the_post_thumbnail('post-small'); ?>
                                <span class="view"><i class="icon-search icon-white"></i></span>
                            </a>
                        <?php
                        }
                        ?>
                        <div class="media-body">
                            <h4 class="media-heading half-margin"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                            <a href="<?php echo the_permalink(); ?>" class="btn btn-small">View</a>
                        </div>
                    </li>
                </ul>
            </div>
        <?php endwhile; ?>
<!--    </div>-->

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('featured_posts', 'home_featured_posts');



/*-----------------------------------------------------------------------------------*/
/*	Popular Posts
/*-----------------------------------------------------------------------------------*/

function home_most_commented( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'posts_per_page' => ''
    ), $atts));

    if(empty($posts_per_page))
    {
       $posts_per_page = 1;
    }

    ob_start();
    ?>

<!--    <div class="row">-->
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'orderby' => 'comment_count'
        );
        $post = new WP_Query( $args );
        while ( $post->have_posts() ) : $post->the_post();

            ?>
            <div class="span4">
                <h3 class="margin"><?php echo $heading; ?></h3>
                <ul class="media-list">
                    <li class="media simple">
                        <?php
                        if( has_post_thumbnail() ) {
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                            ?>
                            <a href="<?php echo $thumb_url[0]; ?>" title="<?php echo the_title(); ?>" rel="recent" class="pull-left thumb fancybox">
                                <?php the_post_thumbnail('post-small'); ?>
                                <span class="view"><i class="icon-search icon-white"></i></span>
                            </a>
                        <?php
                        }
                        ?>
                        <div class="media-body">
                            <h4 class="media-heading half-margin"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                            <a href="<?php echo the_permalink(); ?>" class="btn btn-small">View</a>
                        </div>
                    </li>
                </ul>
            </div>
        <?php endwhile; ?>
<!--    </div>-->

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('popular_posts', 'home_most_commented');



/*-----------------------------------------------------------------------------------*/
/*	Clients
/*-----------------------------------------------------------------------------------*/

function home_client_list( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => ''
    ), $atts));
    ob_start();
    ?>

    <div class="row">
        <div class="span12">
            <p class="lead"><?php echo $heading; ?></p>
            <ul class="thumbnails">
                <?php
                $clients = ot_get_option('clients');
                if($clients)
                {
                    foreach($clients as $client)
                    {
                        echo '<li class="span2">
                                    <div class="partners text-center"><img src="'.$client['img'].'" alt="'.$client['title'].'" /></div>
                              </li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('clients', 'home_client_list');



/*-----------------------------------------------------------------------------------*/
/*	Services
/*-----------------------------------------------------------------------------------*/

function home_services( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'subheading' => '',
        'posts_per_page' => '',
        'style' => ''
    ), $atts));

    if( empty($posts_per_page) )
    {
        $posts_per_page = 4;
    }

    ob_start();
    ?>

    <div class="row">
        <div class="span12">
            <h2><?php echo $heading; ?></h2>
            <p class="lead"><?php echo $subheading; ?></p>
            <ul class="thumbnails">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => $posts_per_page
                );
                $post = new WP_Query( $args );
                while ( $post->have_posts() ) : $post->the_post();
                    $icon = get_post_meta(get_the_id(), 'services_icon', true);
                ?>

                <li class="span3" style="opacity: 1;">
                    <?php
                    if( !empty($style) )
                    {
                        ?>
                        <div class="thumbnail half-margin">
                            <a href="#" class="btn"><i class="icon-<?php echo $icon; ?> icon-white align"></i><?php echo the_title(); ?></a>
                            <p class="caption"><?php echo excerpt(75); ?></p>
                            <a class="btn btn-primary" href="<?php echo the_permalink(); ?>">Detail</a>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="text-center">
                            <?php
                            if( has_post_thumbnail() )
                            {
                                the_post_thumbnail('services');
                            }
                            ?>
                            <br />
                            <a href="<?php echo the_permalink(); ?>" class="btn half-margin"><?php echo the_title(); ?></a>
                            <p class="caption"><?php echo excerpt(75); ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <hr />
    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}
add_shortcode('services', 'home_services');



/*-----------------------------------------------------------------------------------*/
/*	Boxes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wellthemes_msgbox_shortcode')) {

	function wellthemes_msgbox_shortcode( $atts, $content = null ) {
 	    extract(shortcode_atts(array(
	   		'heading' => '',
			'btn' => '',
            'url' => ''
		), $atts));

        $box = '<div class="alert alert-block alert-warning">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4 class="alert-heading">'.$heading.'</h4>
              <p>'.$content.'</p>
              <p><a class="btn" href="'.$url.'">'.$btn.'</a> </p>
            </div>';

		return $box;
	}
    add_shortcode( 'box', 'wellthemes_msgbox_shortcode' );
}



/*-----------------------------------------------------------------------------------*/
/*	Tooltip
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wellthemes_tooltip_shortcode')) {

    function wellthemes_tooltip_shortcode( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'position' => '',
            'tiptext' => '',
        ), $atts));

        $tooltip = '<span data-toggle="tooltip" data-placement="'.$position.'" class="tooltip-hover" data-original-title="'.$tiptext.'">'.$content.'</span>';

        return $tooltip;
    }
    add_shortcode( 'tooltip', 'wellthemes_tooltip_shortcode' );
}



/*-----------------------------------------------------------------------------------*/
/*	Popover
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wellthemes_popover_shortcode')) {

    function wellthemes_popover_shortcode( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'position' => '',
            'title' => '',
            'poptext' => '',
        ), $atts));

        $popover = '<span data-toggle="popover" data-placement="'.$position.'" class="popover-hover" data-content="'.$poptext.'" data-original-title="'.$title.'">'.$content.'</span>';
        return $popover;
    }
    add_shortcode( 'popover', 'wellthemes_popover_shortcode' );
}



/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wellthemes_button_shortcode')) {

	function wellthemes_button_shortcode( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'url'		=> '#',
			'size'		=> '',
			'primary'   => ''
			
	    ), $atts));

        if($size)
        {
            $size = 'btn-'.$size;
        }
        if($primary)
        {
            $primary = 'btn-primary';
        }

        $button = '<a href="' .$url. '" class="btn ' .$size. ' ' .$primary. '">' .$content. '</a>';
	    
	    return $button;
	}
    add_shortcode( 'button', 'wellthemes_button_shortcode' );
}



/*-----------------------------------------------------------------------------------*/
/*	Lightbox Image
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wellthemes_lightbox_image_shortcode')) {
	function wellthemes_lightbox_image_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'src' => '',
			'bigsrc' => '',
			'alt' => '',
		), $atts ) );

        $lightbox_image = '<a href="'.esc_attr($bigsrc).'" rel="sample" class="thumb fancybox"><img src="'.esc_attr($src).'" alt="'.esc_attr($alt).'"> <span class="view"><i class="icon-search icon-white"></i></span></a>';
		
		return $lightbox_image;
	}
	
	add_shortcode( 'lightbox_image', 'wellthemes_lightbox_image_shortcode' );
}



/*-----------------------------------------------------------------------------------*/
/*	Skills
/*-----------------------------------------------------------------------------------*/

function prefetto_skills_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style' => '',
        'value' => '',
    ), $atts));

    if($style == 'two-color')
    {
        $secondValue = 100-$value;
        $two_color = '<div class="bar black" style="width: '.$secondValue.'%;">'.$secondValue.'%</div>';
    }

    $output = '<div class="progress"><div class="bar '.$style.'" style="width: '.$value.';">'.$content.'</div>'.$two_color.'</div>';

    return $output;
}
add_shortcode( 'skill', 'prefetto_skills_shortcode' );



/*-----------------------------------------------------------------------------------*/
/*	Accordions
/*-----------------------------------------------------------------------------------*/

function prefetto_accgroup_shortcode( $atts, $content = null ) {

    $output = '<div class="accordion no-margin" id="accordion">'.do_shortcode($content).'</div>';

    return $output;
}
add_shortcode( 'accordion_group', 'prefetto_accgroup_shortcode' );

function prefetto_acc_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'heading' => '',
        'id' => ''
    ), $atts));

    $output = '<div class="accordion-group">
                    <div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id.'">'.$heading.'</a></div>
                        <div id="collapse'.$id.'" class="accordion-body collapse" style="height: 0px;">
                            <div class="accordion-inner">'.$content.'</strong></div>
                        </div>
                </div>';

    return $output;
}
add_shortcode( 'accordion', 'prefetto_acc_shortcode' );