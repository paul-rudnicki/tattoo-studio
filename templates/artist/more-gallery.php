<?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_gallery_text', true)): ?>
  <a class="more_gallery" href="<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_gallery_url', true) ?>"><?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_gallery_text', true) ?></a>
<?php endif; ?>