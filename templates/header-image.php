<?php if (!is_page()): ?>

	<?php $header = ts_top_header(); ?>
	<div style="background-image:url(<?php echo esc_attr($header['image']); ?>); background-repeat:no-repeat; background-attachment: fixed; background-position-x: center;" class="h_slider-p h_slider-page">
	  <div id="h_content" class="h_content slide-in">
	    <h1 class="h_title">
	    	<?php echo esc_html( $header['title'] ); ?>
	    </h1>
	  </div>
	</div>

<?php else: 

	// small, image, slider, video
	$choose_header = get_post_meta( get_the_ID(), 'tattoo_page_headers_choose', true );

	get_template_part('templates/header/' . $choose_header );

endif;