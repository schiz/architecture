<?php
/*
 *	Custom Posts
 * 	---------------------------------------------------------------------------
 * 	@package	: Pixel Art Theme Framework
 *	@author 	: Umair Chaudary
 *	@version	: 1.0
 *	@link		: http://www.pixelartinc.com
 *	@copyright	: Copyright (c) 2012, http://www.pixelartinc.com
 *	--------------------------------------------------------------------------- */


function pixelart_custom_post_type()
{
    $team_labels = array(
        'name' => 'Команда',
        'singular_name' => 'Команда',
        'add_new' => 'Добавить нового',
        'add_new_item' => 'Добавить нового участника',
        'edit_item' => 'Редактировать команду',
        'new_item' => 'New Team',
        'view_item' => 'Просмотреть команду',
        'search_items' => 'Найти команду',
        'not_found' =>  'Команда не найдена',
        'not_found_in_trash' => 'No Team in Trash',
        'parent_item_colon' => ''
    );
    $team_supports = array(
        'title',
        'editor',
        'thumbnail'
    );
    $team_args = array(
        'labels' => $team_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'team' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => $team_supports
    );
    register_post_type('team', $team_args);

    $portfolio_labels = array(
        'name' => 'Портфолио',
        'singular_name' => 'Портфолио',
        'add_new' => 'Добавить новое',
        'add_new_item' => 'Добавить новое портфолио',
        'edit_item' => 'Редактировать портфолио',
        'new_item' => 'Новое портфолио',
        'view_item' => 'Просмотреть портфолио',
        'search_items' => 'Найти портфолио',
        'not_found' =>  'Портфолио не найдено',
        'not_found_in_trash' => 'No Portfolio in Trash',
        'parent_item_colon' => ''
    );
    $portfolio_supports = array(
        'title',
        'editor',
        'thumbnail'
    );
    $portfolio_args = array(
        'labels' => $portfolio_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => $portfolio_supports
    );
    register_post_type('portfolio', $portfolio_args);

    $services_labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга',
        'add_new' => 'Добавить новую',
        'add_new_item' => 'Добавить новую услугу',
        'edit_item' => 'Редактировать услугу',
        'new_item' => 'Новая услуга',
        'view_item' => 'Просмотреть услугу',
        'search_items' => 'Найти услугу',
        'not_found' =>  'Услуга не найдена',
        'not_found_in_trash' => 'No Service in Trash',
        'parent_item_colon' => ''
    );
    $services_supports = array(
        'title',
        'editor',
        'thumbnail'
    );
    $services_args = array(
        'labels' => $services_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'services' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => $services_supports
    );
    register_post_type('services', $services_args);

}
add_action( 'init', 'pixelart_custom_post_type' );