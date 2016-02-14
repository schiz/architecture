<!doctype html>
<!--[if IE 7]>    <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">

        <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php if( ot_get_option('favicon') ): ?>
                <link rel="icon" type="image/png" href="<?php echo ot_get_option('favicon'); ?>">
        <?php else: ?>
                <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.jpg">
        <?php endif; ?>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false" type="text/javascript" style=""></script>
        <!--[if lt IE 9]>
                <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <![endif]-->

        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

        <?php
        $main_layout = ot_get_option('main_layout');
        if( $main_layout == 'boxed' )
        {
            $body_class = 'boxed';
        }
        else
        {
            $body_class = '';
        }
        ?>

        <?php
        $body_image = ot_get_option('body_image');
        if( !empty($body_image) && $body_image ==! 'remove' )
        {
            $body_bg = 'style="background-image: url('.get_template_directory_uri().'/img/bg/'.$body_image.'-bg.jpg); background-repeat: repeat;"';
        }
        else
        {
            $body_bg = '';
        }
        ?>

        <?php get_template_part('inc/custom_color'); ?>

        <?php wp_head(); ?>

    </head>
    <body <?php body_class( $body_class ); ?>  <?php echo $body_bg; ?>>

        <div class="section">

            <!-- start of .container -->
            <div class="container">

                <!-- Header -->
                <div class="row">
                    <div class="span6">
                        <?php
                        $logo = ot_get_option('logo');
                        if($logo)
                        {
                            ?>
                            <p class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="logo"/></a></p>
                        <?php
                        }else{
                            ?>
                            <h1><a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo('name'); ?></a></h1>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="span6">
                        <div class="top-header text-right "><em><?php echo ot_get_option('call');?> - <a href="#"><?php echo ot_get_option('email');?></a></em>
                            <div class="social">
                                <?php
                                $social_icons = array(
                                    'twitter'   => array( 'name'=>'twitter',    'link'=>ot_get_option('twt') ),
                                    'flickr'    => array( 'name'=>'flickr',     'link'=>ot_get_option('flickr') ),
                                    'rss'       => array( 'name'=>'rss',        'link'=>ot_get_option('rss') ),
                                    'gplus'     => array( 'name'=>'google-plus','link'=>ot_get_option('gplus') ),
                                    'facebook'  => array( 'name'=>'facebook',   'link'=>ot_get_option('fb') )
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
                        </div>
                        <form method="get" action="<?php echo home_url(); ?>" class="header-search">
                            <fieldset>
                                <legend>Search</legend>
                                <input type="text" name="s" id="s"  />
                                <button type="submit" class="btn submit" name="submit"><i class="icon-search"></i></button>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <?php
                $menu_style = ot_get_option('menu_style');
                if( $menu_style == 'fixed' )
                {
                    $nav_id = 'id="nav-follow"';
                }
                else
                {
                    $nav_id = '';
                }
                ?>

                <!-- Navigation -->
                <div class="navbar" <?php echo $nav_id; ?>>
                    <div class="navbar-inner">
                        <div class="container"><a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><i class="icon-th-list"></i></a> <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="brand">Navbar</a>
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                                <?php
                                $args = array(
                                    'theme_location'  => 'top-menu',
                                    'container'       => '',
                                    'container_id'    => 'desktop-nav',
                                    'menu_class'      => 'nav',
                                    'walker'          =>  new Menu_With_Description
                                );

                                if (has_nav_menu('top-menu')) {
                                    wp_nav_menu( $args );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if( !is_404() )
                {
                    echo '<hr />';
                }
                ?>

                <?php get_template_part('style_switcher'); ?>