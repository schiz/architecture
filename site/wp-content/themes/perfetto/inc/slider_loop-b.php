<?php
$slider_button = get_post_meta($post->ID, 'slider_button', true);
if($slider_button)
{
    get_template_part('inc/slider_content');
}
?>