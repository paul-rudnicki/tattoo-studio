<?php if(have_posts()): ?>

  <?php while(have_posts()): the_post(); ?>

    <div class="column-inner post-wrapper">

      <?php if( get_post_meta( get_the_ID(), 'tatto_post_video_url', true ) != '' ) : ?>

        <iframe src="<?php echo get_post_meta( get_the_ID(), 'tatto_post_video_url', true ); ?>" width="100%" height="440" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

      <?php else : ?>

        <?php ts_post_thumbnail('ts-post-thumbnail-archive'); ?>

      <?php endif; ?>

      <div class="post-inner">
        <p class="post_name"><?php (is_sticky()) ? _e('Featured', 'tattoostudio') : _e('Post', 'tattoostudio'); ?></p>
        <h4><?php the_title(); ?></h4>
        <p class="post_date"><?php echo get_the_date(get_option('date_format')); ?> <?php ts_get_categories(); ?></p>
        <div class="content-post">
          <?php the_excerpt(); ?>
          <a class="more_gallery" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'tattoostudio' ); ?></a>
        </div>
        <div class="post-counter">
          <ul>
            <li><?php echo ts_get_commnents_number(); ?></li>
          </ul>
        </div><div class="clearfix"></div>
      </div>
    </div>

  <?php endwhile; ?>
  
  <!-- pagination -->
  <div class="h-column blog-navigation">
    
    <?php echo ts_paginate_links(); ?>

  </div>
  <!-- end of pagination -->

<?php endif; ?>