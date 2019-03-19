<?php get_header(); ?>

  <?php if (have_posts()): the_post(); ?>
    
    <!-- Content -->
    <div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> style="background-color:#e8e8e8;">
      <div class="container_inner">
        <div class="row_grid blog-image">

          <div class="h-column">
            <div class="column-inner post-wrapper">

            <?php if( get_post_meta( get_the_ID(), 'tatto_post_video_url', true ) != '' ) : ?>

              <div class="feature-image">
                <iframe src="<?php echo get_post_meta( get_the_ID(), 'tatto_post_video_url', true ); ?>" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>

            <?php else : ?>

              <?php ts_post_thumbnail(); ?>

            <?php endif; ?>

              <div class="post-inner">
                <h2><?php (is_sticky()) ? _e('Featured', 'tattoostudio') : _e('Post', 'tattoostudio'); ?></h2>
                <h4><?php the_title(); ?></h4>
                <p class="post_date"><?php the_date(get_option('date_format')); ?> <?php ts_get_categories(); ?></p>
                <div class="content-post"><?php the_content(); ?></div>
                <div class="post-counter">
                  <ul>
                    <li><?php echo ts_get_commnents_number(); ?></li>
                  </ul>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

        </div>
        <div class="clearfix"></div>
      </div>
    </div>

  <?php endif; ?>
  
  <?php get_template_part('templates/post/artist'); ?>

  <?php comments_template() ?>

<?php get_footer(); ?>