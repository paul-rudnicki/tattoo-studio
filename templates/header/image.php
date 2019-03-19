<?php 
	$image = get_post_meta(get_the_ID(), 'tattoo_page_image_headers_image', true);
	$button_url = get_post_meta(get_the_ID(), 'tattoo_page_image_headers_button_url', true);
?>
<div class="h_slider h_slider-1" style="background-image:url('<?php echo esc_url($image); ?>');">
  <div id="h_content" class="h_content slide-in">
		<?php if (get_post_meta(get_the_ID(), 'tattoo_page_image_headers_title', true)): ?>
	    <h1 class="h_title"><?php echo get_post_meta(get_the_ID(), 'tattoo_page_image_headers_title', true); ?></h1>
		<?php endif ?>
		<?php if (get_post_meta(get_the_ID(), 'tattoo_page_image_headers_text', true)): ?>
	    <div class="h_text"><?php echo get_post_meta(get_the_ID(), 'tattoo_page_image_headers_text', true); ?></div>
		<?php endif ?>
		<?php if (get_post_meta(get_the_ID(), 'tattoo_page_image_headers_button_text', true)): ?>
	    <a href="<?php echo esc_url($button_url); ?>" class="h_button"><?php echo get_post_meta(get_the_ID(), 'tattoo_page_image_headers_button_text', true); ?></a>
		<?php endif ?>
  </div>
  <!-- <div class="arrow bounce"></div> -->
</div>