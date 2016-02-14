<?php
/* 
 *	Mwta Boxes
 * 	---------------------------------------------------------------------------
 * 	@package	: Pixel Art Theme Framework
 *	@author 	: Umair Chaudary
 *	@version	: 1.0
 *	@link		: http://www.pixelartinc.com
 *	@copyright	: Copyright (c) 2012, http://www.pixelartinc.com
 *	--------------------------------------------------------------------------- */
 
 
add_action( 'admin_init', '_custom_meta_boxes' );

function _custom_meta_boxes() {

    $post_meta_box = array(
        'id'          => 'post_meta_box',
        'title'       => 'Дополнительные параметры',
        'desc'        => '',
        'pages'       => array( 'post', 'portfolio' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Особенности',
                'id'          => 'featured',
                'type'        => 'radio',
                'std'         => 'featured_no',
                'desc'        => 'Сделать этот пост особенным. (По умолчанию: нет)',
                'choices'     => array(
                    array (
                        'label'       => 'Да',
                        'value'       => 'featured_yes'
                    ),
                    array (
                        'label'       => 'Нет',
                        'value'       => 'featured_no'
                    )
                ),
            )
        )
    );

    $page_meta_box = array(
        'id'          => 'page_meta_box',
        'title'       => 'Настройки страницы',
        'desc'        => '',
        'pages'       => array( 'page' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Подзаголовок',
                'id'          => 'subheading',
                'type'        => 'text'
            )
        )
	);

    $slider_meta_box = array(
        'id'          => 'slider_meta_box',
        'title'       => 'Настройка слайдера',
        'desc'        => 'Выбирайте варианты, если вы хотите показать слайдер на этой странице. Вы можете редактировать содержимое слайдера в настройках темы.',
        'pages'       => array( 'page' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Отображение слайдера',
                'id'          => 'slider_button',
                'type'        => 'checkbox',
                'desc'        => 'Показать / скрыть слайдер для этой страницы. (По-умолчанию: скрыто)',
                'choices'     => array(
                    array (
                        'label'       => 'Показать',
                        'value'       => 'slider_on'
                    )
                ),
            ),
            array(
                'label'       => 'Стиль слайдера',
                'id'          => 'slider_checkbox',
                'type'        => 'checkbox',
                'desc'        => 'Выберите стиль слайдера. На всю ширину слайдер будет работать только для соответствующих страниц. (По-умолчанию: блок)',
                'choices'     => array(
                    array (
                        'label'       => 'На всю ширину',
                        'value'       => 'ful_width'
                    )
                ),
            ),
        )
    );

    $team_meta_box = array(
        'id'          => 'team_meta_box',
        'title'       => 'Подробности о представителе',
        'desc'        => '',
        'pages'       => array( 'team' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Обозначение',
                'id'          => 'designation',
                'type'        => 'text'
            ),
            array(
                'label'       => 'Содержимое правой колонки',
                'id'          => 'right_col',
                'type'        => 'textarea'
            ),
            array(
                'label'       => 'Facebook Profile URL',
                'id'          => 'team_fb',
                'type'        => 'text'
            ),
            array(
                'label'       => 'Twitter Profile URL',
                'id'          => 'team_twt',
                'type'        => 'text'
            ),
            array(
                'label'       => 'Google Plus Profile URL',
                'id'          => 'team_gplus',
                'type'        => 'text'
            ),
            array(
                'label'       => 'Flickr Profile URL',
                'id'          => 'team_flickr',
                'type'        => 'text'
            )
        )
    );

    $services_meta_box = array(
        'id'          => 'services_meta_box',
        'title'       => 'Настройки сервисов',
        'desc'        => 'Выберите иконку для этого сервиса. (Опционально)',
        'pages'       => array( 'services' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'icons_textblock',
                'id'          => 'icons_textblock',
                'type'        => 'textblock',
                'desc'        => 'Введите возможное значение: glass, music, search, star, star-empty, heart, user, envelope, film, th, th-large, th-list, ok, remove, zoom-in, zoom-out, off, signal, cog, trash, home, file, time, road, download, upload, download-alt, inbox, play-circle, repeat, refresh, lock, list-alt, flag, headphones, volume-off, volume-off, volume-down, qrcode, barcode, tag, tags, book, bookmark, print, camera, font, bold, italic, text-height, text-width, align-left, align-right, align-center, align-justify, list, indent-left, indent-right, facetime-video, picture, pencil, map-marker, adjust, tint, edit, share, check, move, step-backward, fast-backward, backward, play, pause, stop, forward, fast-forward, step-forward, eject, chevron-left, chevron-right, plus-sign, minus-sign, remove-sign, ok-sign, question-sign, info-sign, remove-circle, screenshot, ok-circle, ban-circle, arrow-left, arrow-right, arrow-up, arrow-down, resize-full, share-alt, resize-small, plus, minus, asterisk, exclamation-sign, gift, leaf, fire, eye-open, eye-close, warning-sign, plane, calendar, rendom, comment, magnet, chevron-up, chevron-down, retweet, shopping-cart, folder-close, folder-open, resize-vertical, resize-horizontal, hdd, bullhorn, bell, certificate, thumbs-up, thumbs-down, hand-right, hand-left, hand-up, hand-down, circle-arrow-right, circle-arrow-left, circle-arrow-up, circle-arrow-down, globe, wrench, tasks, filter, briefcase, fullscreen'
            ),
            array(
                'label'       => 'Иконка сервиса',
                'id'          => 'services_icon',
                'type'        => 'text',
                'desc'        => ''
            )
        )
    );

    /*
	$post_id = (isset($_GET['post'])) ? $_GET['post'] : ((isset($_POST['post_ID'])) ? $_POST['post_ID'] : false);

    if ($post_id) :

        $post_template = get_post_meta($post_id, '_wp_page_template', true);

        if ($post_template == 'template-home.php') {
            ot_register_meta_box($my_meta_box);
        }

    endif;
	*/

    ot_register_meta_box($post_meta_box);
    ot_register_meta_box($page_meta_box);
    ot_register_meta_box($slider_meta_box);
    ot_register_meta_box($team_meta_box);
    ot_register_meta_box($services_meta_box);

}