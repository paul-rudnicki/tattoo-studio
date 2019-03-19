<?php 
	$image = get_post_meta(get_the_ID(), 'tattoo_page_video_headers_image', true);
	$video = get_post_meta(get_the_ID(), 'tattoo_page_video_headers_video', true);
	$button_url = get_post_meta(get_the_ID(), 'tattoo_page_video_headers_button_url', true);
?>
<video poster="<?php echo esc_url($image); ?>" id="bgvid" playsinline autoplay muted loop>
  <source src="<?php echo esc_url($video); ?>" type="video/webm">
  <source src="<?php echo esc_url($video); ?>" type="video/mp4">
</video>

<div id="polina" class="h_slider h_slider-3">
  <div id="h_content" class="h_content slide-in">
		<?php if (get_post_meta(get_the_ID(), 'tattoo_page_video_headers_title', true)): ?>
	    <h1 class="h_title"><?php echo get_post_meta(get_the_ID(), 'tattoo_page_video_headers_title', true); ?></h1>
		<?php endif ?>
		<?php if (get_post_meta(get_the_ID(), 'tattoo_page_video_headers_text', true)): ?>
	    <div class="h_text"><?php echo get_post_meta(get_the_ID(), 'tattoo_page_video_headers_text', true); ?></div>
		<?php endif ?>
		<?php if (get_post_meta(get_the_ID(), 'tattoo_page_video_headers_button_text', true)): ?>
	    <a href="<?php echo esc_url($button_url); ?>" class="h_button"><?php echo get_post_meta(get_the_ID(), 'tattoo_page_video_headers_button_text', true); ?></a>
		<?php endif ?>
  </div>
</div>