<?php if( get_post_meta( get_the_ID(), 'tatto_post_artist_box_show', true ) == 'show' ) : ?>
      <div class="row_grid artists-2">
        <div class="artist-2">
          <div class="artists-l">
            <?php if (get_post_meta(get_the_ID(), 'tatto_post_artist_image', true) != ''): ?>
              <div class="featimage-2" style="background-image:url(<?php echo get_post_meta(get_the_ID(), 'tatto_post_artist_image', true); ?>)"></div>
            <?php endif ?>
          </div>
          <div class="artists-r">
            <div class="cat_name"><h2><?php _e( 'Artist', 'tattoostudio' ); ?></h2></div>
            <div class="artist_right-2">
              <div class="artist_content-2">
                <div class="inner_content">
                  <?php if (get_post_meta(get_the_ID(), 'tatto_post_artist_text', true) != ''): ?>
                    <?php echo get_post_meta(get_the_ID(), 'tatto_post_artist_text', true);  ?>
                  <?php endif ?>
                </div>
              </div>
              <div class="check_social_black">
                <?php if ((get_post_meta(get_the_ID(), 'tatto_post_artist_twitter_url', true) != '') || (get_post_meta(get_the_ID(), 'tatto_post_artist_facebook_url', true) != '') || (get_post_meta(get_the_ID(), 'tatto_post_artist_youtube_url', true) != '')): ?>
                  <p>
                    <?php _e( 'Check social media', 'tattoostudio' ); ?>
                    <?php if (get_post_meta(get_the_ID(), 'tatto_post_artist_twitter_url', true) != ''): ?>
                      <a href="<?php echo get_post_meta(get_the_ID(), 'tatto_post_artist_twitter_url', true); ?>" class="soc twitt"><img alt="Tattoo Theme - FutureTeam" src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></a>
                    <?php endif; ?>
                    <?php if (get_post_meta(get_the_ID(), 'tatto_post_artist_facebook_url', true) != ''): ?>
                      <a href="<?php echo get_post_meta(get_the_ID(), 'tatto_post_artist_facebook_url', true); ?>" class="soc twitt"><img alt="Tattoo Theme - FutureTeam" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></a>
                    <?php endif; ?>
                    <?php if (get_post_meta(get_the_ID(), 'tatto_post_artist_youtube_url', true) != ''): ?>
                      <a href="<?php echo get_post_meta(get_the_ID(), 'tatto_post_artist_youtube_url', true); ?>" class="soc twitt"><img alt="Tattoo Theme - FutureTeam" src="<?php echo get_template_directory_uri(); ?>/img/youtube.png"></a>
                      <?php endif; ?>
                    </p>
                  <?php endif; ?>
                </div>
                <?php if (get_post_meta(get_the_ID(), 'tatto_post_artist_gallery_url', true) != ''): ?>
                  <a class="more_gallery" href="<?php echo get_post_meta(get_the_ID(), 'tatto_post_artist_gallery_url', true); ?>">See artist posts</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
      </div>
<?php endif; ?>