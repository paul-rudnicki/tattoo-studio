<?php if(have_posts()): the_post(); ?>
  
    <div class="column-inner post-wrapper">
      <?php if( get_post_meta( get_the_ID(), 'tatto_post_video_url', true ) != '' ) : ?>

        <iframe src="<?php echo get_post_meta( get_the_ID(), 'tatto_post_video_url', true ); ?>" width="100%" height="440" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

      <?php else : ?>

        <?php ts_post_thumbnail('ts-post-thumbnail-archive'); ?>

      <?php endif; ?>

      <div class="post-inner">
        <div class="content-post">
          <?php the_content(); ?>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    
<?php endif; ?>