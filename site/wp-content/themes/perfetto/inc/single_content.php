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
            <?php the_tags( ' ', '&nbsp;', ' ' ); ?>
        </div>
        <hr />
        <dl>
            <dt>Категории</dt>
            <dd><?php the_category(' '); ?></dd>
        </dl>

    </div>

    <div class="span6">

        <div class="single_post">
            <?php
            if( has_post_thumbnail() )
            {
                $thumb_id = get_post_thumbnail_id();
                $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
                ?>
                <a href="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" rel="posts" class="thumb fancybox">
                    <?php the_post_thumbnail(); ?>
                    <span class="view"><i class="icon-search icon-white"></i></span>
                </a>
            <?php
            }
            ?>
            <?php the_content();?>
        </div>

        <?php wp_link_pages(array(
            'before'           => '<div class="pagination pagination-right margin"><ul><li>',
            'after'            => '</li></ul></div>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'next',
            'nextpagelink'     => 'Next Page',
            'previouspagelink' => 'Previous Page',
            'echo'             => 1
        )); ?>

        <div class="pagination text-center">
            <ul>
                <li class="pull-left"><?php next_post_link( '%link', '<< Старые посты' ); ?></li>
                <li class="pull-right"><?php previous_post_link( '%link', 'Новые посты >>' ); ?></li>
            </ul>
        </div>

        <hr />

        <?php
        if(is_singular( 'post' ))
        {
            comments_template();
        }
        ?>

    </div>
