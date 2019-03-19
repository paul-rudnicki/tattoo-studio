<?php

class TSComments {

	public static function showComments( $comment, $args, $depth ) {

      // $GLOBALS['comment'] = $comment; ?>

			<div class="comment-single" id="comment-<?php comment_ID() ?>">
        <div class="artist-2">
          <div class="artists-l">
          <?php if ( $avatar = get_avatar_url($comment->comment_author_email, array('size' => 145))) {
          	$avatar = $avatar;
          } else {
          	$avatar = get_template_directory_uri() . '/img/145x145.png';
          }
          ?>
	          <div class="featimage-2" style="background-image:url(<?php echo esc_url($avatar); ?>);"></div>
          </div>
          <div class="artists-r">
          	<?php if (is_user_logged_in() ): ?>
          		<?php 
          			$current_user = wp_get_current_user();
          			if ($current_user->user_email == $comment->comment_author_email) : ?>
			            <div class="cat_name"><h2><?php _e( 'Me', 'tattoostudio' ); ?></h2></div>
          			<?php else : ?>
			            <div class="cat_name"><h2><?php _e( 'Author', 'tattoostudio' ); ?></h2></div>
          			<?php endif; ?>
          	<?php else : ?>
	            <div class="cat_name"><h2><?php _e( 'Guest', 'tattoostudio' ); ?></h2></div>
          	<?php endif ?>
            <div class="artist_right-2">
              <div class="artist_content-2">
                <div class="inner_content">
                  <p class="post_date"><?php comment_date(get_option('date_format')); ?></p>
                  <h1><?php comment_author(); ?></h1>
                  <p><?php comment_text(); ?></p>
                  <p><?php echo get_comment_reply_link(array('reply_text' => __(' Reply', "tattoostudio" ), 'depth' => $depth, 'max_depth' => $args['max_depth'])); ?> <?php edit_comment_link( __( '(Edit)', 'tattoostudio' ), '  ', '' );
        ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->
	  <?php
  	}

  	public static function paginate_comments_links($args = array()) {

		global $wp_rewrite;

		if ( !is_singular() || !get_option('page_comments') ) return;

		$page = get_query_var('cpage');

		if ( !$page ) $page = 1;
		
		$max_page = get_comment_pages_count();

		$defaults = array(
			'base'         => add_query_arg( 'cpage', '%#%' ),
			'format'       => '',
			'total'        => $max_page,
			'current'      => $page,
			'echo'         => true,
			'add_fragment' => '#comments',
			'type'         => 'plain',
			'prev_text' => '<img class="prev" src="' . get_template_directory_uri() . '/img/arr_l_v2.png">',
      'next_text' => '<img class="next" src="' . get_template_directory_uri() .'/img/arr_r_v2.png">',
		);

		if ( $wp_rewrite->using_permalinks() )
			$defaults['base'] = user_trailingslashit(trailingslashit(get_permalink()) . 'comment-page-%#%', 'commentpaged');

		$args = wp_parse_args( $args, $defaults );

		if ( $args['echo'] )
			echo paginate_links($args);
		else
		return paginate_links($args);
    }

}