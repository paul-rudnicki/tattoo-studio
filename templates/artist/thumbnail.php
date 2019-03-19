<?php if (has_post_thumbnail()) :
  $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ts-artist-thumbnail' );
 ?>
  <div class="featimage" style="background-image:url(<?php echo esc_url($post_image[0]) ?>);"></div>
<?php endif; ?>