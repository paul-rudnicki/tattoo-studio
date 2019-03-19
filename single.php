<?php get_header(); ?>

  <!-- Content -->

<?php the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> style="background-color:#e8e8e8;">
  <div class="container_inner">
    <div class="row_grid">
      <div class="h-column blog-column blog">
        <div class="blog-column-inner">
          <div class="column-inner post-wrapper">

            <?php if( get_post_meta( get_the_ID(), 'tatto_post_video_url', true ) != '' ) : ?>

              <div class="feature-image">
                <iframe src="<?php echo get_post_meta( get_the_ID(), 'tatto_post_video_url', true ); ?>" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>

            <?php else : ?>

              <?php ts_post_thumbnail(); ?>

            <?php endif; ?>

            <div class="post-inner">
              <p class="post_name"><?php (is_sticky()) ? _e('Featured', 'tattoostudio') : _e('Post', 'tattoostudio'); ?></p>
                <h4><?php the_title(); ?></h4>
                <p class="post_date"><?php the_date(get_option('date_format')); ?> <?php ts_get_categories(); ?></p>
                <div class="content-post"><?php the_content(); ?></div>
                <div class="post-counter">
                  <ul>
                    <li><?php echo ts_get_commnents_number(); ?></li>
                  </ul>
                <ul>
                  <?php echo get_the_tag_list('<li><strong>' . __('Tags:', 'tattoostudio'). '</strong> ',', ','</li>'); ?>
                </ul>
              </div>

              <div class="clearfix"></div>
            </div>
          </div>

        </div>

        <?php get_template_part('templates/post/artist'); ?>

        <?php comments_template() ?>

      </div>

      <div class="h-column sidebar-right">

        <?php get_sidebar(); ?>

      </div>

    </div>

  </div><div class="clearfix"></div>
</div>

<?php get_footer(); ?>