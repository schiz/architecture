<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


$prefix = 'pixel_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(

	'id' => 'standard',
	'title' => 'Загрузка изображений',
	'pages' => array( 'post', 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'autosave' => true,
	'fields' => array(
		array(
			'name'             => 'Загрузка изображения',
			'id'               => "{$prefix}plupload",
			'type'             => 'plupload_image',
			'max_file_uploads' => 8,
		)
	)
);


/********************* META BOX REGISTERING ***********************/

function YOUR_PREFIX_register_meta_boxes()
{
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}

add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
