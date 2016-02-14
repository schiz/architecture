<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
			<p class="nocomments">Этот пост защищен паролем. Для просмотра комментария введите пароль.</p>
	<?php
			return;
	}
?>




<!-- comments list -->
<ul class="media-list">
	
    <?php if ( have_comments() ) : ?>

    <h2>Comments</h2>
	<p><?php comments_number('Нет комментариев', 'Один комментарий', '% комментария(ев)' );?></p>

	<ul>
	    <?php wp_list_comments('type=comment&callback=pixelart_comment'); ?>
	</ul>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav">
		<div class="nav-previous"><?php previous_comments_link('&larr; Старые комментарии'); ?></div>
		<div class="nav-next"><?php next_comments_link('Следующие комментарии &rarr;'); ?></div>
	</nav>
	<?php endif; ?>

	<?php else : ?>

		<?php if ( comments_open() ) : ?>

			<p class="nocomments">К сожалению, пока нет комментариев.</p>
			
		 <?php else : ?>

			<p class="nocomments">Комментарии закрыты.</p>
	
		<?php endif; ?>
        
    <?php endif; ?>

</ul>
<hr>
<!-- comments list -->


<!-- comments form -->
<?php if ( comments_open() ) : ?>
<div id="comment-form" class=" submit-comment margin">
		
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p class="nocomments">You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">Авторизируйтесь </a>чтобы комментировать.</p>
		<?php
        else :
		 	
		$fields =  array(
			'author' => ''
						. '<div class="controls-row"><input type="text" class="field name span3" id="name" placeholder="Имя" name="author" value="'.esc_attr($comment_author).'" />',
						
			'email'  => ''
						. '<input type="text" class="field email span3" id="email" placeholder="Mail" name="email" value="'.esc_attr($comment_author_email).'" /></div>',

		);
		
		$comments_args = array(
			'fields' => $fields,
			'title_reply' => '<h2>Оставить комментарий</h2>',
	  		'title_reply_to' => '',
			'comment_notes_after' => '',
			'cancel_reply_link'	=> '',
			'comment_field' => '<textarea name="comment" class="textarea span6" placeholder="Комментарий" id="comment-textarea" cols="30" rows="3"></textarea>',
		);
		
		comment_form($comments_args);
		 
		endif;
		
		?>

</div>
<?php endif; ?>
<!-- comments form -->