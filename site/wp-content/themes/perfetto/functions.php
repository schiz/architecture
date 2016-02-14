<?php
/* 
 *	Main Functions
 * 	---------------------------------------------------------------------------
 * 	@package	: Pixel Art Theme Framework
 *	@author 	: Umair Chaudary
 *	@version	: 1.0
 *	@link		: http://www.pixelartinc.com
 *	@copyright	: Copyright (c) 2012, http://www.pixelartinc.com
 *	--------------------------------------------------------------------------- */


	/****************************************************************************
	Content Width
	****************************************************************************/
	if ( ! isset( $content_width ) ) $content_width = 960;
	
	
	/****************************************************************************
	Custom Background
	****************************************************************************/
	add_theme_support( 'custom-background' );
	
	
	/****************************************************************************
	Editor Style Supoort
	****************************************************************************/
	add_editor_style('editor-style.css');
	
	
	/****************************************************************************
	Automatic Feeds Links
	****************************************************************************/
	add_theme_support('automatic-feed-links');
	
	
	/****************************************************************************
	Theme Options
	****************************************************************************/
	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' );
	add_filter( 'ot_theme_mode', '__return_true' );
	include_once( 'option-tree/ot-loader.php' );
	
	
	/****************************************************************************
	Theme Options
	****************************************************************************/
	include_once( 'functions/theme-options.php' );
	include_once( 'functions/custom_functions.php' );
	include_once( 'functions/theme-metaboxes.php' );
    include_once( 'functions/custom_posts.php' );
    include_once( 'functions/custom_taxonomies.php' );

    define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/meta-box' ) );
    require_once RWMB_DIR . 'meta-box.php';
    include 'functions/config-meta-boxes.php';
	
	
	/****************************************************************************
	Define Paths
	****************************************************************************/
	define('SHORTCODES', get_template_directory() . '/inc/shortcodes/');

	
	/****************************************************************************
	Shortcodes
	****************************************************************************/
	require(SHORTCODES . 'shortcodes.php');
    require(SHORTCODES . 'pixel-shortcodes.php');
	
	
	/****************************************************************************
	Post Thumbnails
	****************************************************************************/
    add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_image_size' ) ) {
        //add_image_size( 'team', 270, 152, true );
        add_image_size( 'post', 270, 152, true );
        add_image_size( 'post-small', 100, 100, true );
        add_image_size( 'services', 270, 152, true );
        add_image_size( 'blog-2col', 570, 321, true );
        add_image_size( 'blog-3col', 370, 208, true );
        add_image_size( 'blog-4col', 370, 208, true );
        add_image_size( 'single-slider', 870, 394, true );
    }
	
	
	/****************************************************************************
	Register Sidebars
	****************************************************************************/
	if ( function_exists('register_sidebar') ) {
	
		/********* Left Sidebar **********/
		register_sidebar(array('name'=>'Sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="half-margin">',
			'after_title' => '</h3>'
		));

	}

	
	/****************************************************************************
	Custom Menu
	****************************************************************************/
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'top-menu' => 'Main Menu'
	  		)
	  	);
	}


	/****************************************************************************
	Loading JS Files
	****************************************************************************/
	if(!function_exists('load_theme_scripts'))
	{
		function load_theme_scripts()
		{		
			if (!is_admin()) {

                $jscriptURL = get_template_directory_uri().'/js/';

                if ( is_page_template('template-contact.php') ) {
                    wp_enqueue_script('gmapapi', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', false);
                }
                wp_enqueue_script('jquery');
                //wp_enqueue_script('jquery_local', $jscriptURL.'jquery.min.js', '1.8.3', false);
                wp_enqueue_script('bootstrap', $jscriptURL.'bootstrap.min.js', array('jquery'), false);
                wp_enqueue_script('slides', $jscriptURL.'slides.min.js', array('jquery'), '3.0.3', false);
                wp_enqueue_script('masonry', $jscriptURL.'masonry.min.js', array('jquery'), '1.0.7', false);
                wp_enqueue_script('fancybox', $jscriptURL.'fancybox.js', array('jquery'), '2.1.4', false);
                wp_enqueue_script('functions_script', $jscriptURL.'functions.js', array('jquery'), false);
			}
		}
	}
	add_action('init', 'load_theme_scripts');


    /****************************************************************************
    Loading Google Fonts
    ****************************************************************************/
    function mytheme_fonts() {

        $protocol = is_ssl() ? 'https' : 'http';
        wp_enqueue_style( 'mytheme-oswald', "$protocol://fonts.googleapis.com/css?family=Oswald:400,300" );}

    add_action( 'wp_enqueue_scripts', 'mytheme_fonts' );


	/****************************************************************************
	Loading CSS Files
	****************************************************************************/
	if(!function_exists('load_my_styles'))
	{
		function load_my_styles()
		{		
			if (!is_admin())

                wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
                wp_register_style('bootstrap_responsive', get_template_directory_uri().'/css/bootstrap-responsive.min.css');
                wp_register_style('style', get_stylesheet_uri());
                wp_register_style('slides', get_template_directory_uri().'/css/slides.css');
                wp_register_style('masonry', get_template_directory_uri().'/css/masonry.css');
                wp_register_style('fancybox', get_template_directory_uri().'/css/fancybox.css');

                wp_enqueue_style('bootstrap');
                wp_enqueue_style('bootstrap_responsive');
                wp_enqueue_style('style');
                wp_enqueue_style('slides');
                wp_enqueue_style('masonry');
                wp_enqueue_style('fancybox');

		}
	}
  	add_action('wp_print_styles', 'load_my_styles');
	
	
	/****************************************************************************
	Comment List
	****************************************************************************/
	if( !function_exists( 'pixelart_comment' ) ) 
	{
		function pixelart_comment($comment, $args, $depth) {
	
			$GLOBALS['comment'] = $comment; 
			?>

                <li class="media" <?php comment_class(); ?>  id="comment-<?php comment_ID() ?>">

                    <a href="<?php echo get_comment_author_url(); ?>" class="avatar pull-left thumb">
                        <?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
                    </a>

                    <div class="media-body">
                        <h4 class="media-heading"><?php comment_author_link(); ?></h4>
                        <em class="data-time"><i class="icon-time opacity"></i><?php get_comment_date( 'd.m.Y' ); ?> at <?php comment_time( 'H:i:s' ); ?></em>
                        <?php comment_text() ?>

                        <?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="icon-comment icon-white"></i> Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<span class="reply-link pull-right">', 'after' => '</span>',))) ?>
                    </div>


			<?php
		}
	}

	
	/****************************************************************************
	Theme Pagination
	****************************************************************************/
	function theme_pagination($pages = ''){
		global $paged;
		
		if(empty($paged))$paged = 1;
		
		$prev = $paged - 1;							
		$next = $paged + 1;	
		$range = 1;
		$showitems = ($range * 2)+1;
		
		if($pages == '')
		{	
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{
				$pages = 1;
			}
		}
		
		if(1 != $pages){
			echo "<div class='pagination pagination-right margin'><ul>";
			//echo ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li> ":"";
			//echo ($paged > 1 && $showitems < $pages)? "<li><a href='".get_pagenum_link($prev)."'>Prev</a></li> ":"";
            echo "<li>".get_previous_posts_link()."</li>";

			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."'>".$i."</a></li> ":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li> ";
				}
			}

            echo "<li>".get_next_posts_link()."</li>";
			//echo ($paged < $pages && $showitems < $pages) ? "<li><a href='".get_pagenum_link($next)."'>Next</a></li> " :"";
			//echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li> ":"";
			echo "</ul></div>";
		}
	}