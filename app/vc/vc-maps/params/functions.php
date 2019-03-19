<?php 
if (!function_exists('ts_about_social')) {
  function ts_about_social($twitter, $facebook, $youtube)
  {
      if ($twitter || $facebook || $youtube): ?>
        <div class="check_social">
          <p><?php _e( 'Check social media', 'tattoostudio' ); ?></p>
          <?php if ($twitter): ?>
            <a href="<?php echo esc_url($twitter); ?>" class="soc twitt"><img alt="twitter" src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></a>
          <?php endif ?>
          <?php if ($facebook): ?>
            <a href="<?php echo esc_url($facebook); ?>" class="soc twitt"><img alt="facebook" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></a>
          <?php endif ?>
          <?php if ($youtube): ?>
            <a href="<?php echo esc_url($youtube) ?>" class="soc twitt"><img alt="youtube" src="<?php echo get_template_directory_uri(); ?>/img/youtube.png"></a>
          <?php endif ?>
        </div>
    <?php endif;
  }
}
?>