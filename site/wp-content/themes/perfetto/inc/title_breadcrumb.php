<div class="row">
    <div class="span12 clearfix">

        <?php
        if(function_exists( 'bcn_display' ) && !is_page_template('template-home.php'))
        {
            ?>
            <div class="breadcrumb">
                <?php bcn_display(); ?>
                <?php ?>
            </div>
        <?php } ?>

        <div class="margin">
            <?php
            $sub_heading = get_post_meta($post->ID, 'subheading', true);
            if($sub_heading)
            {
                echo '<h1 class="no-margin">'.get_the_title().'</h1>';
                echo '<p class="lead">'.$sub_heading.'</p>';
            }
            else
            {
                echo '<h1>'.get_the_title().'</h1>';
            }
            ?>
        </div>

    </div>
</div>