<?php
/* 
 *	Custom Functions
 * 	---------------------------------------------------------------------------
 * 	@package	: Pixel Art Theme Framework
 *	@author 	: Umair Chaudary
 *	@version	: 1.0
 *	@link		: http://www.pixelartinc.com
 *	@copyright	: Copyright (c) 2012, http://www.pixelartinc.com
 *	--------------------------------------------------------------------------- */
 
 
 	/****************************************************************************
	Browser Based Body Classes
	****************************************************************************/
	function pixelart_browser_body_class($class) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if($is_lynx) 
		$class[] = 'lynx';
		elseif($is_gecko) 
		$class[] = 'gecko';
		elseif($is_opera) 
		$class[] = 'opera';
		elseif($is_NS4) 
		$class[] = 'ns4';
		elseif($is_safari) 
		$class[] = 'safari';
		elseif($is_chrome) 
		$class[] = 'chrome';
		elseif($is_IE) 
		$class[] = 'ie';
		elseif($is_iphone) 
		$class[] = 'iphone';
		else 
		$class[] = 'unknown';
		
		return $class;
	}
	
	add_filter('body_class', 'pixelart_browser_body_class');
	
	
	/****************************************************************************
	Active Menu Classes
	****************************************************************************/
	function pixelart_clean_active_menu($css_classes, $item) {
		$css_classes = str_replace('current_page_item', 'active', $css_classes);
		$css_classes = str_replace('current-menu-item', 'active', $css_classes);
		$css_classes = str_replace('current-post-ancestor', 'active', $css_classes);
		$css_classes = str_replace('current-menu-parent', 'active', $css_classes);
		$css_classes = str_replace('current-menu-ancestor', 'active', $css_classes);
		
		return $css_classes;
	}
	
	add_filter('nav_menu_css_class', 'pixelart_clean_active_menu', 10, 2);
	
	
	/****************************************************************************
	Autoparagraph Fix
	****************************************************************************/
	function shortcode_empty_paragraph_fix($content){   
	  	$array = array (
	  		'<p>[' => '[', 
	  		']</p>' => ']', 
	  		']<br />' => ']'
	  	);
	  
	  	$content = strtr($content, $array);
	  
	  	return $content;
	}
	  
	add_filter('the_content', 'shortcode_empty_paragraph_fix');
	add_filter( 'widget_text', 'do_shortcode', 11);
	
	
	/****************************************************************************
	Custom Excerpt Hellip
	****************************************************************************/
	function pixelart_auto_excerpt_more( $more ) {
		return ' &hellip;';
	}
	add_filter( 'excerpt_more', 'pixelart_auto_excerpt_more' );


    /****************************************************************************
    Custom Excerpt Length
    ****************************************************************************/
    function excerpt($limit) {
        $excerpt = substr(get_the_excerpt(), 0, $limit);
        return $excerpt;
    }



    /****************************************************************************
    Menu Description
     ****************************************************************************/
    class Menu_With_Description extends Walker_Nav_Menu {
        function start_el(&$output, $item, $depth, $args) {
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

            $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
            $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
            $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= '<span>' . $item->description . '</span>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }