<?php

/* 

 *	Theme Options

 * 	---------------------------------------------------------------------------

 * 	@package	: Pixel Art Theme Framework

 *	@author 	: Umair Chaudary

 *	@version	: 1.0

 *	@link		: http://www.pixelartinc.com

 *	@copyright	: Copyright (c) 2012, http://www.pixelartinc.com

 *	--------------------------------------------------------------------------- */

 

 

add_action( 'admin_init', 'custom_theme_options', 1 );



function custom_theme_options() {



$saved_settings = get_option( 'option_tree_settings', array() );

  

$custom_settings = array(



    'contextual_help' => array( 

        'sidebar'       => ''

    ),



    // Sections

    'sections'        => array(

        array(

          'id'          => 'general',

          'title'       => 'Основное'

        ),

        array(

            'id'          => 'sliders',

            'title'       => 'Слайдер'

        ),

        array(

            'id'          => 'layouts',

            'title'       => 'Области'

        ),

        array(

            'id'          => 'styles',

            'title'       => 'Стилизация'

        ),

        array(

            'id'          => 'home',

            'title'       => 'Главная'

        ),

        array(

          'id'          => 'contact',

          'title'       => 'Контакты'

        ),

        array(

          'id'          => 'footer',

          'title'       => 'Подвал'

        ),

    ),

    

	// Settings

    'settings'        => array(



        // General

        array(

            'id'          => 'favicon',

            'label'       => 'Фавикон',

            'desc'        => 'Загрузить изображение значка.Изображение размером 16px на 16px и прозрачные PNG.',

            'std'         => '',

            'type'        => 'upload',

            'section'     => 'general'

        ),

        array(

            'id'          => 'logo',

            'label'       => 'Логотип',

            'desc'        => 'Загрузите лого.',

            'std'         => '',

            'type'        => 'upload',

            'section'     => 'general'

        ),

        array(

            'id'          => 'call',

            'label'       => 'Номер телефона',

            'desc'        => 'Введите свой номер телефона.Он будет показан в шапке.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'email',

            'label'       => 'Email адрес',

            'desc'        => 'Введите свой e-mail. Он будет показан в шапке.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'fb',

            'label'       => 'Facebook',

            'desc'        => 'Введите свой профиль facebook.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'twt',

            'label'       => 'Twitter',

            'desc'        => 'Введите свой профиль twitter.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'gplus',

            'label'       => 'Google Plus',

            'desc'        => 'Введите свой профиль Google Plus.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'flickr',

            'label'       => 'Flickr',

            'desc'        => 'Введите свой профиль flickr.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'rss',

            'label'       => 'RSS',

            'desc'        => 'Введите свой блог / rss.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'blogheading',

            'label'       => 'Заголовок блога',

            'desc'        => 'Введите заголовок для страницы с блогом.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'blogsubheading',

            'label'       => 'Подзаголовок блога',

            'desc'        => 'Введите подзаголовок для страницы с блогом.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'archiveheading',

            'label'       => 'Заголовок архива',

            'desc'        => 'Введите заголовок для страницы с архивом.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'archivesubheading',

            'label'       => 'Подзаголовок архива',

            'desc'        => 'Введите подзаголовок для страницы с архивом.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'searchheading',

            'label'       => 'Заголовок поиска',

            'desc'        => 'Введите заголовок для страницы с поиском.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'searchsubheading',

            'label'       => 'Подзаголовок поиска',

            'desc'        => 'Введите подзаголовок для страницы с поиском.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'related_works_heading',

            'label'       => 'Заголовок связанных проектов',

            'desc'        => 'Введите заголовок для связанных проектов.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),

        array(

            'id'          => 'related_works_subheading',

            'label'       => 'Подзаголовок связанных проектов',

            'desc'        => 'Введите подзаголовок для связанных проектов.',

            'std'         => '',

            'type'        => 'text',

            'section'     => 'general'

        ),



        // Slider

        array(

            'id'          => 'home_slider',

            'label'       => 'Слайдер',

            'desc'        => 'Создайте слайд для слайдера.',

            'std'         => '',

            'type'        => 'list-item',

            'section'     => 'sliders',

            'settings'	  => array(

                array(

                    'id'          => 'img',

                    'label'       => 'Картинка',

                    'desc'        => 'Загрузите картинку для слайда',

                    'std'         => '',

                    'type'        => 'upload'

                ),

                array(

                    'id'          => 'content',

                    'label'       => 'Содержимое',

                    'desc'        => 'Введите контент для слайда',

                    'std'         => '',

                    'type'        => 'textarea-simple',

                    'rows'		  => '3'

                ),

            )

        ),



        // Layouts

        array(

            'label'       => 'Макет блога на отдельной странице',

            'id'          => 'single',

            'type'        => 'radio',

            'desc'        => 'Выберете макет для блога на отдельной странице.',

            'choices'     => array(

                array (

                    'label'       => 'Отдельный пример',

                    'value'       => 'single_simple',

                ),

                array (

                    'label'       => 'Слайдер + Левый сайдбар',

                    'value'       => 'single_slider_ls'

                ),

                array (

                    'label'       => 'Слайдер + Правый сайдбар',

                    'value'       => 'single_slider_rs'

                )

            ),

            'section'     => 'layouts'

        ),

        array(

            'label'       => 'Макет портфолио на отдельной странице',

            'id'          => 'psingle',

            'type'        => 'radio',

            'desc'        => 'Выберете макет для портфолио на отдельной странице.',

            'choices'     => array(

                array (

                    'label'       => 'Отдельный пример',

                    'value'       => 'single_simple',

                ),

                array (

                    'label'       => 'Слайдер + Левый сайдбар',

                    'value'       => 'single_slider_ls'

                ),

                array (

                    'label'       => 'Слайдер + Правый сайдбар',

                    'value'       => 'single_slider_rs'

                )

            ),

            'section'     => 'layouts'

        ),



        // Styling

        array(

            'label'       => 'Главный макет',

            'id'          => 'main_layout',

            'type'        => 'radio',

            'std'         => 'full',

            'desc'        => 'Выберете макет для главной страницы',

            'choices'     => array(

                array (

                    'label'       => 'Блочный',

                    'value'       => 'boxed',

                ),

                array (

                    'label'       => 'На всю ширину',

                    'value'       => 'full'

                )

            ),

            'section'     => 'styles'

        ),

        array(

            'label'       => 'Стиль меню',

            'id'          => 'menu_style',

            'type'        => 'radio',

            'std'         => 'fixed',

            'desc'        => 'Выберете макет для главного меню',

            'choices'     => array(

                array (

                    'label'       => 'Статичное',

                    'value'       => 'static',

                ),

                array (

                    'label'       => 'Фиксированное',

                    'value'       => 'fixed'

                )

            ),

            'section'     => 'styles'

        ),

        array(

            'label'       => 'Фон',

            'id'          => 'body_image',

            'type'        => 'radio-image',

            'std'         => '',

            'desc'        => 'Выберете фон.',

            'choices'     => array(

                array (

                    'label'       => 'Bar',

                    'value'       => 'bar',

                    'src'         => get_template_directory_uri().'/img/bg/bar-bg.png'

                ),

                array (

                    'label'       => 'Цвет',

                    'value'       => 'color',

                    'src'         => get_template_directory_uri().'/img/bg/color-bg.jpg'

                ),

                array (

                    'label'       => 'Пересечение',

                    'value'       => 'cross',

                    'src'         => get_template_directory_uri().'/img/bg/cross-bg.png'

                ),

                array (

                    'label'       => 'Диагональ',

                    'value'       => 'diag',

                    'src'         => get_template_directory_uri().'/img/bg/diag-bg.png'

                ),

                array (

                    'label'       => 'Зернистость',

                    'value'       => 'grain',

                    'src'         => get_template_directory_uri().'/img/bg/grain-bg.png'

                ),

                array (

                    'label'       => 'Бумага',

                    'value'       => 'paper',

                    'src'         => get_template_directory_uri().'/img/bg/paper-bg.png'

                ),

                array (

                    'label'       => 'Смесь',

                    'value'       => 'mix',

                    'src'         => get_template_directory_uri().'/img/bg/mix-bg.jpg'

                ),

                array (

                    'label'       => 'Паркет',

                    'value'       => 'parquet',

                    'src'         => get_template_directory_uri().'/img/bg/parquet-bg.jpg'

                ),

                array (

                    'label'       => 'Штукатурка',

                    'value'       => 'plaster',

                    'src'         => get_template_directory_uri().'/img/bg/plaster-bg.png'

                ),

                array (

                    'label'       => 'Строка',

                    'value'       => 'row',

                    'src'         => get_template_directory_uri().'/img/bg/row-bg.jpg'

                ),

                array (

                    'label'       => 'Песок',

                    'value'       => 'sand',

                    'src'         => get_template_directory_uri().'/img/bg/sand-bg.png'

                )

                ,array (

                    'label'       => 'Площадь',

                    'value'       => 'square',

                    'src'         => get_template_directory_uri().'/img/bg/square-bg.png'

                ),

                array (

                    'label'       => 'Убрать фон',

                    'value'       => 'remove',

                    'src'         => get_template_directory_uri().'/img/remove.png'

                )





            ),

            'section'     => 'styles'

        ),

        array(

            'label'       => 'Цветовая схема',

            'id'          => 'scheme',

            'type'        => 'colorpicker',

            'std'         => '',

            'desc'        => 'Выберете цветовую схему для сайта',

            'section'     => 'styles'

        ),



        // Home

        array(

            'id'          => 'clients',

            'label'       => 'Список клиентов/партнеров',

            'desc'        => 'Создайте список клиентов с логотипами для главной страницы.',

            'std'         => '',

            'type'        => 'list-item',

            'section'     => 'home',

            'settings'	  => array(

                array(

                    'id'          => 'img',

                    'label'       => 'Image',

                    'desc'        => 'upload the image for this client.',

                    'std'         => '',

                    'type'        => 'upload'

                )

            )

        ),



        // Content

        array(

            'id'          => 'contact_address_title',

            'label'       => 'Заголовок адреса',

            'desc'        => 'Введите заголовок для адреса.',

            'std'         => '',

            'section'     => 'contact',

            'type'        => 'textarea-simple',

            'rows'        => '2'

        ),

        array(

            'id'          => 'contact_address',

            'label'       => 'Контактный адрес',

            'desc'        => 'Введите ваш адрес.',

            'std'         => '',

            'section'     => 'contact',

            'type'        => 'textarea-simple',

            'rows'        => '5'

        ),

        array(

            'id'          => 'contact_form_title',

            'label'       => 'Заголовок контактной формы',

            'desc'        => 'Введите заголовок для контактной формы',

            'std'         => '',

            'section'     => 'contact',

            'type'        => 'textarea-simple',

            'rows'		  => '2'

        ),

        array(

            'id'          => 'contact_form',

            'label'       => 'Контактная форма',

            'desc'        => 'Вставьте код контактной формы',

            'std'         => '',

            'section'     => 'contact',

            'type'        => 'textarea-simple',

            'rows'		  => '2'

        ),

        array(

            'id'          => 'contact_map_lat',

            'label'       => 'Широта',

            'desc'        => 'Введите широту,например 40.716818',

            'std'         => '',

            'section'     => 'contact',

            'type'        => 'text'

        ),

        array(

            'id'          => 'contact_map_lng',

            'label'       => 'Долгота',

            'desc'        => 'Введите долготу,например -74.005451',

            'std'         => '',

            'section'     => 'contact',

            'type'        => 'text'

        ),



        // Footer

        array(

            'id'          => 'footer-text',

            'label'       => 'Контент подвала',

            'desc'        => 'Введите контент для подвала.',

            'std'         => '',

            'section'     => 'footer',

            'type'        => 'textarea-simple',

            'rows'		  => '3'

        ),

        array(

            'id'          => 'banner-right',

            'label'       => 'Контент слева от баннера',

            'desc'        => 'Слева от баннера.',

            'std'         => '',

            'section'     => 'footer',

            'type'        => 'textarea-simple',

            'rows'		  => '3'

        ),

        array(



            'id'          => 'banner-img',

            'label'       => 'Картинка баннера',

            'desc'        => 'Загрузите картинку баннера',

            'std'         => '',

            'type'        => 'upload',

            'section'     => 'footer'

        ),

        array(



            'id'          => 'banner-left',

            'label'       => 'Контент справа от баннера',

            'desc'        => 'Справа от баннера.',

            'std'         => '',

            'section'     => 'footer',

            'type'        => 'textarea-simple',

            'rows'		  => '3'

        ),

        array(

            'label'       => 'Настройки отображения баннера',

            'id'          => 'footer_banner',

            'type'        => 'radio',

            'desc'        => 'Показать / скрыть баннер подвала. (По-умолчанию: показать)',

            'std'         => 'show',

            'section'     => 'footer',

            'choices'     => array(

                array (

                    'label'       => 'Скрыть',

                    'value'       => 'hide'

                ),

                array (

                    'label'       => 'Показать',

                    'value'       => 'show'

                )

            ),

        ),



    )

);

  

    $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );



    if ( $saved_settings !== $custom_settings ) {

        update_option( 'option_tree_settings', $custom_settings );

    }

  

}