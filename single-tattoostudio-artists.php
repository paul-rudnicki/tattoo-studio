<?php get_header(); ?>

<?php if (have_posts()): the_post(); ?>

  <!-- Content -->

  <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_background_image', true)): ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> style="background-image:url(<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_background_image', true); ?>); background-repeat:no-repeat; background-position:center center; background-attachment: fixed; background-size: cover; ">
  <?php else: ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> style="background-color:#000000;">
  <?php endif ?>
    <div class="container_inner">
      <div class="row_grid">
        <ul class="artists">
          <li class="artist">

            <?php get_template_part('templates/artist/thumbnail'); ?>

            <?php get_template_part('templates/artist/social-media'); ?>
            
            <div class="artist_right"><div class="rectangle-4"></div>
              <div class="artist_content">
              
                <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_role', true)): ?>
                  <h2><?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_role', true); ?></h2>
                <?php endif ?>
                
                <?php if (get_post_meta(get_the_ID(), 'tatto_artist_type_size', true)
                      || get_post_meta(get_the_ID(), 'tatto_artist_type_line', true)): ?>
                  <h1 style="line-height:<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_line', true); ?>px;font-size:<?php echo get_post_meta(get_the_ID(), 'tatto_artist_type_size', true); ?>px;"><?php the_title(); ?></h1>
                <?php else : ?>
                  <h1><?php the_title(); ?></h1>
                <?php endif; ?>
                  
                <?php the_content(); ?>
                
                <?php get_template_part('templates/artist/more-gallery'); ?>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <?php get_template_part('templates/post-types/grid'); ?>
  
<?php endif; ?>

<?php get_footer(); ?>
