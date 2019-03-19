<?php get_header('404'); ?>
  <?php 
    global $tattoo_options;

    if (isset($tattoo_options)) :
    
      if ($tattoo_options['404-image']) {
        $image = $tattoo_options['404-image']['url'];
      } else {  
        $image = get_template_directory_uri() . '/img/1920x950.png';
      }
      ?>
      <div class="h_slider h_slider-404" style="background-image: url(<?php echo esc_attr($image); ?>);background-position-x: center;">
        <div id="h_content" class="h_content slide-in page-404">
          <h6 class="">40<span class="h_line">4</span></h6>
          <?php if ($tattoo_options['404-description']): ?>
            <div style="padding-top:25px;" class="h_text"><?php echo ts_esc_html($tattoo_options['404-description']) ?></div>
          <?php endif ?>
          <?php if ($tattoo_options['404-button-text']): ?>
            <a href="<?php echo esc_url($tattoo_options['404-button-url']) ?>" class="h_button"><?php echo esc_html($tattoo_options['404-button-text']) ?></a>
          <?php endif ?>
        </div>
      </div>

    <?php endif; ?>

<?php get_footer(); ?>
