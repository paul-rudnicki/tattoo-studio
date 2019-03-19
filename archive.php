<?php get_header(); ?>

  <!-- Content -->

<div class="container" style="background-color:#e8e8e8;">
  <div class="container_inner">
    <div class="row_grid">
      <?php
      if (isset(get_queried_object()->term_id)) { 
        $sidebar = get_term_meta( get_queried_object()->term_id, 'tattoo_archive_sidebar', true );
      } else {
        $sidebar = '';
      }
       
      switch ($sidebar) {
        case 'without':
          get_template_part( 'templates/archive/without-sidebar' );
          break;
        case 'left':
          get_template_part( 'templates/archive/left-sidebar' );
          break;
        case 'right':
        default:
          get_template_part( 'templates/archive/right-sidebar' );
          break;
      }
      ?>

    </div>
  </div>
  <div class="clearfix"></div>
</div>

<?php get_footer(); ?>
