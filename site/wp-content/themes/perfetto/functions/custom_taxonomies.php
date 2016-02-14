<?php
/*
 *	Custom Taxonomies
 * 	---------------------------------------------------------------------------
 * 	@package	: Pixel Art Theme Framework
 *	@author 	: Umair Chaudary
 *	@version	: 1.0
 *	@link		: http://www.pixelartinc.com
 *	@copyright	: Copyright (c) 2012, http://www.pixelartinc.com
 *	--------------------------------------------------------------------------- */


function pixelart_taxonomies()
{
    $labels = array(
        'name' => 'Категории',
        'singular_name' => 'Категория',
        'search_items' =>  'Найти категорию',
        'all_items' => 'Все категории',
        'parent_item' => 'Родительские  категории',
        'parent_item_colon' => 'Родительские категории:',
        'edit_item' => 'Редактировать категории',
        'update_item' => 'Обновить категории',
        'add_new_item' => 'Добавить новую категорию',
        'new_item_name' => 'Новые категории',
        'menu_name' => 'Категории',
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio-categories' ),
    );
    register_taxonomy('portfolio-categories', 'portfolio', $args);
}
add_action( 'init', 'pixelart_taxonomies', 0 );