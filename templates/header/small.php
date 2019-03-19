<?php 
	$header['title'] = get_the_title();
  $header['image'] = get_post_meta( get_the_ID(), 'tattoo_page_small_headers_image', true ) != '' ? get_post_meta( get_the_ID(), 'tattoo_page_small_headers_image', true ) : get_template_directory_uri() . '/img/1920x475.png';
?>
<div style="background-image:url(<?php echo esc_attr($header['image']); ?>); background-repeat:no-repeat;background-attachment:fixed;background-position-x:center " class="h_slider-p h_slider-page">
  <div id="h_content" class="h_content slide-in">
    <h1 class="h_title">
    	<?php echo esc_html( $header['title'] ); ?>
    </h1>
  </div>
</div>