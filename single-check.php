<?php

if (have_posts()) { ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail(); ?>
	<?php endif ?>
	</div>
<?php }

?>

 <?php comments_template(); ?>

<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

<?php comment_form(); ?>

<?php wp_list_comments(); ?>

<?php paginate_comments_links(); ?>