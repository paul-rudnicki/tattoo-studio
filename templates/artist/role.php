<?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_role', true)) : ?>
  <h2><?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_role', true); ?></h2>
<?php else: ?>
  <h2><?php _e( 'Artist', 'tattoostudio' ); ?></h2>
<?php endif; ?>