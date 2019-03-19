  <div class="check_social_white">
    <p>
      <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_twitter_url', true)
        || get_post_meta(get_the_ID(), 'tatto_artist_type_facebook_url', true) 
        || get_post_meta(get_the_ID(), 'tatto_artist_type_youtube_url', true) ): ?>
      <?php _e( 'Check social media', 'tattoostudio' ); ?>
      <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_twitter_url', true)): ?>
        <a href="<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_twitter_url', true); ?>" class="soc twitt"><img alt="twitter" src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></a>
      <?php endif ?>
      <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_facebook_url', true)): ?>
        <a href="<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_facebook_url', true); ?>" class="soc twitt"><img alt="facebook" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></a>
      <?php endif ?>
      <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_youtube_url', true)): ?>
        <a href="<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_youtube_url', true); ?>" class="soc twitt"><img alt="youtube" src="<?php echo get_template_directory_uri(); ?>/img/youtube.png"></a>
      <?php endif ?>
  <?php else : ?>
    &nbsp;
  <?php endif ?>
  </p>
</div>