<?php 
global $tattoo_options;

if (isset($tattoo_options)) :
  if(  $tattoo_options['footer_left_visibility'] != 'off'
    || $tattoo_options['footer_center_visibility'] != 'off'
    || $tattoo_options['footer_right_visibility'] != 'off'
    ) :
?>

    <div class="container contact-grid" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/dragon.png);">
      <div class="container_inner">
        <div class="row_grid columns-3">
          
        <?php if ($tattoo_options['footer_left_visibility'] == 'on'): ?>
          
          <div class="h-column">
            <div class="contact-1">
              <?php if ($tattoo_options['footer_left_subtitle']): ?>
                <h2><?php echo esc_html($tattoo_options['footer_left_subtitle']); ?></h2>
              <?php endif ?>
              <?php if ($tattoo_options['footer_left_title']): ?>
                <h4><?php echo wp_kses($tattoo_options['footer_left_title'], array('br' => array())); ?></h4>
              <?php endif ?>
              <p class="contact-text"><?php echo ts_esc_html($tattoo_options['footer_left_description']) ?></p>
              <?php if ($tattoo_options['footer_left_link']): ?>
                <a class="more_gallery" href="<?php echo esc_url($tattoo_options['footer_left_link']) ?>"><?php _e( 'Read more', 'tattoostudio' ); ?></a>
              <?php endif ?>

              <?php 
                if(  $tattoo_options['footer_left_twitter'] != ''
                  || $tattoo_options['footer_left_facebook'] != ''
                  || $tattoo_options['footer_left_youtube'] != ''
                  ) : 
              ?>
                <div class="check_social_white">
                  <p><?php _e( 'Check social media', 'tattoostudio' ); ?>
                  <a href="<?php echo esc_url($tattoo_options['footer_left_twitter']) ?>" class="soc twitt"><img alt="twitter" src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></a>
                  <a href="<?php echo esc_url($tattoo_options['footer_left_facebook']) ?>" class="soc twitt"><img alt="facebook" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></a>
                  <a href="<?php echo esc_url($tattoo_options['footer_left_youtube']) ?>" class="soc twitt"><img alt="youtube" src="<?php echo get_template_directory_uri(); ?>/img/youtube.png"></a></p>
                </div>
              <?php endif; ?>
            </div>
          </div>

        <?php endif ?>
        
        <?php if ($tattoo_options['footer_center_visibility'] == 'on'): ?>
          <div class="h-column">
            <div class="contact-2">
              <?php if ($tattoo_options['footer_center_address']): ?>
                <p class="adress"><?php echo ts_esc_html($tattoo_options['footer_center_address']) ?></p>
              <?php endif ?>
              <?php if ($tattoo_options['footer_center_email']): ?>
                <p class="email"><?php echo ts_esc_html($tattoo_options['footer_center_email']) ?></p>
              <?php endif ?>
              <?php if ($tattoo_options['footer_center_phone']): ?>
                <p class="phone"><?php echo ts_esc_html($tattoo_options['footer_center_phone']) ?></p>
              <?php endif ?>
              <?php if ($tattoo_options['footer_center_open']): ?>
                <p class="opens"><?php echo ts_esc_html($tattoo_options['footer_center_open']) ?></p>
              <?php endif ?>
            </div>
          </div>

        <?php endif; ?>

        <?php if ($tattoo_options['footer_right_visibility'] == 'on'): ?>

          <div class="h-column">
            <div class="contact-3">
              
              <?php if (defined('WPCF7_PLUGIN') && $tattoo_options['footer_right_shortcode']): ?>
                
                <?php echo do_shortcode( $tattoo_options['footer_right_shortcode'] ); ?>

              <?php endif ?>
            </div>
          </div>
        
        <?php endif; ?>

        </div>
        <div class="clearfix"></div>
      </div>
    </div>

  <?php endif; ?>

  <?php if ($tattoo_options['footer_map_visibility'] == 'on'): ?>
    
    <div class="container map_google ">
      <?php echo ts_esc_html($tattoo_options['footer_map_url']); ?>
      <div class="clearfix"></div>
    </div>

  <?php endif ?>


<?php endif; ?>

  <?php wp_footer(); ?>

</body>

  <!-- /Body -->

</html>