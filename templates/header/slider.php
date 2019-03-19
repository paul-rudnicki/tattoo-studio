<?php $sliders = get_post_meta(get_the_ID(), 'tattoo_sliders_header_slider', true);  ?>

<?php if ($sliders): ?>
  
  <script>
		jQuery(document).ready(function($) {
      'use strict';
			$('.h-slider').unslider();
		});
	</script>

  <div class="h-slider">
  	<ul>

    <?php foreach($sliders as $slide): ?>
  		<li class="h_slider h_slider-2-2" style="background-image:url('<?php echo esc_url($slide['image']); ?>');">
        <div id="h_content" class="h_content slide-in">
          <?php if ($slide['title']): ?>
            <h1 class="h_title"><?php echo ts_esc_html($slide['title']); ?></h1>
          <?php endif ?>
          <?php if ($slide['description']): ?>
            <div class="h_text"><?php echo ts_esc_html($slide['description']); ?></div>
          <?php endif ?>
          <?php if ($slide['button_text']): ?>
            <a href="<?php echo esc_url($slide['button_url']); ?>" class="h_button"><?php echo ts_esc_html($slide['button_text']); ?></a>
          <?php endif ?>

        </div>
      </li>

    <?php endforeach; ?>

  	</ul>
  </div>
<?php endif; ?>