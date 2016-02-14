<?php
$slider_button = get_post_meta($post->ID, 'slider_button', true);
if($slider_button)
{
    $slider = get_post_meta($post->ID, 'slider_checkbox', true);
    if($slider)
    {
        echo '</div></div>';

        get_template_part('inc/slider_content');

        echo '<div class="section"><div class="container">';

    }
    else
    {

        get_template_part('inc/slider_content');

    }
}
?>